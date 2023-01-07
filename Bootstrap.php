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

/** Checking PHP version.
 *
 */
if( version_compare(PHP_VERSION, '7.0.0') < 0 ){
	exit('<p>onepiece-framework is not support to this php version.('.PHP_VERSION.')</p>');
}

/** Session management.
 *
 */
if(!session_id() and isset($_SERVER['REQUEST_SCHEME']) ){
	require_once(__DIR__.'/include/bootstrap_session.php');
}

/** Include blacklist.
 *
 */
require_once(__DIR__.'/include/bootstrap_blacklist.php');

/** Register autoloader.
 *
 */
include_once(__DIR__.'/Autoloader.php');

/** Include Error hendler.
 *
 */
include_once(__DIR__.'/Error.php');

/** Include defines.
 *
 */
include_once(__DIR__.'/Defines.php');

/** Include custome functions.
 *
 */
include_once(__DIR__.'/Functions.php');

/** Include OP CORE.
 *
 */
include_once(__DIR__.'/trait/OP_CORE.php');

/** Include OP function.
 *
 */
include_once(__DIR__.'/function/OP.php');

/** Include JSON submitted process.
 *
 */
include_once(__DIR__.'/include/json.php');

/** Set MIME
 *
 */
if( \OP\Env::isShell() ){
	$mime = 'text/plain';
}else{
	if(!$ext = \OP\OP::ParseURL($_SERVER['REQUEST_URI'])['ext']){
		$ext = \OP\OP::ParseURL($_SERVER['SCRIPT_NAME'])['ext'];
	}

	//	...
	if( $ext ){
		$mime = \OP\Env::Ext($ext);
	}
}
//	...
\OP\Env::Mime($mime);
