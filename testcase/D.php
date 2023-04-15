<?php
/** op-core:/testcase/d.php
 *
 * @created   2021-05-05
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
D(null, true, false, 'true', 'false', 'null');
D(0, 1, '1', 0.1, '0.1', ' 123 ', ' 1.0 ');
D('<h1>h1</h1>', '', ' ', "\r\n\t");

//	...
$array = [];
$array[] = true;
$array[] = false;
$array[] = null;
$array[] = 0;
$array[] = '0';
$array[] = 0.0;
$array[] = '0.0';
$array[] = [
	'string' => 'This is string.',
	'array' => [
		'foo'  => 'bar',
		'hoge' => 'hoge',
	],
];
D($array);
