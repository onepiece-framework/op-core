<?php
/** op-core:/ci/Cookie.php
 *
 * @created   2022-10-31
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

//	Get
$result = 'Cookie can not be used in the shell environment.';
$args   =  null;
$ci->Set('Get', $result, $args);

//	Get
$result = 'Cookie can not be used in the shell environment.';
$args   = ['count','1'];
$ci->Set('Set', $result, $args);

//	...
return $ci->GenerateConfig();