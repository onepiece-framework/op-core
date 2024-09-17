<?php
/** op-core:/function/IsInt.php
 *
 * @created   2020-10-31
 * @package   op-core
 * @version   1.0
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

 /** namespace
 *
 */
namespace OP;

/** Check is integer.
 *
 * @created   2020-10-31
 * @param     string|integer $v
 * @param     boolean        true is check if positive
 * @return    boolean
 */
function IsInt($v, $p=false) : bool
{
	//	Variable type is int.
	if( is_int($v) ){
		return true;
	}

	//	Not numeric string.
	if(!is_numeric($v) ){
		return false;
	}

	//	Variable type is float.
	if( is_float($v) ){
		return false;
	}

	//	Is float string.
	if( strpos($v, '.') ){
		return false;
	}

	//	Is negative integer.
	if( $p and $v < 0 ){
		return false;
	}

	//	...
	return true;
}
