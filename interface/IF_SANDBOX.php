<?php
/** op-core:/IF_SANDBOX.php
 *
 * @created    2024-03-09
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

/** IF_SANDBOX
 *
 * @created    2024-03-09
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
interface IF_SANDBOX
{
	/** Automatically perform processing depending on the extension.
	 *
	 *  php   : Return excute value.
	 *  phtml : Output template.
	 *
	 * @created    2024-03-09
	 * @param      string     $path
	 * @param      array      $args
	 */
	static public function Auto(string $path, array $args=[]);
}
