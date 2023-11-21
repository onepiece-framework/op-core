<?php
/** op-core:/ci/DebugBacktrace.php
 *
 * @created     2023-11-06
 * @version     1.0
 * @package     op-core
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

//  ...
$ci = OP::Unit('CI');

//  Auto
$backtraces = debug_backtrace();
$args   = [];
$result = 'core:/trait/OP_CI.php  66 - OP\DebugBacktrace::Auto()'.
          'unit:/ci/CI.class.php 496 - OP\DebugBacktrace->CI_Inspection("Auto")'.
          'unit:/ci/CI.class.php 412 - OP\UNIT\CI_Client::CI_Args(Unknow(object),"Auto",Unknow(array),null,null)'.
          'unit:/ci/CI.class.php 383 - OP\UNIT\CI_Client::CI_Method(Unknow(object),"Auto",Unknow(array))'.
          'unit:/ci/CI.class.php 319 - OP\UNIT\CI_Client::CI_Class(Unknow(object))'.
          'unit:/ci/CI.class.php 239 - OP\UNIT\CI_Client->CI()'.
          'unit:/ci/CI.class.php 118 - OP\UNIT\CI_Client->Auto()'.
          'unit:/ci/CI.class.php  82 - OP\UNIT\CI->Single()'.
          'unit:/ci/CI.class.php  52 - OP\UNIT\CI->All()'.
          'app:/ci.php            50 - OP\UNIT\CI->Auto()';
$ci->Set('Auto', $result, $args);

//  Numerator
$args   = [$backtraces[0]];
$result = 'core:/function/Template.php  95 - include()';
$ci->Set('Numerator', $result, $args);

//  Args
$args   = [];
$result = '';
$ci->Set('Args', $result, $args);

//  Arg
$args   = null;
$result = 'null';
$ci->Set('Arg', $result, $args);

//  ...
return $ci->GenerateConfig();
