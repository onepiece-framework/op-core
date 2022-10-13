<?php
/** op-core:/function/ConvertPath.php
 *
 * @created   2020-05-10
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** Convert to local file path from meta path.
 *
 * <pre>
 * print ConvertPath('app:/index.php'); // -> /www/localhost/index.php
 * </pre>
 *
 * @param  string $meta_path
 * @param  bool   $throw_exception
 * @return string
 */
function ConvertPath(string $path, bool $throw_exception=true):string
{
	//	Trim
	$path = trim($path);

	//	Root path
	if( $path[0] === '/' ){
		if( strpos($path, OP::MetaRoot('app')) === 0 ){
			$meta = OP::MetaFromPath($path);
		}else{
			$meta = 'app:/xxx';
		}
		throw new \Exception("Root path cannot be specified. Use meta path. ($path --> $meta)");
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
	if(!file_exists($path) ){
		//	...
		if( $throw_exception === false ){
			//	Return false.
			$path = false;
		}else{
			throw new \Exception("This file does not exist. ($path)");
		}
	}

	//	Return calculated value.
	return $path;
}
