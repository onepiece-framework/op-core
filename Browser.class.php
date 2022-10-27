<?php
/** op-core:/Browser.class.php
 *
 * @created   2019-04-02
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-04-02
 */
namespace OP;

/** Browser
 *
 * @created   2019-04-02
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Browser
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_CI;

	/** SmartPhone
	 *
	 * @return boolean
	 */
	static function SmartPhone()
	{
		return null;
	}

	/** iPhone
	 *
	 * @return boolean
	 */
	static function iPhone()
	{
		return null;
	}

	/** Android
	 *
	 * @return boolean
	 */
	static function Android()
	{
		return null;
	}

	/** Mac
	 *
	 * @return boolean
	 */
	static function Mac()
	{
		/* @var $output array */
		exec('sw_vers', $output);

		//	...
		if(!$pos = strpos($output[0], 'macOS') ){
			$pos = strpos($output[0], 'Mac OS X');
		}

		//	...
		return $pos ? true: false;
	}

	/** Win
	 *
	 * @return boolean
	 */
	static function Win()
	{
		return null;
	}

	/** Linux
	 *
	 * @return boolean
	 */
	static function Linux()
	{
		return null;
	}

	/** BSD
	 *
	 * @return boolean
	 */
	static function BSD()
	{
		return null;
	}
}
