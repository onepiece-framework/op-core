<?php
/** op-core:/testcase/action.php
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

//	...
$metapath = new MetaPath();
D($metapath->List());

//	...
$metapath->Set('test', __DIR__);
D($metapath->List());

//	...
D($metapath->Get('test'));

//	...
D($metapath->Encode(__DIR__.'/hoge'));

//	...
D($metapath->Decode('test:/'));
