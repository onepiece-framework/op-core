<?php
/** op-core:/include/ParseURL.php
 *
 * @created   2022-12-30
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

//	...
declare(strict_types=1);

//	...
namespace OP;

//	...
foreach(['scheme','host','port','path','file','ext','query'] as $key){
	$parsed[$key] = null;
}

/* @var $url string */
$parsed = array_merge($parsed, parse_url($url));

//	...
$path = $parsed['path'];

//	...
if( $path[strlen($path)-1] !== '/' ){
	//	...
	$file = basename($parsed['path']);
	//	...
	if( $pos = strrpos($file, '.') ){
		$ext = substr( $file, $pos+1 );
		$parsed['file'] = $file;
		$parsed['ext']  = $ext;
	}
}

//	...
return $parsed;
