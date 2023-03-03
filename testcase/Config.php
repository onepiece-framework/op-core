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
$target = 'testcase';
$config = OP::Config($target);

//	Check
if( $config !== Config::Get($target) ){
	throw new \Exception("OP::Config({$target}) is broken.");
}

//	Set
$plus = ['foo'=>'bar'];
OP::Config($target, $plus);

//	Check
if( ($config + $plus) !== OP::Config($target) ){
	throw new \Exception("OP::Config({$target}, ['foo'=>'bar']) is broken,");
}

//	Check
if( OP::Config($target) !== Config::Get($target) ){
	throw new \Exception("OP::Config({$target}) is broken.");
}

//	get target from URL Query.
if( empty($target = OP::Request('target')) ){
	$target = 'app_id';
}

//	...
$target = OP::Request('target') ?? 'app_id';

//	...
foreach( glob( OP::MetaPath('asset:/config').'*.php' ) as $path ){
	$file = OP::ParseURL($path)['file'];
	$name = substr($file, 0, -4);
	echo "<p><a href='?target={$name}'>{$name}</a></p>";
	if( $target === $name ){
		$config = OP::Config($target);
		D($config);
	}
}
