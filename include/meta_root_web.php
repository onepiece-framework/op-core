<?php
/** op-core:/include/meta_root_web.php
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
\OP\RootPath('op', dirname(__DIR__));

/** Real path.
 *
 * @updated   2022-10-07 Moved from op-app-skeleton-2022.
 */
\OP\RootPath('real', realpath(dirname($_SERVER['SCRIPT_FILENAME'])));

/** The document root is directly under the FQDN.
 *
 * @updated   2022-10-07 Moved from op-app-skeleton-2022.
 */
\OP\RootPath('doc'  , $_SERVER['DOCUMENT_ROOT']);

/** About the app directory.
 *
 * Care should be taken if the directory is a link.
 * A link is called an alias on Mac and a shortcut on Windows.
 * "SCRIPT_FILENAME" is path of URL.
 * Web Application needs a link path.
 * Don't be generate real path.
 *
 * @updated   2022-10-07 Moved from op-app-skeleton-2022.
 */
\OP\RootPath('app'  , dirname($_SERVER['SCRIPT_FILENAME']));
