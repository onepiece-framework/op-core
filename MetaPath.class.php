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
	use OP_CORE, OP_CI;

	/** Set meta root path.
	 *
	 * @created   2022-06-11
	 * @param     string     $meta
	 * @param     string     $path
	 */
	static function Set(string $meta, string $path)
	{
		require_once(__DIR__.'/function/RootPath.php');
		return RootPath($meta, $path);
	}

	/** Get path by meta label.
	 *
	 * @created   2022-06-11
	 * @param     string     $meta
	 * @return    string|boolean
	 */
	static function Get(string $meta) : ?string
	{
		require_once(__DIR__.'/function/RootPath.php');
		return RootPath($meta);
	}

	/** Get meta root path list.
	 *
	 * @created   2022-06-11
	 * @return    array
	 */
	static function List() : array
	{
		//	...
		require_once(__DIR__.'/function/RootPath.php');
		return RootPath();
	}

	/** Convert to the meta-path from the full-path.
	 *
	 * @created   2022-06-11
	 * @param     string     $path
	 * @return    string|boolean|null
	 */
	static function Encode(string $path)
	{
		//	...
		require_once(__DIR__.'/function/CompressPath.php');
		return CompressPath($path);
	}

	/** Restore to the full-path from the meta-path.
	 *
	 * @created   2022-06-11
	 * @param     string     $path
	 * @return    string|boolean|null
	 */
	static function Decode(string $path)
	{
		//	...
		require_once(__DIR__.'/function/ConvertPath.php');
		return ConvertPath($path, false);
	}

	/** Convert to Document root URL from meta path and full path.
	 *
	 * @created    2022-10-16
	 * @param      string     $path
	 * @return     string     $URL
	 */
	static function URL($path)
	{
		require_once(__DIR__.'/function/ConvertURL-2.php');
		return ConvertURL($path);
	}
}
