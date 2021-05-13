<?php
/** op-core:/Config.php
 *
 * Purpose: Want to combine Env::Get()/Set() and Unit::Config().
 *
 * @created   2019-12-27
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-12-27
 */
namespace OP;

/** Config
 *
 * @created   2019-12-27
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Config
{
	/** Config
	 *
	 * @created   2019-12-27
	 * @var       array
	 */
	static $_config;

	/** Init config from asset:/config/{$name}.php
	 *
	 * @created   2019-12-27
	 * @param     string       $name
	 * @return    string       $name
	 */
	static private function _Init($name)
	{
		//	Force lower case.
		$name = strtolower($name);

		//	Check by class name whether config is initialized.
		if(!isset(self::$_config[$name]) ){
			//	Fetch from config file.
			self::_Fetch($name);
		}

		//	...
		return $name;
	}

	/** Get
	 *
	 * @created   2019-12-27
	 */
	static function Get($name)
	{
		//	...
		$name = self::_Init($name);

		//	...
		return self::$_config[$name] ?? [];
	}

	/** Set
	 *
	 * @created   2019-12-13   Moved Env::Get() --> OP_UNIT::Config()
	 * @moved     2019-12-27   Moved OP_UNIT::Config() --> Config::Set()
	 * @param     string       $name
	 * @param     mixed        $config
	 * @return    mixed
	 */
	static function Set($name, $config)
	{
		//	...
		$name = self::_Init($name);

		/** About array merge.
		 *
		 *  array_replace_recursive() is all replace.
		 *  array_merge_recursive() is number index is renumbering.
		 */
		//	self::$_env[$key] = array_merge_recursive(self::$_env[$key], $var);
		if( $config ){
			//	...
			if( self::$_config[$name] === null ){
				self::$_config[$name]  =  [];
			}

			//	...
			self::$_config[$name] = array_replace_recursive(self::$_config[$name], $config);
		}

		//	...
		return self::$_config[$name];
	}
}
