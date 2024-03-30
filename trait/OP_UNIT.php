<?php
/** op-core:/OP_UNIT.php
 *
 * @created   2019-02-21
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
	/** Get current class meta name.
	 *
	 * @created   2024-03-25
	 * @return    string
	 */
	static private function __meta_name() : string
	{
		//	Get namesapce.
		$namespace = explode('\\', __CLASS__);
		return strtolower($namespace[1]);
	}

	/** Get current unit name.
	 *
	 * @created   2024-03-20
	 * @return    string
	 */
	static private function __unit_name() : string
	{
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

		//	...
		return $unit_name;
	}

	/** Load from current unit's template directory.
	 *
	 * @created   2022-10-04
	 * @param     string     $file_path
	 * @param     array      $args
	 * @return    mixed
	 */
	static function Template(string $file_path, array $args=[])
	{
		//	...
		if( strpos($file_path, '..') !== false ){
			throw new \Exception("Deny upper directory specification.");
		}

		//	...
		$unit_name = self::__unit_name();
		$meta_path = "unit:/{$unit_name}/template/{$file_path}";

		//	...
		return OP::Template($meta_path, $args);
	}

	/** Get current unit config.
	 *
	 * @created   2024-03-20
	 * @param     string     $key
	 * @param     mixed      $value
	 * @return    mixed
	 */
	static function Config(string $key=null, $value=null)
	{
		//	...
		$unit_name = self::__unit_name();

		//	...
		if( $value ){
			\OP\Config::Set($unit_name, [$key => $value]);
		}

		//	...
		$config = \OP\Config::Get($unit_name);

		//	...
		return $key ? ($config[$key] ?? null) : $config;
	}
}
