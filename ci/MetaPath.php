<?php
/** op-core:/ci/MetaPath.php
 *
 * @created   2022-10-12
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
$ci = new CI();

//	Set
$result = __DIR__.'/';
$args   = ['ci', '//'.__DIR__];
$ci->Set('Set', $result, $args);

//	Set - Duplicate entry
$result = 'Exception: This meta path already set. (ci, '.__DIR__.')';
$args   = ['ci', __DIR__];
$ci->Set('Set', $result, $args);

//	Set - Not exists
$result = 'Exception: This directory not exists. (/moge/)';
$args   = ['moge', '/moge/'];
$ci->Set('Set', $result, $args);

//	Set - Deny upper directory.
$result = 'Exception: Deny upper directory specify.';
$args   = ['upper', '../up'];
$ci->Set('Set', $result, $args);

//	Get
$result = __DIR__.'/';
$args   = ['ci'];
$ci->Set('Get', $result, $args);

//	Get - Not registered.
$result = null;
$args   = ['not'];
$ci->Set('Get', $result, $args);

//	List
$result = [
	'op'    => RootPath('op'),
	'doc'   => RootPath('doc'),
	'app'   => RootPath('app'),
	'asset' => RootPath('asset'),
	'ci'    => __DIR__.'/',
];
$args   = [];
$ci->Set('List', $result, $args);

//	Encode
$result = 'ci:/';
$args   = __DIR__;
$ci->Set('Encode', $result, $args);

//	Encode - Not registered.
$result = false;
$args   = 'not:/';
$ci->Set('Encode', $result, $args);

//	Decode
$result = __DIR__.'/';
$args   = 'ci:/';
$ci->Set('Decode', $result, $args);

//	URL
$result = __DIR__.'/';
$args   = 'ci:/';
$ci->Set('URL', $result, $args);

//	...
return $ci->GenerateConfig();
