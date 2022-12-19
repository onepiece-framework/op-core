<?php
/** op-core:/testcase/sandbox.php
 *
 * @created   2022-10-12
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

//	...
$int   =  1 ;
$str   = '1';
$arr[] = null;
$arr[] = true;
$arr[] = false;

//	...
$result = OP::Sandbox('sandbox.phtml', $int, $str, $arr, null);

//	...
D($result);
