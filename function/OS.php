<?php
/** op-core:/function/OS.php
 *
 * @created    2023-01-14
 * @package    op-core
 * @version    1.0
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** OS
 *
 * @created    2023-01-14
 */
function OS() : ?string
{
	//	...
	$uname = `uname`;
	$uname = trim($uname);
	switch( $uname ){
		case 'Darwin':
			$id = 'macOS';
			break;

		case 'NetBSD':
		case 'FreeBSD':
			$id = $uname;
			break;

		case 'Linux':
			/* @var $match array */
			$release = `cat /etc/os-release`;
			if( preg_match('|ID="?([a-z]+)"?|i',$release,$match) ){
				$id = $match[1];
			}
			break;
	}

	//	...
	return $id ?? null;
}
