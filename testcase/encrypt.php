<?php
/** op-core:/testcase/encrypt.php
 *
 * @created   2021-10-22
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

//	...
$temp = [];

//	...
$temp['enc'] = Encrypt::Enc('test');

//	...
$temp['dec'] = Encrypt::Dec( $temp['enc'] );

//	...
D( $temp );
