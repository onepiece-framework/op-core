<?php
/**
 * OP_CORE.php
 *
 * @creation  2017-02-16
 * @version   1.0
 * @package   core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @creation  2019-02-20
 */
namespace OP;

/** OP_CORE
 *
 * @creation  2016-12-05
 * @version   1.0
 * @package   core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait OP_CORE
{
	/** Calling to has not been set method.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	function __call($name, $args)
	{
		$join = [];
		foreach( $args as $val ){
			switch( $type = gettype($val) ){
				case 'array':
					$count  = count($val);
					$join[] = $type."($count)";
					break;

				case 'object':
					$join[] = get_class($val);
					break;

				default:
					$join[] = $val;
			}
		}

		//	...
		$class   = get_class($this);
		$serial  = join(', ', $join);
		$message = "This method has not been exists. ({$class}->{$name}({$serial}))";

		//	...
		throw new \Exception($message);
	}

	/** Calling to has not been set static method.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	static function __callstatic($name, $args)
	{
		throw new \Exception("This method has not been exists. ($name)");
	}

	/** Calling to has not been set property.
	 *
	 * @param string $name
	 */
	function __get($name)
	{
		throw new \Exception("This property has not been exists. ($name)");
	}

	/** Calling to has not been set property.
	 *
	 * @param string $name
	 * @param array  $args
	 */
	function __set($name, $args)
	{
		throw new \Exception("This property has not been exists. ($name)");
	}

	/** Enumerate property names to serialize.
	 *
	 */
	function __sleep()
	{
		return [];
	}

	/** Process to restore from serialized character string.
	 *
	 */
	function __wakeup()
	{

	}
}