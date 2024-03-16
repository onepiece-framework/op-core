<?php
/** op-core:/function/DebugBacktrace.class.php
 *
 * @created     2023-11-06
 * @version     1.0
 * @package     op-core
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/** declare
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/** Display debug_backtrace() variable.
 *
 * @created     2023-11-06
 * @version     1.0
 * @package     op-core
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */
class DebugBacktrace
{
    /** use
     *
     */
    use OP_CORE, OP_CI;

    /** Padding of file path.
     *
     * @var integer
     */
    static private $_file_path_padding = 20;

    /** Automatically display.
     *
     * @param   array   $backtrace
     */
    static function Auto( $backtrace=[] )
    {
        //  ...
        if( empty($backtrace) ){
            $backtrace = debug_backtrace();
        }

        //  ...
        foreach( $backtrace as $numerator ){
            echo self::Numerator($numerator);
        }
    }

    /** Numerator
     *
     * @param   array   $numerator
     * @return  string
     */
    static function Numerator( array $numerator ) : string
    {
        //  ...
        $file     = $numerator['file']     ?? '';
        $line     = $numerator['line']     ?? '';
        $class    = $numerator['class']    ?? '';
        $type     = $numerator['type']     ?? '';
        $function = $numerator['function'] ?? '';
        $args     = $numerator['args']     ?? [];

        //  ...
        if( $file ){
            $file = CompressPath($file);
        }
        $file = str_pad($file, self::$_file_path_padding, ' ', STR_PAD_RIGHT);
        if( self::$_file_path_padding < $len = strlen($file) ){
            self::$_file_path_padding = $len;
        }

        //  ...
        $line = (string)$line;
        $line = str_pad($line,  3, ' ', STR_PAD_LEFT );

        //  ...
        if( $type ){
            $bulk = $class.$type.$function;
        }else{
            $bulk = $function;
        }

        //  ...
        $args = self::Args($args);

        //  ...
        return "{$file} {$line} - {$bulk}({$args})";
    }

    /** Converts the argument array to a string and returns it.
     *
     * @param   array   $args
     * @return  string
     */
    static function Args(array $args=[]) : string
    {
        //  ...
        $join = [];

        //  ...
        foreach( $args as $arg){
            $join[] = self::Arg($arg);
        }

        //  ...
        return join(',', $join);
    }

    /** Convert variable to string.
     *
     * @param   mixed
     * @return  string
     */
    static function Arg($arg) : string
    {
        //  ...
        switch( $type = gettype($arg) ){
            case 'NULL':
                $arg = 'null';
                break;

            case 'boolean':
                $arg = $arg ? 'true':'false';
                break;

            case 'integer':
            case 'double':
                $arg = (string)$arg;
                break;

            case 'string':
                $arg = '"'.$arg.'"';
                break;

            case 'object':
                $arg = get_class($arg);
                break;

			case 'array':
				$arg = json_encode($arg);
				$arg = str_replace('\/', '/', $arg);
				break;

            default:
                $arg = "Undefined:{$type}";
        }

        //  ...
        return $arg;
    }
}
