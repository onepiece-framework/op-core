<?php
/** op-core:/testcase/app_id.php
 *
 * @created   2021-10-20
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

//	...
D( Env::AppID() );
D( Env::AppID('testcase') );
