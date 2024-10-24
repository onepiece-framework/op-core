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
$backtrace  = [
	'file'  => __FILE__,
	'line'  => __LINE__,
	'class' => 'OP\UNIT\CI',
	'type'  => '->',
	'function' => 'Auto',
	'args'  => ['CI', 0, 1, true, false, null, 0.1, -1, OP()],
];
$backtraces[] = $backtrace;
$args   = [$backtraces];
$result = 'core:/ci/DebugBacktrace.php  27 - OP\UNIT\CI->Auto("CI",0,1,true,false,null,0.1,-1,OP\OP)'."\n";
$ci->Set('Auto', $result, $args);

//  Numerator
$args   = [$backtraces[0]];
$result = 'core:/ci/DebugBacktrace.php  27 - OP\UNIT\CI->Auto("CI",0,1,true,false,null,0.1,-1,OP\OP)'."\n";
$ci->Set('Numerator', $result, $args);

//  Args
$args   = [];
$result = '';
$ci->Set('Args', $result, $args);

//  Arg
$args   = null;
$result = 'null';
$ci->Set('Arg', $result, $args);

//  _file_path_padding_prepare
$args   = [[]];
$result = null;
$ci->Set('_file_path_padding_prepare', $result, $args);

//  _file_path_padding
$args   = __DIR__;
$result = 'core:/ci/           ';
$ci->Set('_file_path_padding', $result, $args);

//  ...
return $ci->GenerateConfig();
