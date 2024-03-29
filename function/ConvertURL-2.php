<?php
/** op-core:/function/ConvertURL-2.php
 *
 * @created   2020-03-08
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
 * @creation  2019-02-19
 */
namespace OP;

/** Convert to Document root URL from meta path or full path.
 *
 * This function is for abstract whatever path the application on placed.
 *
 * Example:
 * Document root    --> /var/www/html
 * Application root --> /var/www/html/onepiece-app/
 *
 * ConvertURL('doc:/index.html'); --> /index.html
 * ConvertURL('app:/index.php');  --> /onepiece-app/index.php
 *
 * @created   2020-03-08
 * @param     string       $meta_url
 * @return    string       $document_root_url
 */
function ConvertURL($url)
{
	//	Check if full path.
	if( $url[0] === '/' and $url[1] !== '/' ){

		//	Calc document root.
		foreach(['doc','link'] as $key){
			//	...
			$doc_root = RootPath()[$key];

			//	Check if document root.
			if( 0 === strpos($url, $doc_root) ){
				//	Return compressed document root path.
				return substr($url, strlen($doc_root));
			}
		}

		//	...
		OP::Notice("This full path is not document root path. ($url)");
		return false;
	}

	//	Separate URL Query.
	if( $pos = strpos($url, '?') ){
		$que = substr($url, $pos);
		$url = substr($url, 0, $pos);
	};

	//	In case of current URL.
	if( $url === '.' ){
		//	...
		$scheme = $_SERVER['REQUEST_SCHEME'];

		//	...
		$host = $_SERVER['HTTP_HOST'];

		//	...
		$uri = $_SERVER['REQUEST_URI'];

		//	...
		return "{$scheme}://{$host}{$uri}";
	};

	//	Convert to full path.
	/* @var $error_message string */
	if(!$full_path = ConvertPath($url, false, false /*, $error_message */) ){
		OP::Notice("ConvertPath() is return false. ($error_message)");
		return;
	}

    //	Check if asset path.
    if( strpos($full_path, RootPath('asset')) === 0 ){
        OP::Notice("This is asset root path. ($url)");
        return;
    }

	//	Document root.
	$doc_root = rtrim($_SERVER['DOCUMENT_ROOT'], '/');

	//	Check whether document root path.
	if( strpos($full_path, $doc_root) !== 0 ){
		OP::Notice("This path is not the document root path. (doc={$doc_root}, full={$full_path})");
		return false;
	};

	//	Generate document root path.
	$url = substr($full_path, strlen($doc_root));

	//	Add slash if directory.
	if( is_dir($full_path) ){
		//	Check if already added slash.
		if( $url[strlen($url)-1] !== '/' ){
			$url = rtrim($url, '/') . '/';
		};
	};

	//	Check if had URL Query.
	if( isset($que) ){
		$url .= $que;
	};

	//	Remove document root path.
	return $url;
}
