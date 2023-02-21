<?php
/** op-core:/ci/Session.php
 *
 * @created   2022-11-01
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

//	Get
$args   = 'self-check';
$result = null;
$ci->Set('Get', $result, $args);

//	Set
$args   = ['self-check', true];
$result = null;
$ci->Set('Set', $result, $args);

//	Session
$args   = null;
$result = ['self-check'=>true];
$ci->Set('Session', $result, $args);

//	...
return $ci->GenerateConfig();
