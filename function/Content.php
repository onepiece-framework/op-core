<?php
/** op-core:/function/Content.php
 *
 * @created   2021-04-21
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

/** Content
 *
 * @created   2021-04-21
 * @param     string       $end_point
 * @return   ?string       $hash of $_content
 */
function Content(?string $end_point=null) : ?string
{
	//	...
	static $_content;

	//	$end_point if empty, echo $_content.
	if( empty($end_point) ){
		//	...
		echo $_content;

		//	...
		$_content = null;

		//	...
		return null;
	}

	//	...
	ob_start();

	//	Execute end-point.
	require_once($end_point);

	//	...
	$_content = ob_get_clean();

	//	Content hash is for ETag.
	return $_content ? md5($_content): null;
}

/** If it is not called from anywhere, it will be output here.
 *
 * @created   2021-05-05
 */
register_shutdown_function(function(){
	Content();
});
