<?php
/** op-core:/include/DebugBacktraceToString.php
 *
 * @created   2022-10-31
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** declare
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/* @var array $traces */
$file     = $traces['file']     ?? null;
$line     = $traces['line']     ?? null;
$class    = $traces['class']    ?? null;
$type     = $traces['type']     ?? null;
$function = $traces['function'] ?? null;
$args     = $traces['args']     ?? null;

//	...
if( $type ){
	$bulk = $class.$type.$function;
}else{
	$bulk = $function;
}

//	...
if( $args ){
	$args = serialize($args);
}

//	...
$trace = "{$file} #{$line} - {$bulk}({$args})";

//	...
return $trace;
