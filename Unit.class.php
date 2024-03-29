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
			throw new \Exception("This UNIT could not be loaded. ($name)");
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
		if( class_exists("\OP\UNIT\\{$name}", false) ){
			return true;
		}

		//	...
		if(!$asset_root = RootPath('asset') ){
			OP::Notice("The asset:/ is empty.");
			return false;
		}

		//	...
		$path = $asset_root . 'unit/' . strtolower($name) . '/index.php';

		//	...
		if(!file_exists($path) ){
			OP::Notice("Does not exists index.php file. ($path)");
			return false;
		};

		//	...
		if(!$io = require_once($path) ){
			OP::Notice("include() function returned false. ($path)\n");
			return false;
		}

		//	...
		return $io;
	}

	/** Return already instantiaged instance that unit name.
	 *
	 * @created  2019-09-18
	 * @renamed  2024-03-20  Singleton() --> Instantiated()
	 * @param    string      $name
	 * @return  &IF_UNIT     $unit
	 */
	static function & Instantiated(string $name) : IF_UNIT
	{
		return self::Singleton($name);
	}

	/** Singleton
	 *
	 *  Return already instantiated object by reference.
	 *
	 * @deprecated 2024-03-20
	 * @created  2019-09-18
	 * @param    string      $name
	 * @return  &IF_UNIT     $unit
	 */
	static function & Singleton(string $name) : IF_UNIT
	{
		//	...
		static $_unit;

		//	...
		if( empty($_unit[$name]) ){
			$_unit[$name] = self::Instantiate($name);
		}

		//	...
		return $_unit[$name];
	}

	/** Check if that unit is installed.
	 *
	 * <pre>
	 * OP()->Unit()->isInstalled('unit_name');
	 * </pre>
	 *
	 * @deprecated 2024-03-20  isInstall() --> isInstalled()
	 * @created    2022-11-22
	 * @param      string     $name
	 * @return     boolean
	 */
	static function isInstall(string $name)
	{
		return self::isInstalled($name);
	}

	/** Check if that unit is installed.
	 *
	 * @created    2022-11-22
	 * @renamed    2024-03-20  isInstall() --> isInstalled()
	 * @param      string     $name
	 * @return     boolean
	 */
	static function isInstalled(string $name)
	{
		//	Generate target path.
		$path = OP::MetaPath('asset:/unit').strtolower($name).'/index.php';

		//	Return result.
		return file_exists($path);
	}
}
