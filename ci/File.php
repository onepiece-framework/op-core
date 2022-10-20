<?php
/** op-core:/ci/File.php
 *
 * @created   2022-10-18
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

//	Touch
$result = null;
$args   = '/tmp/self-check.txt';
$ci->Set('Touch', $result, $args);

//	Create
$result = null;
$args   = '/tmp/self-check/test.txt';
$ci->Set('Create', $result, $args);

//	Mkdir
$result = null;
$args   = '/tmp/self-check-test';
$ci->Set('Mkdir', $result, $args);

//	...
return $ci->GenerateConfig();
