<?php
/** op-core:/ci/Encrypt.php
 *
 * @created   2022-10-20
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

//	_iv
$result = '45c1881935b90f0d';
$args   = null;
$ci->Set('_iv', $result, $args);

//	_password
$result = '45c1881935b90f0d3f0ba2c18ab864e0';
$args   = null;
$ci->Set('_password', $result, $args);

//	Enc
$result = 'cl3Nz/lbpMk7UlevAVy/Lw==';
$args   = 'self-check';
$ci->Set('Enc', $result, $args);

//	Dec
$result = 'self-check';
$args   = 'cl3Nz/lbpMk7UlevAVy/Lw==';
$ci->Set('Dec', $result, $args);

//	...
return $ci->GenerateConfig();
