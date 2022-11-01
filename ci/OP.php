<?php
/** op-core:/ci/OP.php
 *
 * @created   2022-11-01
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

//	Router
$args   = null;
$result = Unit('Router');
$ci->Set('Router', $result, $args);

//	Template
$args   = null;
$result = Unit('Template');
$ci->Set('Template', $result, $args);

//	Layout
$args   = null;
$result = Unit('Layout');
$ci->Set('Layout', $result, $args);

//	Notice
$args   = null;
$result = OP::Notice();
$ci->Set('Notice', $result, $args);

//	MetaPath
$args   = null;
$result = OP::MetaPath();
$ci->Set('MetaPath', $result, $args);

//	Config
$args   = null;
$result = OP::Config();
$ci->Set('Config', $result, $args);

//	_Function
$args   = ['IsInt',1];
$result =  true;
$ci->Set('_Function', $result, $args);

//	Unit
$args   = 'Dump';
$result = Unit('Dump');
$ci->Set('Unit', $result, $args);

//	RootPath
$args   = 'op';
$result = dirname(__DIR__).'/';
$ci->Set('MetaRoot', $result, $args);

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
$result = OP::MetaPath('core:/OP.class.php').' #363 - include()';
$ci->Set('DebugBacktraceToString', $result, $args);

//	Request
$args   = null;
$result = OP::Request();
$ci->Set('Request', $result, $args);

//	...
return $ci->GenerateConfig();
