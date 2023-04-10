<?php
/** op-core:/testcase/ConvertToChainCase.php
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

//  ...
Load('ConvertFromChainCase');

//  ...
$list = [];
$list['foo-bar']  = 'FooBar';
$list['-i-phone'] = 'iPhone';
$list['u-r-l']    = 'URL';
$list[' Hoge - HOGE '] = 'HogeHoge';

//  ...
$result = [];
foreach( $list as $source => $expected ){
    //  ...
    $result = ConvertFromChainCase($source);

    //  ...
    if( $expected !== $result ){
        Notice("Not the expected result. ($source, $expected, $result)");
    }

    //  ...
    Html("$source --> $result");
}
