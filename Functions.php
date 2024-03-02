<?php
/** op-core:/Functions.php
 *
 * @created   2016-11-16
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2019-02-19
 */
namespace OP;

/** Used class
 *
 */

/** Include
 *
 * @created   2020-01-01
 */
require(__DIR__.'/function/D.php');
require(__DIR__.'/function/Args.php');
require(__DIR__.'/function/Load.php');
require(__DIR__.'/function/Unit.php');
require(__DIR__.'/function/Encode.php');
require(__DIR__.'/function/Notice.php');
require(__DIR__.'/function/Layout.php');
require(__DIR__.'/function/RootPath.php');
require(__DIR__.'/function/ConvertPath.php');
require(__DIR__.'/function/ConvertURL-2.php');
require(__DIR__.'/function/Template.php');
require(__DIR__.'/function/GetTemplate.php');
require(__DIR__.'/function/Content.php');
require(__DIR__.'/function/Charset.php');
require(__DIR__.'/function/CompressPath.php');

/** Decode can decode nested array transparent.
 *
 * @param  mixed  $value
 * @param  string $charset
 * @return string $var
 */
function Decode($value, $charset=null)
{
	//	...
	if(!$charset ){
		$charset = Env::Charset();
	}

	//	...
	switch( gettype($value) ){
		//	...
		case 'string':
			$value = html_entity_decode($value, ENT_QUOTES, $charset);
			break;

		//	...
		case 'array':
			$result = [];
			foreach( $value as $key => $val ){
				$key = is_string($key) ? Decode($key, $charset): $key;
				$val = Decode($val, $charset);
				$result[$key] = $val;
			}
			$value = $result;
			break;

		//	...
		default:
	}

	//	...
	return $value;
}

/** To hash
 *
 * This function is convert to fixed length unique string from long or short strings.
 *
 * @param   null|integer|float|string|array|object $var
 * @param   integer  $length
 * @param   string   $salt
 * @return  string   $hash
 */
function Hasha1($var, $length=8, $salt=null)
{
	//	Can overwrite salt.
	if( $salt === null ){
		$salt = Env::AppID();
	};

	/** This change affects the hash value.
	if( is_string($var) ){
		//	...
	}else if( is_array($var) or is_object($var) ){
		$var = json_encode($var);
	}
	*/

	//	To json.
	$var = json_encode($var);

	//	...
	return substr(sha1($var . $salt), 0, $length);
}

/** ifset is if not set variable, set default value.
 *
 * <pre>
 * $var = ifset($_POST['undefine'], '1');
 * var_dump( $_POST['undefine'] ); // 1
 * </pre>
 *
 * _deprecated 2020-11-19  -->  2023-02-19
 * @reborned   2023-02-19
 * @version    2.0
 * @see    http://qiita.com/devneko/items/ee83854eb422c352abc8
 * @param  mixed $check
 * @param  mixed $alternate
 * @return mixed
 */
function ifset(&$check, $alternate=null)
{
	//	...
	if(!isset($check) ){
		$check = $alternate;
	}

	//	...
	return $check;
}

/** Parse html tag attribute from string to array.
 *
 * @deprecated 2024-03-02
 * @param  string $attr
 * @return array  $result
 */
function Attribute(string $attr)
{
	//	...
	$key = 'tag';
	$result = null;

	//	...
	for($i=0, $len=strlen($attr); $i<$len; $i++){
		//	...
		switch( $attr[$i] ){
			case '.':
				$key = 'class';
				if(!empty($result[$key]) ){
					$result[$key] .= ' ';
				}
				continue 2;

			case '#':
				$key = 'id';
				continue 2;

			case '?':
				if( $result['tag'] === 'a' ){
					$key = 'href';
				}
				break;

			case ' ':
				continue 2;

			default:
		}

		//	...
		if( empty($result[$key]) ){
			$result[$key] = '';
		}

		//	...
		$result[$key] .= $attr[$i];
	}

	//	...
	return Encode($result);
}

/** Output secure JSON.
 *
 * @param	 array	 $json
 * @param	 string	 $attr
 */
function Json($json, $attr)
{
	//	HTML Decode
	/* Decode is convert to &amp; --> &
	$json = Decode($json);
	*/

	//	Convert to json.
	$json = json_encode($json);

	//	Encode XSS. (Not escape quote)
	$json = htmlentities($json, ENT_NOQUOTES, 'utf-8');

	//	...
	Html($json, 'div.'.$attr, false);
}

/** Display HTML.
 *
 * <pre>
 * Html('message', 'span #id .class');
 * </pre>
 *
 * @param	 string		 $string
 * @param	 string		 $config
 * @param	 boolean	 $escape tag and quote
 */
function Html($string, $attr=null, $escape=true)
{
	//	Escape tag and quote.
	if( $escape ){
		$string = Encode($string);
	}

	//	...
	if( $attr ){
		$attr = Attribute($attr);
	}

	//	...
	$tag = $id = $class = null;
	foreach( ['tag','id','class'] as $key ){
		${$key} = $attr[$key] ?? null;
	}

	//	...
	if( empty($tag) ){
		$tag = 'div';
	}

	//	...
	if( $tag === 'a' ){
		$href = $attr['href'] ?? $string;
	}

	//	...
	$attr = $id    ? " id='$id'"      :'';
	$attr.= $class ? " class='$class'":'';

	//	...
	if( $tag === 'a' ){
		$attr = ' href="' . $href . '"';
		printf('<%s%s>%s</%s>'.PHP_EOL, $tag, $attr, $string, $tag);
	}else{
		printf('<%s%s>%s</%s>'.PHP_EOL, $tag, $attr, $string, $tag);
	}
}
