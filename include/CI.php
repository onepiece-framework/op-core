<?php
/** op-core:/include/CI.php
 *
 * @deprecated 2023-02-13
 * @created   2023-01-16
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

 /** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/* @var $this object */

//	Set AppID.
Env::AppID('self-check');

//	CLI arguments
$request = OP::Request();
$display = $request['display'] ?? true;
$class   = get_class($this);

//	...
if( $display ){
	echo str_pad($class, 10, ' ');
	echo ' - ';
}

//	CI Config for that class.
$configs = CIConfig($this);

//	...
if( $method  = $request['method'] ?? null ){
	$methods = [$method];
}else{
	$methods = get_class_methods($this);
}

//	...
$lenght = 0;

//	...
foreach( $methods as $method ){
	//	...
	if( $method == 'CI' ){
		continue;
	}

	//	...
	if( $method[0] === '_' and $method[1] === '_' ){
		continue;
	}

	//	...
	if( $display ){
		$lenght += strlen($method);
		if( $lenght > 100 ){
			$lenght = 0;
			echo "\n" . str_pad("", 13, ' ', STR_PAD_LEFT);
		}
		echo $method.'(), ';
	}

	//	...
	foreach( $configs[$method] ?? [null] as $config ){
		//	...
		$expect = $config['result'] ?? null;
		$arg    = $config['args']   ?? null;
		$args   = is_array($arg) ? $arg: [$arg];
		$traces = null;

		//	...
		try {
			//	If empty return value, evaluate contents.
			ob_start();
			if(!$result = $this->$method(...$args) ){
				if( $contents = ob_get_contents() ){
					$result   = $contents;
				}
			}
			ob_end_clean();

			//	Overwrite result by Notice.
			if( OP()->Notice()->Has() ){
				$notice = OP()->Notice()->Pop();
				$result = 'Notice: '.$notice['message'];
				$traces = $notice['backtrace'];
			}

		}catch( \Exception $e ){
			//	...
			$result = 'Exception: '.$e->getMessage();
			$traces = $e->getTrace();
		}

		//	If result is object.
		if( is_object($result) ){
			$result = get_class($result);
		}

		//	...
		if( $result !== $expect ){
			//	...
			if( $traces ){
				$i = count($traces);
				echo "\n{$result}\n\n";
				foreach( $traces as $trace){
					$i--;
					$n = str_pad((string)$i, 2, ' ', STR_PAD_LEFT);
					echo "$n: ".OP::DebugBacktraceToString($trace)."\n";
				}
				echo "\n";
			}

			//	...
			echo "\nConfig:\n";
			D($config);
			echo "\nExpect:\n";
			D($expect);
			echo "\nResult:\n";
			D($result);

			//	...
			$class = get_class($this);
			throw new \Exception("{$class}->{$method}(): Unmatch result.");
		}
	}
}

//	...
if( $display ){
	echo "\n";
}
