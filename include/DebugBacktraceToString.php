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
$file = CompressPath($file);
$file = str_pad($file, 35, ' ', STR_PAD_RIGHT);

//	...
$line = (string)$line;
$line = str_pad($line,  3, ' ', STR_PAD_LEFT );

//	...
if( $type ){
	$bulk = $class.$type.$function;
}else{
	$bulk = $function;
}

//	...
$args = serialize($args);

//	...
$trace = "{$file} {$line} - {$bulk}({$args})";

//	...
return $trace;
