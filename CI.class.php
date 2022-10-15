<?php
/** op-core:/CI.class.php
 *
 * Purpose: Generate config to pass to OP_CI.
 *
 * @created   2022-10-15
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

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

	/** Construct
	 *
	 * @created   2022-10-15
	 * @param     string     $class_name
	 */
	/*
	function __construct($class_name)
	{

	}
	*/

	/** Set Config.
	 *
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
	 * @created   2022-10-15
	 * @return    array      $config
	 */
	function GenerateConfig()
	{
		return $this->_config;
	}
}
