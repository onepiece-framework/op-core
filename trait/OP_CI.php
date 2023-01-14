<?php
/** op-core:/trait/OP_CI.php
 *
 * @created   2022-10-12
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

/** OP_CI
 *
 * @created   2022-10-12
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait OP_CI
{
	/** CI
	 *
	 * @created   2022-10-12
	 */
	function CI()
	{
		//	...
		require_once(__DIR__.'/../function/CI.php');

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
			if( $display ){ echo $method.'(), '; }

			//	...
			foreach( $configs[$method] ?? [null] as $config ){

				//	...
				$expect = $config['result'] ?? null;
				$arg    = $config['args']   ?? null;
				$args   = is_array($arg) ? $arg: [$arg];
				$debug  = null;

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
						$result = OP()->Notice()->Pop()['message'];
					}

				}catch( \Exception $e ){

					//	For debug
					$debug[$method] = $config ?? '(empty)';

					//	...
					$result = 'Exception: '.$e->getMessage();
				}

				//	If result is object.
				if( is_object($result) ){
					$result = get_class($result);
				}

				//	...
				if( $result !== $expect ){
					//	...
					echo PHP_EOL;

					//	...
					if( $debug ){
						//	...
						echo PHP_EOL;
						var_dump($debug);
					}

					//	...
					echo PHP_EOL;
					var_dump([
						'expect' => $expect,
						'result' => $result,
					]);

					//	...
					$class = get_class($this);
					throw new \Exception("{$class}->{$method}: Unmatch result.");
				}
			}
		}

		//	...
		if( $display ){ echo "\n"; }
	}
}
