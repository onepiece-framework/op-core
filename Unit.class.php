<?php
/** op-core:/Unit.class.php
 *
 * @created   2016-11-28
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-20
 */
namespace OP;

/** Used class
 *
 */
use Exception;

/** Unit
 *
 * <pre>
 * //	Get instance.
 * $obj = Unit::Instance('UnitName');
 *
 * //	Load static class.
 * \OP\Unit::Load('unitname');
 *
 * //	Use static class.
 * $val = \OP\UNIT\NAME::Get();
 * </pre>
 *
 * @created   2016-11-28
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Unit
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_CI;

	/** Return always new instance.
	 *
	 * @param  string $name
	 * @return IF_UNIT
	 */
	static function Instantiate(string $name) : IF_UNIT
	{
		//	Automatically load unit.
		if(!self::Load($name)){
			return false;
		}

		//	Generate name space path.
		$class = '\OP\UNIT\\'.$name;

		//	Instantiate.
		if(!class_exists($class, true) ){
			throw new Exception("Has not been exists class. ($class)");
		};

		//	Get the interface implemented by the class.
		$classes = class_implements($class);

		//	Check IF_UNIT is implemented.
		if(!isset($classes['OP\IF_UNIT']) ){
			throw new Exception("This unit has not implemented IF_UNIT. ($class)");
		};

		//	Check implemented restriction.
		switch( strtolower($name) ){
			case 'form':
			case 'database':
			case 'sql':
				//	Generate interface name.
				$key = "OP\IF_".strtoupper($name);

				//	Check to implemented.
				if(!isset($classes[$key]) ){
					throw new Exception("This unit has not implemented {$key}. ($name)");
				};
			break;
		};

		//	Return new instance.
		return new $class();
	}

	/** Load of unit controller.
	 *
	 * @created
	 * @updated 2019-06-13  To simplified.
	 * @param   string      $name
	 * @return  boolean     true is successful.
	 */
	static function Load(string $name)
	{
		//	...
		if( class_exists("\OP\UNIT\{$name}", false) ){
			return true;
		}

		//	...
		if(!$asset_root = RootPath('asset') ){
			throw new \Exception("The asset:/ is empty.");
		}

		//	...
		$path = $asset_root . 'unit/' . strtolower($name) . '/index.php';

		//	...
		if(!file_exists($path) ){
			throw new Exception("Does not exists index.php file. ($path)");
		};

		//	...
		return require_once($path);
	}

	/** Singleton
	 *
	 * <pre>
	 * $unit = OP::Unit('unit_name');
	 * </pre>
	 *
	 * @deprecated
	 * @created  2019-09-18
	 * @param    string      $name
	 * @return   object      $unit
	 */
	static function & Singleton(string $name)
	{
		return Unit($name);
	}

	/** Check if that unit is installed.
	 *
	 * @created    2022-11-22
	 * @param      string     $name
	 * @return     boolean
	 */
	static function isInstall(string $name)
	{
		//	Generate target path.
		$path = OP::MetaPath('unit:/').strtolower($name).'/index.php';

		//	Return result.
		return file_exists($path);
	}
}
