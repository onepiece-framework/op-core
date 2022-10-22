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
		//	Set AppID.
		Env::AppID('self-check');

		//	CLI arguments
		$request = OP::Request();

		//	...
		$display = $request['display'] ?? true;

		//	...
		if( $display ){ echo get_class($this).' - '; }

		//	...
		$configs = self::__GetConfig();

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
					//	...
					$result = $this->$method(...$args);

					//	...
					if( OP()->Notice()->Has() ){
						$result = OP()->Notice()->Pop()['message'];
					}

				}catch( \Exception $e ){

					//	For debug
					$debug[$method] = $config ?? '(empty)';

					//	...
					$result = 'Exception: '.$e->getMessage();
				}

				//	...
				if( $result !== $expect ){
					if( $debug ){
						var_dump($debug);
					}
					var_dump( ['expect' => $expect, 'result' => $result] );
					throw new \Exception("$method: Unmatch result.");
				}
			}
		}

		//	...
		if( $display ){ echo "\n"; }
	}

	/** Get config.
	 *
	 * @created   2022-10-12
	 * @throws    \Exception
	 * @return    array
	 */
	function __GetConfig()
	{
		//	...
		$class_path  = get_class($this);
		$class_parse = explode('\\', $class_path);

		//	...
		switch( count($class_parse) ){
			//	OP
			case '2':
				$io   = true;
				$meta = 'op';
				$name = $class_parse[1];
				break;

			//	UNIT
			case '3':
				$io = $class_parse[1] === 'UNIT' ? true: false;
				$meta = 'unit';
				$name = $class_parse[2];
				break;

			default:
				$io = false;
		}

		//	...
		if(!$io ){
			throw new \Exception("Illigal namespace. ($class_path)");
		}

		//	...
		$path = "{$meta}:/ci/{$name}.php";

		//	...
		return OP::Sandbox($path);
	}
}
