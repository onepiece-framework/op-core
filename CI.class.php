<?php
/** op-core:/CI.class.php
 *
 * Purpose: Generate config to pass to OP_CI.
 *
 * @deprecated 2023-02-13
 * @created   2022-10-15
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

/** CI
 *
 * @created   2022-10-15
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */
class CI
{
	/** trait
	 *
	 */
	use OP_CORE, OP_CI;

	/** Config
	 *
	 * @created   2022-10-15
	 * @var       array
	 */
	private $_config;

	/** Set Config.
	 *
	 * @deprecated 2023-02-13
	 * @created   2022-10-15
	 * @param     string     $method
	 * @param     array      $args
	 * @param     array      $result
	 */
	function Set($method, $result, $args)
	{
		$this->_config[$method][] = [
			'result' => $result,
			'args'   => $args,
		];
	}

	/** Generate Config.
	 *
	 * @deprecated 2023-02-13
	 * @created   2022-10-15
	 * @return    array      $config
	 */
	function GenerateConfig():array
	{
		return $this->_config;
	}
}
