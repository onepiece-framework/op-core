<?php
/**
 * Bootstrap.php
 *
 * @creation  2015-12-10
 * @rebirth   2016-06-09
 * @version   1.0
 * @package   core7
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/**
 * Include custome functions.
 */
include_once(__DIR__.'/Functions.php');

/**
 * Security: PHP_SELF has XSS risk.
 */
$_SERVER['PHP_SELF_XSS'] = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);
$_SERVER['PHP_SELF'] = $_SERVER['SCRIPT_NAME'];

/**
 * OP_ROOT, APP_ROOT
 */
$_OP['OP_ROOT']  = __DIR__.'/';
$_OP['APP_ROOT'] = dirname($_SERVER['SCRIPT_FILENAME']).'/';

/**
 * Register autoloader.
 */
include(__DIR__.'/Autoloader.class.php');
if(!spl_autoload_register('Autoloader::Autoload',true,true)){
	function __autoload($class){
		Autoloader::Autoload($class);
	}
}

/**
 * Register shutdown function.
 */
register_shutdown_function('Notice::Shutdown');

/**
 * Check mbstring installed.
 */
if(!function_exists('mb_language') ){
	include(__DIR__.'/Template/Introduction/Php/Mbstring.phtml');
	exit();
}
