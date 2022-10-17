<?php
/** MetaPath.class.php
 *
 * @created   2022-06-11
 * @version   1.0
 * @package   core
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

/** MetaPath
 *
 * @created   2022-06-11
 * @version   1.0
 * @package   core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class MetaPath
{
	/** trait
	 *
	 */
	use OP_CORE;

	/** Meta root path list.
	 *
	 * @created   2022-06-11
	 * @var array
	 */
	static $_ROOTS = [];

	/** Set meta root path.
	 *
	 * @created   2022-06-11
	 * @param     string     $meta
	 * @param     string     $path
	 */
	static function Set(string $meta, string $path) : ?bool
	{
		//	Check if full path. Does the path start at the route?
		if( $path[0] !== '/' ){
			return false;
		}

		//	Replace duplicate slash.
		$path = preg_replace('//*', '/', $path);

		//	Save the meta label and root path.
		self::$_ROOTS[$meta] = $path;

		//	Succeeded.
		return true;
	}

	/** Get path by meta label.
	 *
	 * @created   2022-06-11
	 * @param     string     $meta
	 * @return    string|boolean
	 */
	static function Get(string $meta) : ?string
	{
		return self::$_ROOTS[$meta] ?? null;
	}

	/** Get meta root path list.
	 *
	 * @created   2022-06-11
	 * @return    array
	 */
	static function List() : array
	{
		return self::$_ROOTS;
	}

	/** Convert to the meta-path from the full-path.
	 *
	 * @created   2022-06-11
	 * @param     string     $path
	 * @return    string|boolean|null
	 */
	static function Encode(string $path)
	{
		//	Replace duplicate slash.
		$path = preg_replace('//*', '/', $path);

		//	...
		foreach( self::$_ROOTS as $label => $root ){
			//	...
			$pos = strpos($path, $root);

			//	...
			if( $pos === 0 ){
				break;
			}
		}

		//	...
		if(!$pos !== 0 ){
			return false;
		}

		//	...
		$trim = substr($path, $pos);

		//	...
		return $label . ':/' . trim($trim,'/') . is_dir($path) ? '/':'';
	}

	/** Restore to the full-path from the meta-path.
	 *
	 * @created   2022-06-11
	 * @param     string $path
	 * @return    string|boolean|null
	 */
	static function Decode(string $path)
	{
		//	Replace duplicate slash.
		$path = preg_replace('//*', '/', $path);

		/* @var $m array */
		if(!preg_match('|^(\w+):/|', $path, $m)){
			E("Does not match meta label --> `$path`");
			return false;
		}

		//	Get the meta-label.
		$label = $m[1];

		//	Get the root-path.
		if(!$root = self::$_ROOTS[$label] ?? null ){
			return null;
		}

		//	...
		$len = strlen($label);

		//	...
		return $root . substr($path, $len);
	}
}
