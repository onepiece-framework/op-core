<?php
/** op-core:/include/bootstrap_blacklist.php
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

/** Deny access IP-Address
 *
 *  The values are hashed so that they do not duplicate.
 *
 * @var string
 */
define('_OP_CORE_BLACKLIST_', substr(md5(__FILE__), 0, 10), false);

/** If is shell not do blacklist check.
 *
 */
if( empty($_SERVER['REQUEST_SCHEME']) ){
	return;
}

/** Empty host name.
 *
 */
if( empty($_SERVER['HTTP_HOST']) ){
	$_SESSION[_OP_CORE_BLACKLIST_] = "Empty HTTP_HOST.";
}

/** Empty user agent.
 *
 */
if( empty($_SERVER['HTTP_USER_AGENT']) ){
	$_SESSION[_OP_CORE_BLACKLIST_] = "Empty HTTP_USER_AGENT.";
}

/** Deny access.
 *
 * @created   2020-05-11
 */
if( $_SESSION[_OP_CORE_BLACKLIST_] ?? null ){
	//	...
	echo "Your IP-Address in blacklist. ({$_SERVER['REMOTE_ADDR']})\n";
	//	...
	if( $_GET['debug'] ?? null ){
		//	...
		echo "{$_SESSION[_OP_CORE_BLACKLIST_]}\n";
	}
	//	...
	exit(__LINE__);
}
