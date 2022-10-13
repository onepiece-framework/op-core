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

	/** Already instantiated object.
	 *
	 * @var IF_UNIT
	 */
	static $_instance;

	/** Get already instantiated object.
	 *
	 * @created    2020-10-09
	 * @return     IF_UNIT
	 */
	static function Singleton()
	{
		//	...
		if(!self::$_instance ){
			self::$_instance = new self();
		}

		//	...
		return self::$_instance;
	}
}
