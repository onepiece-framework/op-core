<?php
/** op-core:/testcase/session.php
 *
 * @created   2021-05-15
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

//	...
$count = Session::Get('count', 0);
$count++;
Session::Set('count', $count);
?>
<section>
	<p>Count up : <?= $count ?></p>
</section>
