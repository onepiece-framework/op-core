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

/* @var $trace array */
$file     = $trace['file']     ?? null;
$line     = $trace['line']     ?? null;
$class    = $trace['class']    ?? null;
$type     = $trace['type']     ?? null;
$function = $trace['function'] ?? null;
$args     = $trace['args']     ?? null;

//	...
if( $file ){
	$file = CompressPath($file);
	$file = str_pad($file, 35, ' ', STR_PAD_RIGHT);
	//	...
	$args = serialize($args);
}else{
	$args = '';
}

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
$trace = "{$file} {$line} - {$bulk}({$args})";

//	...
return $trace;
