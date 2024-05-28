<?php
/** op-core:/function/Markdown.php
 *
 * @created   2020-09-05
 * @moved     2020-11-18   from uqunie.com
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** Markdown
 *
 * @deprecated 2024-05-28
 * @created   2020-09-05   Born at uqunie.com
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 * @param     string       $meta_file_path
 * @param     boolean      $throw_exception
 */
function Markdown($file, $throw_exception=true)
{
	//	Checking if the file actually exists.
	if(!ConvertPath($file, $throw_exception) ){
		return;
	}

	//	Get plain text.
	$path = OP::MetaPath($file);
	$text = file_get_contents($path);
	$text = OP::Encode($text);
	/*
	$text = preg_replace('!&gt;!', '>', $text);
	$text = preg_replace('!&lt;img|div!', '<img', $text);
	*/

	//	...
	if( Env::isShell() ){
		echo $text;
	}else{
		echo '<div class="markdown">'.$text.'</div>';
	}
}
