<?php
/** op-core:/function/ConvertAlias.php
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

/** Convert to alias path from real path.
 *
 * <pre>
 * \OP\ConvertAlias(__DIR__); /System/Volumes/Data/www/localhost/ -> /www/localhost/
 * </pre>
 *
 * @created     2023-11-06
 * @param       string      $path
 * @return      string
 */
function ConvertAlias(string $path) : string
{
    //  static
    /* static */ $git_path  = RootPath('git');
    /* static */ $real_path = RootPath('real');

    //  Check if conversion is required.
    if( strpos($path, $git_path) === 0 ){
        //  No need to convert.
        return $path;
    }

    //  Checks if the argument path is real path.
    if( strpos($path, $real_path) === 0 ){
        $pos = strlen($real_path) - strlen($path);
        $tmp = substr($path, $pos);
        return $git_path . $tmp;
    }

    //  ...
    return $path;
}
