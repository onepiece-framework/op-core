<?php
/** op-core:/Functions.php
 *
 * @created   2016-11-16
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-19
 */
namespace OP;

/** Used class
 *
 */

/** Include
 *
 * @created   2020-01-01
 */
require_once(__DIR__.'/function/D.php');
require_once(__DIR__.'/function/Load.php');
require_once(__DIR__.'/function/Unit.php');
require_once(__DIR__.'/function/Encode.php');
require_once(__DIR__.'/function/Decode.php');
require_once(__DIR__.'/function/Notice.php');
require_once(__DIR__.'/function/Layout.php');
require_once(__DIR__.'/function/RootPath.php');
require_once(__DIR__.'/function/ConvertPath.php');
require_once(__DIR__.'/function/ConvertURL-2.php');
require_once(__DIR__.'/function/Template.php');
require_once(__DIR__.'/function/GetTemplate.php');
require_once(__DIR__.'/function/Content.php');
require_once(__DIR__.'/function/CompressPath.php');
require_once(__DIR__.'/function/Json.php');
require_once(__DIR__.'/function/Html.php');
require_once(__DIR__.'/function/Attribute.php');
require_once(__DIR__.'/function/Args.php');
require_once(__DIR__.'/function/ifset.php');
require_once(__DIR__.'/function/Hasha1.php');
require_once(__DIR__.'/function/Charset.php');

//	...
if( _OP_APP_BRANCH_ < 2023 ){
	require_once(__DIR__.'/function/Args.php');
	require_once(__DIR__.'/function/ifset.php');
	require_once(__DIR__.'/function/Hasha1.php');
	require_once(__DIR__.'/function/Charset.php');
};
