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
$app_id = 'self-check';

//	...
$config['_Init'][]  = ['result' => 'ci', 'args' => 'CI'];
$config['_Fetch'][] = ['result' => null, 'args' => 'ci'];
$config['Get'][]    = [
	'args'   => 'app_id',
	'result' => [
		'app_id' => $app_id,
	],
];
$config['Set'][]    = [
	'args'   => ['app_id', ['execute'=>false]],
	'result' => [
		'app_id'  => $app_id,
		'execute' => false,
	],
];

//	...
return $config;
