<?php
/** op-core:/include/request_cli.php
 *
 * @created   2020-04-24
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

//	...
$_request = [];

/** Arguments
 *
 * //  0       1       2
 * php app.php foo/bar test=1 // arg is 3.
 * //  0               1
 * php app.php         test=1 // arg is 2.
 *
 */
foreach( array_slice($_SERVER['argv'], 1) as $arg ){

	if( $pos = strpos($arg, '=') ){
		$key = substr($arg, 0, $pos);
		$var = substr($arg, $pos+1);
	}else{
		$key = $arg;
		$var = null;
	};

	//	...
	$_request[$key] = $var;
}

//	...
return $_request;
