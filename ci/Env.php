<?php
/** op-core:/ci/Env.php
 *
 * @created   2022-10-18
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

//	isAdmin
$result = true;
$args   = null;
$ci->Set('isAdmin', $result, $args);

//	isLocalhost
$result = true;
$args   = null;
$ci->Set('isLocalhost', $result, $args);

//	isHttp
$result = false;
$args   = null;
$ci->Set('isHttp', $result, $args);

//	isHTTPs
$result = false;
$args   = null;
$ci->Set('isHTTPs', $result, $args);

//	isShell
$result = true;
$args   = null;
$ci->Set('isShell', $result, $args);

//	isCI
$result = true;
$args   = null;
$ci->Set('isCI', $result, $args);

//	Get(hoge)
$args   = 'hoge';
$result = 'Notice: This config file does not exist. (hoge)';
$ci->Set('Get', $result, $args);

//	Get(env)
$result = file_exists( OP::MetaPath('asset:/config/env.php') ) ? []: 'Notice: This config file does not exist. (env)';
$args   = 'env';
$ci->Set('Get', $result, $args);

//	Set(env, ['test'=>true])
$result = ['test'=>true];
$args   = ['env',['test'=>true]];
$ci->Set('Set', $result, $args);

//	Lang is deprecated --> Language
$result = file_exists( OP::MetaPath('asset:/config/locale.php') ) ? 'en': 'Notice: This config file does not exist. (locale)';
$args   = null;
$ci->Set('Lang', $result, $args);

//	Language
$result = null;
$args   = null;
$ci->Set('Language', $result, $args);

//	Country
$result = null;
$args   = null;
$ci->Set('Country', $result, $args);

//	Locale
$result = null;
$args   = null;
$ci->Set('Locale', $result, $args);

//	Charset
$result = 'utf-8';
$args   = null;
$ci->Set('Charset', $result, $args);

//	Ext - js
$result = 'text/javascript';
$args   = 'js';
$ci->Set('Ext', $result, $args);

//	Ext - css
$result = 'text/css';
$args   = 'css';
$ci->Set('Ext', $result, $args);

//	Ext - html
$result = 'text/html';
$args   = 'html';
$ci->Set('Ext', $result, $args);

//	Ext
$result = 'text/plain';
$args   = 'txt';
$ci->Set('Ext', $result, $args);

//	MIME
$method = 'MIME';
$result = 'text/plain';
$args   = '';
$ci->Set($method, $result, $args);

//	Time - Ice Age
$timestamp = '2020-10-10 12:00:01';
$time      = strtotime($timestamp);
$result    = $time;
$args      = [
	false,      // timezone support.
	$timestamp, // timestamp can local timezone.
];
$ci->Set('Time', $result, $args);

//	Timestamp - Ice Age
$args   = null;
$result = $timestamp;
$ci->Set('Timestamp', $result, $args);

/*
//	AppID
$result = 'self-check';
$args   = 'self-check';
$ci->Set('AppID', $result, $args);
*/

//	AppID - Duplicate
$result = 'Exception: AppID is already set. (CI)';
$args   = 'self-check';
$ci->Set('AppID', $result, $args);

//	Request
$result = OP()->Request();
$args   = null;
$ci->Set('Request', $result, $args);

//	Set - AdminIP
$result =  true;
$args   = [Env::_ADMIN_IP_,'153.127.64.66'];
$ci->Set('Set', $result, $args);

//	Set - AdminMail
$result =  true;
$args   = [Env::_ADMIN_MAIL_,'info@onepiece-framework.com'];
$ci->Set('Set', $result, $args);

//	AdminIP
$result = '153.127.64.66';
$args   = null;
$ci->Set('AdminIP', $result, $args);

//	AdminMail
$result = 'info@onepiece-framework.com';
$args   = null;
$ci->Set('AdminMail', $result, $args);

//	WebServer
$result = 'cli';
$args   = null;
$ci->Set('WebServer', $result, $args);

//	...
return $ci->GenerateConfig();
