<?php
/** op-core:/ci/Cookie.php
 *
 * @created   2022-10-31
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

/* @var $ci \OP\UNIT\CI */
$ci = new \OP\UNIT\CI;

//	Get
$result = 'Notice: Cookie can not be used in the shell environment.';
$args   = null;
$ci->Set('Get', $result, $args);

//	Set
$result = 'Notice: Cookie can not be used in the shell environment.';
$args   = ['key','value'];
$ci->Set('Set', $result, $args);

//	...
return $ci->GenerateConfig();
