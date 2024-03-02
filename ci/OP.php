<?php
/** op-core:/ci/OP.php
 *
 * @created   2022-11-01
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

//	App
$args   = null;
$result = 'OP\UNIT\App';
$ci->Set('App', $result, $args);

//	Api
$args   = null;
$result = 'OP\UNIT\Api';
$ci->Set('Api', $result, $args);

//	WebPack
$args   = null;
$result = 'OP\UNIT\WebPack';
$ci->Set('WebPack', $result, $args);

//	Router
$args   = null;
$result = 'OP\UNIT\Router';
$ci->Set('Router', $result, $args);

//	Template
$args   = null;
$result = 'OP\UNIT\Template';
$ci->Set('Template', $result, $args);

//	Layout
$args   = null;
$result = 'OP\UNIT\Layout';
$ci->Set('Layout', $result, $args);

//	Notice
$args   = null;
$result = 'OP\Notice';
$ci->Set('Notice', $result, $args);

//	MetaPath
$args   = null;
$result = 'OP\MetaPath';
$ci->Set('MetaPath', $result, $args);

//	Config
$args   = null;
$result = 'OP\Config';
$ci->Set('Config', $result, $args);

//	Env
$args   = '';
$result = 'OP\Env';
$ci->Set('Env', $result, $args);

//	_Function
$args   = ['IsInt',1];
$result =  true;
$ci->Set('_Function', $result, $args);

//	Unit
$args   = 'Dump';
$result = 'OP\UNIT\Dump';
$ci->Set('Unit', $result, $args);

/*
//  ...
$git_path  = RootPath('git');
$real_path = RootPath('real');
$core_path = dirname(__DIR__).'/';

if( strpos($core_path, $real_path) === 0 ){
	$pos = strlen($real_path) - strlen($core_path);
    $tmp = substr($core_path, $pos);
    $str = $git_path . $tmp;
}
*/

//	MetaRoot
$args   = 'op';
$result = OP()->ConvertAlias( dirname(__DIR__) ) . '/';
$ci->Set('MetaRoot', $result, $args);

/*
//	MetaRoot
$args   = 'core';
$result = OP()->ConvertAlias( __DIR__ );
$ci->Set('MetaRoot', $result, $args);
*/

//	MetaToURL
$args   = 'app:/';
$result = '/';
$ci->Set('MetaToURL', $result, $args);

//	MetaToPath
$args   = 'op:/';
$result = dirname(__DIR__).'/';
$ci->Set('MetaToPath', $result, $args);

//	MetaFromPath
$args   = __FILE__;
$result = 'core:/ci/OP.php';
$ci->Set('MetaFromPath', $result, $args);

//	Sandbox
$args   = 'core:/function/AppID.php';
$result =  1;
$ci->Set('Sandbox', $result, $args);

//	SandboxArgs
$args   = [[]];
$result = [];
$ci->Set('SandboxArgs', $result, $args);

//	ParseURL
$args   = '//localhost/index.html?1';
$result = [
	'scheme' =>  null,
	'host'   => 'localhost',
	'port'   =>  null,
	'path'   => '/index.html',
	'file'   => 'index.html',
	'ext'    => 'html',
	'query'  => '1',
];
$ci->Set('ParseURL', $result, $args);

//	DebugBacktraceToString
$args   = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
$result = 'core:/function/Template.php 115 - include()'."\n";
$ci->Set('DebugBacktraceToString', $result, $args);

//	GetTemplate
$args   = 'core:/testcase/email.txt';
$result = 'email.txt';
$ci->Set('GetTemplate', $result, $args);

//	Request
$args   = null;
$result = OP::Request();
$ci->Set('Request', $result, $args);

//	AppID
$args   = null;
$result = 'CI';
$ci->Set('AppID', $result, $args);

//	Time
$args   = null;
$result = \OP\Time();
$ci->Set('Time', $result, $args);

//	Timestamp
$args   = null;
$result = date('Y-m-d H:i:s', \OP\Time());
$ci->Set('Timestamp', $result, $args);

/* Api::_Init() is set to Env::MIME('text/json');
//	MIME
$args   = null;
$result = 'text/plain';
$ci->Set('MIME', $result, $args);

//	MIME - Replace
$args   = 'text/html';
$result = 'text/html';
$ci->Set('MIME', $result, $args);
*/

//	MIME - Replace
$args   = 'text/plain';
$result = 'text/plain';
$ci->Set('MIME', $result, $args);

//	...
return $ci->GenerateConfig();
