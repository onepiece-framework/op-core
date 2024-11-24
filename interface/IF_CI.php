<?php
/** op-core:/interface/IF_CI.php
 *
 * @created    2024-11-24
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/** IF_CI
 *
 * @created    2024-11-24
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
interface IF_CI
{
	/** Return IF_CI_Config
	 *
	 * @created    2024-11-24
	 * @return     IF_CI_Config
	 */
	static public function Config();
}

/** IF_CI_Config
 *
 * @created    2024-11-24
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
interface IF_CI_Config
{
	/** Get config
	 *
	 * @created    2024-11-24
	 */
	static public function Get();
}
