<?php
/** op-core:/function/Hasha1.php
 *
 * @independent 2024-03-02
 * @version     1.0
 * @package     op-core
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/** use
 *
 */

/** To hash
 *
 * This function is convert to fixed length unique string from long or short strings.
 *
 * @param   null|integer|float|string|array|object $var
 * @param   integer  $length
 * @param   string   $salt
 * @return  string   $hash
 */
function Hasha1($var, $length=8, $salt=null)
{
	//	Can overwrite salt.
	if( $salt === null ){
		$salt = Env::AppID();
	};

	/** This change affects the hash value.
	if( is_string($var) ){
		//	...
	}else if( is_array($var) or is_object($var) ){
		$var = json_encode($var);
	}
	*/

	//	To json.
	$var = json_encode($var);

	//	...
	return substr(sha1($var . $salt), 0, $length);
}
