<?php
/** op-module-testcase:/core/ConvertURL.php
 *
 * @creation  2019-04-04
 * @version   1.0
 * @package   op-module-testcase
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

$doc_root = ConvertURL('doc:/');
Html("doc:/ --> $doc_root");

//	...
$app_root = ConvertURL('app:/');
Html("app:/ --> $app_root");

//	...
$asset_root = ConvertURL('asset:/');
Html("asset:/ --> $asset_root");
if(!Notice::Has() ){
	throw new \Exception('ConvertURL(asset:/) is broken.');
}else{
	$notice = Notice::Get();
	Html($notice['message']);
}

//	...
$core_root = ConvertURL('core:/');
Html("core:/ --> $core_root");
if(!Notice::Has() ){
	throw new \Exception('ConvertURL(core:/) is broken.');
}else{
	$notice = Notice::Get();
	Html($notice['message']);
}

//	...
$op_root = ConvertURL('op:/');
Html("op:/ --> $op_root");
if(!Notice::Has() ){
	throw new \Exception('ConvertURL(op:/) is broken.');
}else{
	$notice = Notice::Get();
	Html($notice['message']);
}

//	...
return;

//	Init.
$results = [];

//	Base URL
$base_url = ConvertURL('testcase:/core/').'converturl';

//	Check convert result.
$results['standard']['REQUEST_URL'] = $_SERVER['REQUEST_URI'];
$results['standard']['ConvertURL']  = $base_url;
$results['standard']['result'] = (strpos($_SERVER['REQUEST_URI'], $base_url) === 0) ? true: false;

//	Check slash of tail.
$results['slash of tail'][] = ConvertURL('testcase:/');
$results['slash of tail'][] = ConvertURL('testcase:/core');  // <-- Is directory.
$results['slash of tail'][] = ConvertURL('testcase:/core/'); // <-- Is directory.
$results['slash of tail'][] = ConvertURL('testcase:/core/converturl' ); // <-- Not directory.
$results['slash of tail'][] = ConvertURL('testcase:/core/converturl/');

//	...
$result = true;

//	...
foreach( $results['slash of tail'] as $index => $value ){
	$evalu = ($index === 3) ? false: true;
	$slash = $value[strlen($value)-1] === '/';
	if( $evalu !== $slash ){
		$result =  false;
		Notice("Slash of tail is unmatch. ($index, $value)");
	}
}
$results['slash of tail']['result'] = $result;

//	Result.
D($results);
