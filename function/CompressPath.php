<?php
/** op-core:/function/CompressPath.php
 *
 * @created   2022-10-12  From op-core:/functions.php
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** Compress to meta path from local file path.
 *
 * <pre>
 * print CompressPath(__FILE__); // -> App:/index.php
 * </pre>
 *
 * @created   ????-??-??
 * @param     string     $file_path
 * @return    string
 */
function CompressPath($path)
{
	/** I think so, more better to increase the number of operations
	 *  than to increase memory usage.
	static $_root, $_count;
	$root = RootPath();
	if( $_count !== count($root) ){
		$_count  =  count($root);
		$_root = array_reverse($root);
	}
	 */

	//	...
	if( is_dir($path) ){
		$path = rtrim($path, '/').'/';
	}

	//	real --> git
	$path = str_replace(RootPath('real'), RootPath('git'), $path);

	//	...
	foreach( array_reverse(RootPath()) as $meta => $root ){
		//	...
		$pos = strpos($path, $root);

		//	...
		if( $pos === 0 ){
			//	...
			$path = substr($path, strlen($root));

			//	...
			return "{$meta}:/{$path}";
		};
	};

	//	...
	return false;
}
