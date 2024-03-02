<?php
/** op-core:/ci/Config.php
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
$config = [];

//	...
$app_id = 'CI';

//	...
$config['_Init'][]  = ['result' => 'ci', 'args' => 'CI'];
$config['_Fetch'][] = ['result' => null, 'args' => 'ci'];
$config['Get'][]    = [
	'args'   => _OP_APP_ID_,
	'result' => 'CI',
	/*
	'result' => [
		'app_id' => $app_id,
	],
	*/
];
$config['Set'][]    = [
	'args'   => ['ci', ['test'=>true]],
	'result' => [
		'app_id' => 'CI',
		'test'   => true,
	],
];

//	...
//$ci = OP::Unit('CI');
$ci = new \OP\UNIT\CI;

//	...
$key = md5(__FILE__);

//	Get - Key name is empty.
$result = '';
$args   = null;
$ci->Set('Get', $result, $args);

//	Get
$result = '';
$args   = $key;
$ci->Set('Get', $result, $args);

//	Set - Init
$result = '';
$args   = [$key, ['a' => 'A', 'b' => 'B']];
$ci->Set('Set', $result, $args);

//	Set - Add
$result = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
$args   = [$key, ['c' => 'C']];
$ci->Set('Set', $result, $args);

//	...
return $config;
