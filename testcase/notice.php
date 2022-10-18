<?php
/** op-core:/testcase/notice.php
 *
 * @created   2021-05-05
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

//	Result is false.
D( Notice::Has() );

//	Register Notice message.
Notice("<h1>This is test.</h1>\nSub message.");

//	Result is true.
D( Notice::Has() );

//	Instanceate.
$notice = new Notice();

//	Result is true.
D( $notice->Has() );
