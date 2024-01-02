<?php
/** op-core:/OP_UNIT.php
 *
 * @created   2019-02-21
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-21
 */
namespace OP;

/** OP_UNIT
 *
 * @created   2019-02-21
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait OP_UNIT
{
	/** Load from current unit's template directory.
	 *
	 * @created   2022-10-04
	 * @return
	 */
	static function Template(string $file_path, array $args=[])
	{
		//	...
		if( strpos($file_path, '..') !== false ){
			throw new \Exception("Deny upper directory specification.");
		}

		//	...
		/*
		$unit_name = get_class($this);
		$unit_name = __CLASS__;
		$unit_name = substr($unit_name, 8); // OP\UNIT\App --> App
		*/
		//	OP\UNIT\Foo\Bar --> Foo --> foo
		$name_space  = __CLASS__;
		$name_spaces = explode('\\', $name_space);
		$unit_name   = $name_spaces[2];
		$unit_name = strtolower($unit_name);
		$meta_path = "unit:/{$unit_name}/template/{$file_path}";

		//	...
		return OP::Template($meta_path, $args);
	}
}
