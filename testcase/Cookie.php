<?php
/** op-core:/testcase/cookie.php
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

/*  @var $init boolean */
$user_id = Cookie::UserID($init);

//	...
$count = Cookie::Get('count', 0);
$count++;
Cookie::Set('count', $count);

?>
<section>
	<p>UserID : <?= $user_id ?> (Initialization: <?= $init ? 'true':'false' ?>)</p>
	<p>Count up : <?= $count ?></p>
</section>
<?= OP()->Markdown('Cookie.md') ?>
