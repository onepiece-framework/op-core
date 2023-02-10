<?php
/** op-core:/trait/OP_CI.php
 *
 * @created   2022-10-12
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
	 * @deprecated 2023-02-10
	 * @created    2022-10-12
	 */
	function CI()
	{
		/*
		//	...
		require_once(__DIR__.'/../function/CI.php');

		//	...
		require(__DIR__.'/../include/CI.php');
		*/
	}

	/** Return all method names that the instance has.
	 *
	 * @created    2023-02-10
	 * @return array
	 */
	function AllMethods():array
	{
		return get_class_methods($this);
	}
}
