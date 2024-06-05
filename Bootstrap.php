<?php
/** op-core:/Bootstrap.php
 *
 * @created   2015-12-10   op-core(5)
 * @updated   2016-06-09   op-core(7)
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** declare
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/** Checking PHP version.
 *
 */
if( version_compare(PHP_VERSION, '7.0.0') < 0 ){
	exit('<p>onepiece-framework is not support to this php version.('.PHP_VERSION.')</p>');
}

/** Session management.
 *
 */
require_once(__DIR__.'/include/bootstrap_session.php');

/** Include blacklist.
 *
 */
require_once(__DIR__.'/include/bootstrap_blacklist.php');

/** Register autoloader.
 *
 */
require_once(__DIR__.'/Autoloader.php');

/** Include Error handler.
 *
 */
require_once(__DIR__.'/Error.php');

/** Include defines.
 *
 */
require_once(__DIR__.'/Defines.php');

/** Include custom functions.
 *
 */
require_once(__DIR__.'/Functions.php');

/** Include OP CORE.
 *
 */
require_once(__DIR__.'/trait/OP_CORE.php');

/** Include OP function.
 *
 */
require_once(__DIR__.'/function/OP.php');

/** Include JSON submitted process.
 *
 */
require_once(__DIR__.'/include/json.php');

/** Set default MIME
 *
 */
Env::Mime( Env::isShell() ? 'text/plain': 'text/html' );
