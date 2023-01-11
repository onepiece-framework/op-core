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
if( Env::AppID() !== OP::AppID() ){
	Notice("OP::AppID() is broken.");
}

//	...
try {
	//	...
	D( Env::AppID() );
	D( Env::AppID('testcase') );
} catch ( \Throwable $e ){
	//	...
	D($e->getMessage());

	//	...
	if( Notice::Has() ){
		D( Notice::Get()['message'] );
	}else{
		/* CI is in used.
		Notice::Set("Feature of set AppID by argument will deprecated.");
		*/
	}



	//	...
	return;
}

//	...
Notice("Please correct can duplicate registration of AppID.");
