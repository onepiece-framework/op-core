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
		//	...
		if( self::$_is_admin === null ){
			self::_is_admin();
		}

		//	...
		if(!self::$_is_admin ){
			OP::Notice("Your not is admin.");
			return;
		}

        //  ...
        $file     = $numerator['file']     ?? '';
        $line     = $numerator['line']     ?? '';
        $class    = $numerator['class']    ?? '';
        $type     = $numerator['type']     ?? '';
        $function = $numerator['function'] ?? '';
        $args     = $numerator['args']     ?? [];

        /*
        //  ...
        if( $file ){
            if( $temp = CompressPath($file) ){
                $file = $temp;
            }
        }
        $file = str_pad($file, self::$_file_path_padding, ' ', STR_PAD_RIGHT);
        if( self::$_file_path_padding < $len = strlen($file) ){
            self::$_file_path_padding = $len;
        }
        */
        $file = self::_file_path_padding($file);

        //  ...
        $line = (string)$line;
        $line = str_pad($line,  3, ' ', STR_PAD_LEFT );

        //  ...
        $args = self::Args($args);

        //  ...
        if( $function ){
            $function .= "({$args})";
        }

        //	...
        if( $type ){
            $bulk = $class.$type.$function;
        }else{
            $bulk = $function;
        }

        //  ...
        return "{$file} {$line} - {$bulk}\n";
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
                $arg = str_replace(["\r","\n","\t"],['\r','\n','\t'], $arg);
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
