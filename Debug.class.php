<?php
/** op-core:/Debug.class.php
 *
 * @created   2019-03-20
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-03-20
 */
namespace OP;

/** Debug
 *
 *  Put together debug information.
 *
 * @deprecated 2023-01-13
 * @created   2019-03-19
 * @version   1.0
 * @package   core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Debug
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_DEBUG, OP_CI;

	/** Set debug info.
	 *
	 * @deprecated 2023-01-13
	 * @param  string  $key
	 * @param  mixed   $val
	 */
	static function Set($key, $val)
	{
		self::__DebugSet($key, $val);
	}

	/** Display debug info.
	 *
	 * @deprecated 2023-01-13
	 * @param  string  $key
	 */
	static function Out($key='')
	{
		self::__DebugOut($key);
	}
}
