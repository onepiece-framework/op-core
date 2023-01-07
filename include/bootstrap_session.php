<?php
/** op-core:/include/bootstrap_session.php
 *
 *  1. Auto start session.
 *  2. Separate session ID for each PHP version.
 *  3. SameSite support.
 *
 * @created    2023-01-06
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

/** For SameSite
 *
 */
//	Get current values.
$params   = session_get_cookie_params();
//	Check if https.
$secure   = $_SERVER['REQUEST_SCHEME']==='https' ? true: false;
//	Always true.
$httponly = true;
//	None is required for https.
$samesite = $secure ? 'None':'Lax';

//	Branch by PHP version.
if( version_compare(PHP_VERSION, '7.3.0') <= 0 ){
	//	Under 7.3
	$params['path'] .= "; SameSite={$samesite}";
	session_set_cookie_params($params['lifetime'], $params['path'], $params['domain'], $secure, $httponly);
}else{
	//	Upper 7.3
	$params['secure']   = $secure;
	$params['httponly'] = $httponly;
	session_set_cookie_params($params);
}

//	Get default session name.
$name = session_name();

//	Add PHP version to session name, Because to run different versions of PHP at the same time by PHP-FPM.
//	OP to hide the PHP version, so hash. But, leave as is for localhost.
$php_version_id = ($_SERVER['REMOTE_ADDR'] === '::1') ? PHP_VERSION_ID: substr(md5((string)PHP_VERSION_ID), 0, 5);
session_name($name .'_'. $php_version_id);

//	Start session.
if(!session_start() ){
	$line = __LINE__;
	echo "asset:/core/Bootstrap.php #{$line} - Session start was failed.\n";
	exit($line);
}
