<?php
/** op-core:/IF_API.php
 *
 * @created    2024-02-09
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

/** IF_API
 *
 * @created    2024-02-09
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
interface IF_API
{
	/** Register for admin information.
	 *
	 * <pre>
	 * OP()->Api()->Admin('endpoint', __FILE__);
	 * </pre>
	 *
	 * @created    2024-02-09
	 */
	static public function Admin(string $key, $value);

	/** Register error message for end user.
	 *
	 * <pre>
	 * OP()->Api()->Error("This is error message.");
	 * </pre>
	 *
	 * @created    2024-02-09
	 */
	static public function Error(string $message);

	/** Register result.
	 *
	 * <pre>
	 * OP()->Api()->Result(['color'=>'blue']);
	 * </pre>
	 *
	 * @created    2024-02-09
	 */
	static public function Result($value);

	/** Output JSON.
	 *
	 * <pre>
	 * OP()->Api()->Out();
	 * </pre>
	 *
	 * @created    2024-02-09
	 */
	static public function Out();
}
