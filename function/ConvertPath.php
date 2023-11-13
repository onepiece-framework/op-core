<?php
/** op-core:/function/ConvertPath.php
 *
 * @created   2020-05-10
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

/** Convert to local file path from meta path.
 *
 * <pre>
 * ConvertPath('app:/index.php'); -> /www/localhost/index.php
 * </pre>
 *
 * @param  string $meta_path
 * @param  bool   $throw_exception
 * @param  bool   $file_exists
 * @return string
 */
function ConvertPath(string $path, bool $throw_exception=true, $file_exists=true):string
{
	//	Trim
	$path = trim($path);

	//	URL Query
	if( $pos   = strpos($path, '?') ){
		$query = substr($path, $pos);
		$path  = substr($path, 0, $pos);
	}

	//	Root path
	if( $path[0] === '/' ){
		throw new \Exception("This path is not meta path. A path from \"/\" can not be specified. ({$path})");
	}

	//	Parent path.
	if( strpos($path, '..') !== false ){
		throw new \Exception("Upper directory cannot be specified. ($path)");
	}

	//	Check meta label
	if( $pos = strpos($path, ':/') ){
		//	Get meta label.
		$meta = substr($path, 0, $pos);

		//	Check exists meta label.
		if(!$root = RootPath($meta) ){
			throw new \Exception("This meta label is not exists. ($path)");
		};

		//	...
		$path = $root . substr($path, $pos+2);

		//	Check if directory
		if( is_dir($path) ){
			//	Added slash to tail.
			$path = rtrim($path, '/') . '/';
		}

	}else{
		//	Add current directory.
		$path = getcwd() . '/' . $path;
	};

	// Check if file exists.
	if( $file_exists and !file_exists($path) ){
		//	...
		if( $throw_exception === false ){
			//	Return false.
			$path = false;
		}else{
			throw new \Exception("This file does not exist. ($path)");
		}
	}

	//	Return calculated value.
	return $path . ($query ?? null);
}
