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
$test = [];

//	...
try {
	//	Get AppID.
	$test[__LINE__] = Env::AppID();
	//	Overwrite AppID.
	$test[__LINE__] = Env::AppID('testcase');
} catch ( \Throwable $e ){
	//	...
	$test[__LINE__] = $e->getMessage();

	//	...
	if( Notice::Has() ){
		$test[__LINE__] = Notice::Get()['message'];
	}else{
		/* CI is in used.
		Notice::Set("Feature of set AppID by argument will deprecated.");
		*/
	}

	//	...
	D($test);

	//	...
	return;
}

//	...
D($test);

//	...
Notice("Please correct can duplicate registration of AppID.");
