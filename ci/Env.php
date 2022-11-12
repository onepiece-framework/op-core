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
$ci = new CI();

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

//	Get(Config)
$result = [];
$args   = 'env';
$ci->Set('Get', $result, $args);

//	Get(Config)
$args   = 'hoge';
$result = 'This config file is not exists. (hoge)';
$ci->Set('Get', $result, $args);

//	Set(Config)
$result = ['test'=>true];
$args   = ['env',['test'=>true]];
$ci->Set('Set', $result, $args);

//	Lang is deprecated --> Language
$result = 'en';
$args   = null;
$ci->Set('Lang', $result, $args);

//	Language
$result = 'en';
$args   = null;
$ci->Set('Language', $result, $args);

//	Country
$result = 'us';
$args   = null;
$ci->Set('Country', $result, $args);

//	Locale
$result = 'en:us';
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

//	Mime
$result = 'text/plain';
$args   = null;
$ci->Set('Mime', $result, $args);

//	Time - Ice Age
$timestamp = '2020-10-10 12:00:01';
$time   = strtotime($timestamp);
$result = $time;
$args   = [true, $timestamp];
$ci->Set('Time', $result, $args);

//	Timestamp - Ice Age
$result = $timestamp;
$args   = null;
$ci->Set('Timestamp', $result, $args);

//	AppID
$result = 'self-check';
$args   = 'self-check';
$ci->Set('AppID', $result, $args);

//	AppID - Duplicate
$result = 'Exception: AppID is already set. (self-check)';
$args   = 'self-check2';
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

//	...
return $ci->GenerateConfig();
