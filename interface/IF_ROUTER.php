<?php
/** op-core:/interface/IF_ROUTER.php
 *
 * @created    2024-06-12
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** IF_ROUTER
 *
 * @created    2024-06-12
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
interface IF_ROUTER
{
	/** Get route table.
	 *
	 * @created    2024-06-12
	 * @return     array      $table
	 */
	public function Table() : array;

	/** Get End-Point file path.
	 *
	 * @created    2024-06-12
	 * @return     string     $endpoint
	 */
	public function EndPoint() : string;

	/** Smart URL Arguments.
	 *
	 * @created    2024-08-31
	 * @return     array      $args
	 */
	public function Args() : array;
}
