<?php
/** op-core:/testcase/OP.php
 *
 * @created    2023-04-01
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
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
$methods = ['isAdmin','isLocal','isHttp'];

//  ...
foreach( $methods as $method ){
    $result[$method] = OP()->$method();
}

//  ...
D($result);
