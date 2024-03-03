<?php
/** op-core:/function/ifset.php
 *
 * @independent 2024-03-02 from op-core:/Functions.php
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

/** ifset is if not set variable, set default value.
 *
 * <pre>
 * $var = ifset($_POST['undefine'], '1');
 * D( $_POST['undefine'] ); // 1
 * </pre>
 *
 * @deprecated 2020-11-19  -->  2023-02-19 --> 2024-03-03
 * @reborned   2023-02-19
 * @version    2.0
 * @see    http://qiita.com/devneko/items/ee83854eb422c352abc8
 * @param  mixed $check
 * @param  mixed $alternate
 * @return mixed
 */
function ifset(&$check, $alternate=null)
{
	//	...
	if(!isset($check) ){
		$check = $alternate;
	}

	//	...
	return $check;
}
