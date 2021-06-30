<?php
/** op-core:/function/Blacklist.php
 *
 * @created   2020-05-12
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** use
 *
 */

/** Blacklist
 *
 * @created   2020-05-12
 * @param     boolean      $register
 * @return    boolean      $result
 */
function Blacklist(bool $register=true)
{
	//	Generate key by client ip-address.
	$key = md5($_SERVER['REMOTE_ADDR']);

	//	true is add blacklist.
	//	false is, Is blacklist?
	if( $register ){
		//	...
		$io = true;

		//	Save blacklist to apcu.
		apcu_add($key, true);
	}else{
		//	Fetch saved blacklist from apcu.
		$io = apcu_fetch($key);
	}

	//	Set deny ip flag.
	if( $io ){
		$_SESSION[_OP_DENY_IP_] = true;
		Cookie::Set($key, true);
	}

	//	Check from SESSION
	if( $result = $_SESSION[_OP_DENY_IP_] ?? null ){
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
