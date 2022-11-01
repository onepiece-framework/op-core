<?php
/** op-core:/testcase/config.php
 *
 * @created   2021-10-18
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
if(!$target = $_GET['target'] ?? null ){
	Html('target is empty.');
	return;
}

//	...
D( Config::Get($target) );

//	...
D( OP::Config($target) );

//	...
D( OP::Config($target,['foo'=>'bar']) );

//	...
D( OP::Config()->Set($target, ['hoge'=>'fuga']) );

//	...
D( Config::Get($target) );
