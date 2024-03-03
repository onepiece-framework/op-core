<?php
/** op-core:/function/Decode.php
 *
 * @independent 2024-03-02 from op-core:/Functions.php
 * @version     1.0
 * @package     op-core
 * @author      Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright   Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/** use
 *
 */

/** Decode can decode nested array transparent.
 *
 * @param  mixed  $value
 * @param  string $charset
 * @return string $var
 */
function Decode($value, $charset='utf-8')
{
	/*
	//	...
	if(!$charset ){
		$charset = Env::Charset();
	}
	*/

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
