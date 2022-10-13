<?php
/** op-core:/function/OP.php
 *
 * @created   2022-10-05
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** Return OP Instance.
 *
 * @created   2022-10-05
 * @return    OP\OP
 */
function OP(){
	static $OP;
	if(!$OP ){
		$OP = new \OP\OP();
	}
	return $OP;
}
