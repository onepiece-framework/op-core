<?php
/** op-core:/testcase/html_pass_through.php
 *
 * @created   2022-12-19
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
foreach([
	'txt'  => '',
	'js'   => '',
	'css'  => '',
	'html' => '',
] as $ext => $text){
	$url = OP()->MetaPath(__DIR__, true) . $ext;
	$txt = file_get_contents('//'.$_SERVER['HTTP_HOST'].$url);
	if( $txt !== $text ){
		OP()->Notice("Unmatch: $url");
	}
}
