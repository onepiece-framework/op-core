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
OP::Template('Template.phtml');
OP::Template('Template.phtml',['path'=>'overwrite']);
