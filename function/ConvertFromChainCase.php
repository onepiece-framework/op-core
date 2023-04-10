<?php
/** op-core:/function/ConvertToChainCase.php
 *
 * @created     2023-04-10
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

/** Convert to Camel-case from Chain-case.
 *
 * <pre>
 * 'FooBar'   = ConvertToChainCase('foo-bar');
 * 'iPhone'   = ConvertToChainCase('-i-phone');
 * 'URL'      = ConvertToChainCase('u-r-l');
 * 'HogeHoge' = ConvertToChainCase(' HOGE - HoGe ');
 * </pre>
 *
 * @created     2023-04-10
 * @param       string      $origin
 * @return      string
 */
function ConvertFromChainCase(string $origin):string
{
    //  ...
    $origin = strtolower($origin);

    //  ...
    if( $origin[0] === '-' ){
        $first_char = $origin[1];
    }

    //  ...
    $temp = explode('-', $origin);
    $temp = array_map(function($part){
        $part = trim($part);
        return $part ? ucfirst($part): '';
    }, $temp);
    $temp = join('', $temp);

    //  ...
    if( $first_char ?? null ){
        $temp[0] = $first_char;
    }

    //  ...
    return $temp;
}
