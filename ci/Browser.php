<?php
/** op-core:/ci/Browser.php
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

/* @var $ci UNIT\CI */
$ci = OP::Unit('CI');

//	_Init
$args   = '';
$result = "core:/Browser.class.php # 34 - ";
$ci->Set('_Init', $result, $args);

//	Init
$args   = '';
$result = "core:/Browser.class.php # 39 - ";
$ci->Set('Init', $result, $args);

//	Mac
$args   = '';
$result = false;
$ci->Set('Mac', $result, $args);

//	...
return $ci->GenerateConfig();
