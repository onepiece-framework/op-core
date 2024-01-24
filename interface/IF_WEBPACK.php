<?php
/** op-core:/IF_WEBPACK.php
 *
 * @created    2023-01-22
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** Declare strict
 *
 */
declare(strict_types=1);

/** namespace
 *
 */
namespace OP;

/** IF_APP
 *
 * @created    2023-01-22
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
interface IF_WEBPACK
{
	/** Automatically processes of depending on the argument.
	 *
	 *  <pre>
	 *  //  Register files to pack.
	 *  OP()->WebPack()->Auto('index.js', 'index.css');
	 *
	 *  //  Registration of directory.
	 *  OP()->WebPack()->Auto('./');
	 *
	 *  //  Output packed file.
	 *  OP()->WebPack()->Auto();
	 *  </pre>
	 */
	static public function Auto();

	/** Returns the hash value of the packed files.
	 *
	 *  <pre>
	 *  $hash = OP()->WebPack()->Hash();
	 *  echo "<script src='/js/?hash={$hash}'></script>";
	 *  </pre>
	 */
	static public function Hash(string $extension) : string;
}
