<?php
/** op-core:/Cookie.class.php
 *
 * @created   2017-02-25
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-21
 */
namespace OP;

/** Cookie
 *
 * FEATURE:
 * 1. Even the same key name is separated by AppID.
 *    That is, Even in the same domain, the same key name can be used.
 *    Because AppleID is different. Value is do not conflict.
 *
 * 2. Value is encrypted.
 *    Cookie is stored user's browser. That is, User can change freely.
 *
 * @created   2017-02-25
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class Cookie
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_CI;

	/** Get cookie value of key.
	 *
	 * @param  string $key
	 * @param  mixed  $default
	 * @return mixed
	 */
	static function Get($key, $default=null)
	{
		//	...
		if( Env::isShell() ){
			Notice('Cookie can not be used in the shell environment.');
			return;
		}

		//	Cache feature
		if( isset( $_SESSION['OP']['CORE']['COOKIE'][$key] ) ){
			return $_SESSION['OP']['CORE']['COOKIE'][$key];
		}

		//	...
		$key = Hasha1($key);

		//	...
		return isset($_COOKIE[$key]) ? unserialize( Encrypt::Dec($_COOKIE[$key]) ): $default;
	}

	/** Set cookie value.
	 *
	 * @param  string         $key
	 * @param  mixed          $val
	 * @param  mixed          $expire 2020-12-31, 86400(60*60*24)
	 * @param  array          $option
	 * @return boolean|string $date
	 */
	static function Set($key, $val, $expire=null, $option=null)
	{
		//	...
		if( Env::isShell() ){
			Notice('Cookie can not be used in the shell environment.');
			return;
		}

		//	Cache feature
		$_SESSION['OP']['CORE']['COOKIE'][$key] = $val;

		//	...
		$file = $line = null;

		//	Failed.
		if( headers_sent($file, $line) ){
			Notice::Set("Header has already been sent. ($file, $line)");
			return false;
		}

		//	...
		$key = Hasha1($key);

		/** Separate from ICE AGE time.
		 *  Because expire time is calculate by local browser.
		 */
		$time = time();

		//	null --> current time + 10 year
		if( $expire === null ){
			$expire = $time + (60*60*24*365*10);
		}else
		//	2020-01-01 --> 1577804400
		if(!is_numeric($expire) ){
			$expire = strtotime($expire);
		}else
		//	60 --> current time + 60 sec
		if( $expire < $time ){
			$expire+= $time;
		}

		//	...
		$path     = $option['path']     ?? ConvertURL('app:/');
		$domain   = $option['domain']   ?? $_SERVER['SERVER_NAME'];
		$secure   = $option['secure']   ?? false; // If TRUE, Sends the cookie to the server only for https.
		$httponly = $option['httponly'] ?? false; // If TRUE, Cookies can not be referenced from JavaScript.

		//	...
		$val = serialize($val);

		//	...
		$val = Encrypt::Enc($val);

		//	...
		if( $io = setcookie($key, $val, $expire, $path, $domain, $secure, $httponly) ){
			//	Successful.
			$_COOKIE[$key] = $val;
		}else{
			Notice::Set("Set cookie was failed.");
		}

		//	...
		$result = [
			'setcookie' => $io,
			'key'       => $key,
			'value'     => $val,
			'expire'    => [
				'time'  => $expire,
				'date'  => gmdate('Y-m-d H:i:s', $expire),
			]
		];

		//	...
		return $result;
	}

	/** User ID
	 *
	 *  This value is please limit to temporary operation.
	 *  Not suitable for permanent use.
	 *
	 * @created   2020-02-26
	 * @param     boolean      $init stored at create the first time UserID.
	 * @return    string       $user_id
	 */
	static function UserID(&$init=null)
	{
		//	...
		if( Env::isShell() ){
			return;
		}

		//	...
		$key = 'UserID';

		//	...
		if(!$user_id = self::Get($key) ){
			$user_id = md5($_SERVER['REMOTE_ADDR'].', '.microtime());

			//	...
			self::Set($key, $user_id);

			//	...
			if( isset($init) ){
				$init = true;
			}
		}

		//	...
		return $user_id;
	}
}
