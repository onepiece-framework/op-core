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
$core_path = ConvertPath('core:/');
$core_path = realpath($core_path);

//	...
$config['_Init'][]  = [
	'args'   => null,
	'result' => 'Exception: OP\Config::_Init(): Argument #1 ($name) must be of type string, null given, called in '.$core_path.'/trait/OP_CI.php on line 53',
];
//	...
$config['_Fetch'][]  = [
	'args'   => null,
	'result' => 'Exception: OP\Config::_Fetch(): Argument #1 ($name) must be of type string, null given, called in '.$core_path.'/trait/OP_CI.php on line 53',
];
//	...
$config['Get'][]  = [
	'args'   => null,
	'result' => 'Exception: OP\Config::Get(): Argument #1 ($name) must be of type string, null given, called in '.$core_path.'/trait/OP_CI.php on line 53',
];
//	...
$config['Set'][]  = [
	'args'   => null,
	'result' => 'Exception: OP\Config::Set(): Argument #1 ($name) must be of type string, null given, called in '.$core_path.'/trait/OP_CI.php on line 53',
];
//	...
$config['Get'][]  = [
	'args'   => 'ci',
	'result' => [
		'ci' => true,
	],
];
//	...
$config['Set'][]  = [
	'args'   => ['ci',
		['ci' => false],
	],
	'result' => [
		'ci' => false,
	],
];
//	...
$config['Set'][]  = [
	'args'   => ['ci',
		['test' => true],
	],
	'result' => [
		'ci'   => false,
		'test' => true,
	],
];

/*
$config['_Init'][]  = ['result' => 'ci', 'args' => 'CI'];
$config['_Fetch'][] = ['result' => null, 'args' => 'ci'];
$config['_Fetch'][] = [
	//	Already included.
	'result' => 'Exception: Return value is not array. (boolean:true, asset:/unit/ci/config.php)',
	'args'   => 'ci',
];
/*
$config['Get'][]    = [
	'args'   => _OP_APP_ID_,
	'result' => $app_id,
	'result' => [
		'app_id' => $app_id,
	],
];
$config['Set'][]    = [
	'args'   => ['ci', ['test'=>true]],
	'result' => [
		'app_id' => $app_id,
		'test'   => true,
	],
];
*/

//	...
return $config;

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
