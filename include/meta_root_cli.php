<?php
/** op-core:/include/meta_root_cli.php
 *
 * @created   2022-10-07
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** The onepiece-framework's core is under the asset root.
 *
 * @updated   2019-12-16
 * @updated   2022-10-07 Moved from op-app-skeleton-2022.
 */
RootPath('op', dirname(__DIR__));

/** doc:/
 *
 */
RootPath('doc', getcwd());

/** app:/
 *
 */
RootPath('app', getcwd() .'/'. dirname($_SERVER['SCRIPT_FILENAME']));
