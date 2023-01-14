<?php
/** op-core:/include/ci_testcase.php
 *
 * @created    2023-01-12
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
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
static $app_root, $testcase;

//	...
if(!$app_root ){
	$app_root = RootPath('app');
	$display  = OP::Request('display') ?? 1;
	$config   = Config::Get('ci');
	$execute  = $config['testcase']['execute'];
	$testcase = $config['testcase']['root'];
	$testcase = rtrim($testcase, '/').'/';
}

//	...
if(!$execute ){
	return;
}

/* @var $args array */
$path = $args['path'];
$dirs = explode('/', $path);

//	...
if( empty($dirs[1]) ){
	//	In case of skeleton.
}else if( $dirs[1] === 'unit' ){
	$kind = $dirs[2];
	$unit = $dirs[2];
}else{
	$kind = $dirs[1];
}

//	...
if(!chdir($app_root.$path) ){
	throw new \Exception("Change directory failed. ({$app_root}{$path})");
}

//	...
if( $unit ?? null ){
	//	...
	$config = OP::Config($unit);

	//	...
	if(!($config['ci'] ?? true)){
		return;
	}
}

//	Do each testcase.
$list = glob('testcase/*.php');
foreach( $list as $full_path ){
	//	file name.
	$file = basename($full_path);

	//	Check under bar file.
	if( $file[0] === '_' ){
		continue;
	}

	//	Check upper case.
	if( $file[0] !== strtoupper($file[0]) ){
		continue;
	}

	//	URL
	$url = "{$testcase}{$kind}/" . substr($file, 0, -4);
	if( $display ){
		echo str_pad($file, 15, ' ', STR_PAD_RIGHT) . ": $url\n";
	}
}

return true;
