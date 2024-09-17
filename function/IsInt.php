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
 * @return    boolean
 */
function IsInt($v)
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

	//	...
	return true;
}
