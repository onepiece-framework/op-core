<?php
/**
 * Functions.php
 *
 * @creation  2016-11-16
 * @version   1.0
 * @package   core7
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**
 * Return meta root path array.
 *
 * @return array
 */
function _GetRootsPath()
{
	global $_OP;
	$root['App:/'] = $_OP['APP_ROOT'];
	$root['OP:/']  = $_OP['OP_ROOT'];
	$root['Doc:/'] = $_SERVER['DOCUMENT_ROOT'];
	return $root;
}

/**
 * Compress to meta path from local file path.
 *
 * <pre>
 * print CompressPath(__FILE__); // -> App:/index.php
 * </pre>
 *
 * @param  string $file_path
 * @return string
 */
function CompressPath($path)
{
	foreach( _GetRootsPath() as $key => $var ){
		if( strpos($path, $var) === 0 ){
			$path = substr($path, strlen($var));
			return $key.$path;
		}
	}
	return $path;
}

/**
 * Dump value for developers only.
 *
 * @param boolean|integer|string|array|object $value
 */
function D($value=null)
{
	//	If not admin will skip.
	if(!Env::isAdmin()){
		return;
	}

	//	null is explicit.
	if( is_null($value) ){
		$value = func_num_args() ? null: '';
	}

	//	Get trace.
	if( version_compare('5.4.0', PHP_VERSION) >= 1 ){
		$trace = debug_backtrace( DEBUG_BACKTRACE_PROVIDE_OBJECT || DEBUG_BACKTRACE_IGNORE_ARGS );
	}else{
		$trace = debug_backtrace( DEBUG_BACKTRACE_PROVIDE_OBJECT || DEBUG_BACKTRACE_IGNORE_ARGS, 1);
	}

	//	Dump.
	Developer::Mark($value, $trace[0]);
}

/**
 * Expand to local file path from meta path.
 *
 * <pre>
 * print ExpandPath('App:/index.php'); // -> /www/localhost/index.php
 * </pre>
 *
 * @param  string $meta_path
 * @return string
 */
function ExpandPath($path)
{
	foreach( _GetRootsPath() as $key => $var ){
		if( strpos($path, $key) === 0 ){
			$path = substr($path, strlen($key));
			return $var.$path;
		}
	}
	return $path;
}

/**
 * ifset
 *
 * @see    http://qiita.com/devneko/items/ee83854eb422c352abc8
 * @param  mixed $check
 * @param  mixed $alternate
 * @return mixed
 */
function ifset(&$check, $alternate = NULL)
{
	return (isset($check)) ? $check : $alternate;
}
