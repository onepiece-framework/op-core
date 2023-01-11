<?php
/** op-core:/testcase/Unit.php
 *
 * @created   2019-12-13
 * @version   1.0
 * @package   op-module-testcase
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

//	...
$app1 = Unit('App');
$app2 = OP::Unit('App');

//	...
if( $app1 !== $app2  ){
	//	...
	Notice::Set("Different of Unit() and OP::Unit().");
}
