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
 * @deprecated 2024-08-07 The functionality to execute the endpoint has been delegated to the unit of App.
 * @created   2021-04-21
 * @param     string       $end_point
 * @return    string
 */
function Content(        $end_point=null)
{
	//	...
	static $_content;

	//	If the End-Point argument is empty, content is expected to be output.
	//	If the content is also empty, it will be execute in the unit of app.
	if( empty($end_point) and empty($_content) ){
		/** A great treasure in onepiece
		 *
		 *  1. OP() return App object.
		 *  OP()->App()->Content();
		 *
		 *  2. OP() functions Unit() method is always return already instantiated object.
		 *  OP()->Unit('App')->Content();
		 *
		 *  3. OP\Unit is mapping unit.
		 *  OP()->Unit()->App()->Content();
		 */
		$app = OP()->Unit('App');
		if( method_exists($app, 'Content') ){
			$app->Content();
		} else {
			Notice::Set("App unit has not been Content() method.");
		}
		return null;
	}

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
	if(!file_exists($end_point) ){
		Notice::Set("This end-point is not exists.");
		return null;
	}

	//	...
	ob_start();

	//	Change directory.
	$save_dir = getcwd();
	chdir( dirname($end_point) );

	//	Execute end-point.
	require_once($end_point);

	//	...
	chdir($save_dir);

	//	...
	$_content = ob_get_clean();

	//	Content hash is for ETag.
	return $_content ? md5( Env::AppID() .', '. $_content ): null;
}

/** If it is not called from anywhere, it will be output here.
 *
 * @created   2021-05-05
 */
register_shutdown_function(function(){
	Content();
});
