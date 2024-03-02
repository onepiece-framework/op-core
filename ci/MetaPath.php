<?php
/** op-core:/ci/MetaPath.php
 *
 * @created   2022-10-12
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
$ci = OP::Unit('CI');

//	Set - Not exists directory
$result = 'Exception: This directory not exists. (/foo/bar/)';
$args   = ['www', '/foo/bar/'];
$ci->Set('Set', $result, $args);

//	Set
$result = '/etc/';
$args   = ['etc', '//etc//'];
$ci->Set('Set', $result, $args);

//	Set - Duplicate entry
$result = 'Exception: This meta path already set. (etc, /etc/)';
$args   = ['etc', '/etc/'];
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
$result = '/etc/';
$args   = ['etc'];
$ci->Set('Get', $result, $args);

//	Get - Not registered.
$result = null;
$args   = ['not'];
$ci->Set('Get', $result, $args);

//	List
$args   = [];
$result = [
	'git'      => RootPath('git'),
	'real'     => RootPath('real'),
	'doc'      => RootPath('doc'),
	'app'      => RootPath('app'),
	'asset'    => RootPath('asset'),
	'op'       => RootPath('op'),
	'core'     => RootPath('core'),
	'unit'     => RootPath('unit'),
	'layout'   => RootPath('layout'),
	'template' => RootPath('template'),
	'webpack'  => RootPath('webpack'),
	'module'   => RootPath('module'),
	'etc'      => '/etc/',
];
$ci->Set('List', $result, $args);

//	Encode
$args   = __DIR__;
$result = 'core:/ci/';
$ci->Set('Encode', $result, $args);

//	Encode - Not registered.
$args   = 'not:/';
$result = false;
$ci->Set('Encode', $result, $args);

//	Decode
$args   = 'etc://';
$result = '/etc/';
$ci->Set('Decode', $result, $args);

//	Decode - Current directory
$args   = './README.md';
$result = "Exception: Current related path cannot be specified. ({$args})";
$ci->Set('Decode', $result, $args);

//	Decode - Upper directory
$args   = '../index.php';
$result = 'Exception: Upper directory cannot be specified. (../index.php)';
$ci->Set('Decode', $result, $args);

//	Decode - Relative by current directory.
$args   = 'not_exist.php';
$result = "Exception: Does not exists meta label. ({$args})";
$ci->Set('Decode', $result, $args);

//	Decode - has query string
$args   = 'etc:/?foo=bar';
$result = '/etc/?foo=bar';
$ci->Set('Decode', $result, $args);

//	Decode - Does not exists
$args   = 'etc:/foo/bar';
$result = '/etc/foo/bar';
$ci->Set('Decode', $result, $args);

//	URL
$doc    = rtrim(OP::MetaPath('doc:/'),'/');
$args   = 'etc:/';
$result = "Notice: This path is not the document root path. (doc={$doc}, full=/etc/)";
$ci->Set('URL', $result, $args);

//	...
return $ci->GenerateConfig();
