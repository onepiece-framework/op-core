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

	/** Get git root.
	 *
	 */
	static function Root()
	{
		static $_git_root;
		if(!$_git_root){
			//	...
			$app_root = OP()->MetaPath('app:/');
			//	...
			if( file_exists("{$app_root}.git/") ){
				$_git_root = $app_root;
			}else if( file_exists($_git_root = realpath("{$app_root}../.git/")) ){
					//	OK
			}else{
				throw new \Exception("Does not fonund git root.");
			}
		}
		return $_git_root;
	}

	/** Get submodule config.
	 *
	 * @created    2023-01-02
	 * @param      bool        $current
	 * @throws    \Exception
	 * @return     array
	 */
	static function SubmoduleConfig(bool $current=true) : array
	{
		//	...
		$file_name = $current ? '.gitmodules': '.gitmodules_original';
		$file_path = self::Root() . $file_name;

		//	Get submodule settings.
		if(!file_exists($file_path) ){
			throw new \Exception("This file does not exist. ($file_path)");
		}

		//	Get submodule settings from file.
		if(!$file = file_get_contents($file_path) ){
			throw new \Exception("Could not read this file. ($file_path)");
		}

		//	Parse submodule settings.
		$source = explode("\n", $file);

		//	Parse the submodule settings.
		$configs = [];
		while( $line = array_shift($source) ){
			//	[submodule "asset/core"]
			$name = substr($line, 12, -2);
			$name = str_replace('/', '-', $name);

			//	path, url, branch
			for($i=0; $i<3; $i++){
				list($key, $var) = explode("=", array_shift($source));
				$configs[$name][ trim($key) ] = trim($var);
			}
		}

		//	...
		return $configs;
	}

	/** Check commit ID
	 *
	 * @created    2023-01-06
	 * @param      string      $path
	 * @return     bool
	 */
	static function CheckCommitID(string $path='') : bool
	{
		//	...
		$branch    = self::CurrentBranchName();
		$commit_id = self::CurrentCommitID();
		$file_name = ".ci_commit_id_{$branch}";

		//	...
		$saved_commit_id = file_exists($file_name) ? file_get_contents($file_name): null;

		//	...
		return ($commit_id === $saved_commit_id) ? true: false;
	}

	/** Save commit ID.
	 *
	 * @created    2023-01-06
	 * @param     ?string      $path
	 * @return     bool
	 */
	static function SaveCommitID(?string $path='') : ?bool
	{
		//	For CI - Do not run in inspect.
		if( $path === null ){
			return null;
		}

		//	...
		$branch    = self::CurrentBranchName();
		$commit_id = self::CurrentCommitID();
		$file_name = ".ci_commit_id_{$branch}";

		//	...
		file_put_contents($file_name, $commit_id);
		return true;
	}

	/** Get current branch name.
	 *
	 * @created    2023-01-06
	 * @return     string
	 */
	static function CurrentBranchName()
	{
		return substr(`git branch --contains 2>&1`, 2, -1);
	}

	/** Get current commit ID.
	 *
	 * @created    2023-01-06
	 * @return     string
	 */
	static function CurrentCommitID()
	{
		return `git show --format='%H' --no-patch 2>&1`;
	}
}
