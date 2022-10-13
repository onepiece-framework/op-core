<?php
/** op-core:/trait/OP_CI.php
 *
 * @created   2022-10-12
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

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
		$display = OP::Request('display') ?? true;

		//	...
		if( $display ){ echo get_class($this).' - '; }

		//	...
		$configs = self::__GetConfig();

		//	...
		foreach( get_class_methods($this) as $method ){
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
				$result = $this->$method(...$args);

				//	...
				if( $result !== $expect ){
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