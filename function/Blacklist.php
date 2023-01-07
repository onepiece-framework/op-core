<?php
/** op-core:/function/Blacklist.php
 *
 * @created   2020-05-12
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/** Blacklist
 *
 * @created   2020-05-12
 * @param     string       $reason
 * @return    boolean      $result
 */
function Blacklist(?string $reason)
{
	//	Generate key by client ip-address.
	$key = md5($_SERVER['REMOTE_ADDR']);
	$key = substr($key, 0, 10);

	//	true is add blacklist.
	//	false is, Is blacklist?
	if( $reason ){
		//	Save blacklist to apcu.
		apcu_add($key, $reason);
	}else{
		//	Fetch saved blacklist from apcu.
		$reason = apcu_fetch($key);
	}

	//	Set deny reason.
	if( $reason ){
		$_SESSION[_OP_CORE_BLACKLIST_] = $reason;
		Cookie::Set($key, $reason);
	}

	//	Check from SESSION
	if( $result = $_SESSION[_OP_CORE_BLACKLIST_] ?? null ){
		//	Found
	}else
	//	Check from Cookie
	if( $result = Cookie::Get($key) ){
		//	Found
	}else{
		$result = false;
	}

	//	Return result.
	return $result;
}
