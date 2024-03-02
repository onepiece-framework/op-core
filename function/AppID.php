<?php
/** op-core:/function/AppID.php
 *
 * @independent 2024-03-02
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

/** use
 *
 */

/** Set / Get AppID
 *
 * @created  2024-03-02
 * @param   ?string      $app_id
 * @return  ?string
 */
function AppID(?string $app_id) : ?string
{
	//	...
	static $_AppID;

	//	...
	if( $app_id ){
		$_AppID = $app_id;
	}

	//	...
	if(!$_AppID ){
		$_AppID = include( MetaPath::Decode('asset:/config/app_id.php') )['app_id'] ?? substr(md5(__FILE__), 0, 10);
	}

	//	...
	return $_AppID;
}
