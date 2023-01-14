<?php
/** op-core:/ci/Debug.php
 *
 * @created   2022-10-31
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
$core = OP::MetaPath('core:/');
$core = str_replace('/', '\\/', $core);

//	...
$ci = new CI();

//	Get
$result =  null;
$args   =  null;
$ci->Set('Get', $result, $args);

//	Get
$result =  null;
$args   = ['self-check','test'];
$ci->Set('Set', $result, $args);

//	Out not key
$result = '<div class=\'OP_MARK\'>{"file":"'.$core.'trait\/OP_CI.php","line":101,"function":"Out","class":"OP\\\\Debug","type":"::","args":["core:\/trait\/OP_CI.php               101 - OP\\\Debug::Out(N;)"]}</div>
<div class=\'OP_DUMP\'>{"self-check":["test"]}</div>'."\n";
$args   = null;
$ci->Set('Out', $result, $args);

//	Out has key
$result = '<div class=\'OP_MARK\'>{"file":"'.$core.'trait\/OP_CI.php","line":101,"function":"Out","class":"OP\\\\Debug","type":"::","args":["core:\/trait\/OP_CI.php               101 - OP\\\Debug::Out(N;)"]}</div>
<div class=\'OP_DUMP\'>["test"]</div>'."\n";
$args   = ['self-check','hoge'];
$ci->Set('Out', $result, $args);

//	Debug
$result = '<div class=\'OP_MARK\'>{"file":"'.$core.'trait\/OP_CI.php","line":101,"function":"Debug","class":"OP\\\\Debug","type":"::","args":["core:\/trait\/OP_CI.php               101 - OP\\\Debug::Debug(N;)"]}</div>
<div class=\'OP_DUMP\'>{"self-check":["test"]}</div>'."\n";
$args   = null;
$ci->Set('Debug', $result, $args);

//	...
return $ci->GenerateConfig();
