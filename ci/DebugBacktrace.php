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
          'unit:/ci/CI.class.php 312 - OP\DebugBacktrace->CI_Inspection("Auto")'.
          'unit:/ci/CI.class.php 255 - OP\UNIT\CI::CI_Args(Unknow(object),"Auto",Unknow(array),null,null)'.
          'unit:/ci/CI.class.php 231 - OP\UNIT\CI::CI_Method(Unknow(object),"Auto",Unknow(array))'.
          'unit:/ci/CI.class.php 179 - OP\UNIT\CI::CI_Class(Unknow(object))'.
          'unit:/ci/CI.class.php 104 - OP\UNIT\CI::CI()'.
          'app:/ci.php            50 - OP\UNIT\CI::Auto()';
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
