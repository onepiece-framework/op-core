<?php
/** op-core:/testcase/template.php
 *
 * @created   2022-03-15
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
if( $_GET['hoge'] ?? true ){
	Template('hoge.phtml');
}

//	...
if( $_GET['array'] ?? true ){
	Template('template.phtml', ['foo','bar']);
}

//	...
Template('template.phtml', ['_GET'=>false]);
