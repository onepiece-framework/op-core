<?php
/** op-core:/OP.class.php
 *
 * @created   2022-09-30
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

/** OP
 *
 * @created   2018-04-04
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class OP
{
	/** trait.
	 *
	 */
	use OP_CORE, OP_OBJECT, OP_FUNCTION {
		OP_FUNCTION::__callstatic insteadof OP_CORE;
	}
}

/** OP_OBJECT
 *
 * @created   2022-10-05
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait OP_OBJECT
{
	/** Router unit.
	 *
	 * @created   2022-09-30
	 * @return    UNIT\Router
	 */
	static function Router()
	{
		return Unit('Router');
	}

	/** Template unit.
	 *
	 * @created   2022-10-04
	 * @return    UNIT\Template
	 */
	static function Template(string $path=null, array $args=[])
	{
		//	...
		if( $path ){
			require_once('function/Template.php');
			return Template($path, $args);
		}

		//	...
		return Unit('Template');
	}

	/** Layout unit.
	 *
	 * @created   2022-10-04
	 * @return    UNIT\Layout
	 */
	static function Layout($value=null)
	{
		//	...
		if( $value !== null ){
			require_once('function/Layout.php');
			return Layout($value);
		}

		//	...
		return Unit('Layout');
	}

	/** Meta path
	 *
	 * <pre>
	 * // Set meta path.
	 * OP::MetaPath()->Set('doc', '/var/www/htdocs');
	 *
	 * // Get meta path to full path.
	 * $full_path = OP::MetaPath('doc:/foo/bar'); -> /var/www/htdocs/foo/bar/
	 *
	 * // Get full path to meta path.
	 * $meta_path = OP::MetaPath('/var/www/htdocs/foo/bar'); -> doc:/foo/bar/
	 *
	 * // Get meta path to document root path.
	 * $url_path  = OP::MetaPath('app:/foo/bar?hoge', true); -> /foo/bar/?hoge
	 * </pre>
	 *
	 * @created    2022-10-16
	 * @param      string     $meta
	 * @param      bool       $url
	 * @throws    \Exception
	 * @return    \OP\MetaPath
	 */
	static function MetaPath(?string $path, ?bool $url)
	{
		//	...
		static $_meta_path;

		//	...
		if( $path ){
			$path = trim($path);

			//	Full path to meta path
			if( $path[0] === '/' ){
				//	Full path to URL is not support.
				if( $url ){
					throw new \Exception("Full path to URL is not support. ($path)");
				}
				return MetaPath::Encode($path);
			}

			//	Meta path to full path
			if( strpos($path, ':/') ){
				//	If URL
				if( $url ){
					return MetaPath::URL($path);
				}
				//	to Full path.
				return MetaPath::Decode($path);
			}
		}

		//	...
		if(!$_meta_path ){
			$_meta_path = new MetaPath();
		}

		//	...
		return $_meta_path;
	}
}

/** OP_FUNCTION
 *
 *  Wrapper functions. auto load function/*.php.
 *
 * @created   2022-10-05
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait OP_FUNCTION
{
	/** An undefined method was called.
	 *
	 * @created   2022-10-11
	 * @param     string $method_name
	 * @param     array  $args
	 */
	static function __callstatic($method_name, $args)
	{
		return self::_Function($method_name, ...$args);
	}

	/** _Function
	 *
	 * @created   2022-10-05
	 * @param     string     $function
	 * @param     variable variable
	 * @return    null|boolean|string|array|object
	 */
	static private function _Function(string $function, ...$args)
	{
		//	...
		if(!function_exists('OP\\'.$function) ){
			require_once(__DIR__."/function/{$function}.php");
		}

		//	...
		$function = 'OP\\'.$function;

		//	...
		return $function( ...$args );
	}

	/** Request
	 *
	 * @created   2022-10-05
	 * @param     string     $key
	 * @return    null|boolean|string|array
	 */
	static function Request($key=null)
	{
		return Env::Request($key);
	}

	/** Notice
	 *
	 * @created   2022-10-06
	 * @return    void
	 */
	static function Notice()
	{
		return self::_Function(__FUNCTION__);
	}

	/** Return unit instance (Singleton)
	 *
	 * @created   2022-10-07
	 * @param     string     $unit_name
	 * @return    OP_UNIT
	 */
	static function Unit(string $unit_name)
	{
		return self::_Function(__FUNCTION__, $unit_name);
	}

	/** Set / Get meta root path.
	 *
	 * <pre>
	 * //  Set meta root path.
	 * OP::RootPath('foo', __DIR__.'/foo/');
	 *
	 * //  Get meta root path.
	 * $path = OP::RootPath('foo');
	 * </pre>
	 *
	 * @deprecated 2022-10-16
	 * @created    2022-10-10
	 * @param      string     $meta_label
	 * @return     string     $full_path
	 */
	static function MetaRoot($meta_label='', $full_path='')
	{
		return self::_Function('RootPath', $meta_label, $full_path);
	}

	/** Convert to document root path from meta path.
	 *
	 * <pre>
	 * $document_root_url = OP::ConvertURL('app:/foo/bar');
	 * </pre>
	 *
	 * @deprecated 2022-10-16
	 * @created    2022-10-08
	 * @param      string     $meta_path
	 * @return     string     $full_path
	 */
	static function MetaToURL(string $path)
	{
		return self::_Function('ConvertURL', $path);
	}

	/** Convert to full path from meta path.
	 *
	 * <pre>
	 * $full_path = OP::ConvertPath('app:/foo/bar');
	 * </pre>
	 *
	 * @deprecated 2022-10-16
	 * @created    2022-10-05
	 * @param      string     $meta_path
	 * @return     string     $full_path
	 */
	static function MetaToPath(string $path, $throw_exception=true)
	{
		return self::_Function('ConvertPath', $path, $throw_exception);
	}

	/** Convert to meta path from full path.
	 *
	 * <pre>
	 * $full_path = OP::ConvertPath('app:/foo/bar');
	 * </pre>
	 *
	 * @deprecated 2022-10-16
	 * @created    2022-10-08
	 * @param      string     $meta_path
	 * @return     string     $full_path
	 */
	static function MetaFromPath(string $path)
	{
		return self::_Function('CompressPath', $path);
	}

	/** Sandbox
	 *
	 * @created   2022-10-10
	 * @param     string     $path
	 * @param     mixed      ...$args
	 * @return    mixed
	 */
	static function Sandbox($path, ...$args)
	{
		//	...
		$path = (function($path){
			$path = OP::MetaToPath($path);
			return $path;
		})($path);
		return include($path);

		//	...
		$path = OP::MetaToPath($path);

		//	...
		$curd = getcwd();

		//	...
		chdir(dirname($path));

		//	...
		$result = (function($path, ...$args){
			return include($path);
		})($path, ...$args);

		//	...
		chdir($curd);

		//	...
		return $result;
	}
}

/** OP_ENV
 *
 * @created   2022-10-05
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
trait OP_ENV
{

}
