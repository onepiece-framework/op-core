<?php
/** op-core:/testcase/ICEAGE.php
 *
 * @creation  2020-04-10
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
$iceage = '2020-01-01 00:00:00';

//	...
date_default_timezone_set('asia/tokyo');

//	...
$temp = [];
$temp['timezone'] = date_default_timezone_get();

//	...
$temp['realtime']['jpn'] =   date(_OP_DATE_TIME_);
$temp['realtime']['gmt'] = gmdate(_OP_DATE_TIME_);

//	...
$time = strtotime($iceage);
$temp['manual']['jpn'] =   date(_OP_DATE_TIME_, $time);
$temp['manual']['gmt'] = gmdate(_OP_DATE_TIME_, $time);

//	...
Env::Time(false, $iceage);
$temp['iceage']['target'] = $iceage;
/*
$temp['iceage']['time']['jpn'] = date(_OP_DATE_TIME_, Env::Time(false));
$temp['iceage']['time']['gmt'] = date(_OP_DATE_TIME_, Env::Time(true));
*/
$temp['iceage']['Timestamp']['jpn']  = Env::Timestamp(false);
$temp['iceage']['Timestamp']['gmt']  = Env::Timestamp(true);

//	...
if( $temp['manual']['jpn'] !== Env::Timestamp(false) ){
	Notice::Set("Env::Timestamp() is broken.");
}

//	...
if( $temp['manual']['jpn'] !== date(_OP_DATE_TIME_, Env::Time(false)) ){
	Notice::Set("Env::Time() is broken.");
}

//	...
D($temp);
