<?php
/** op-core:/interface/IF_BITCOIN.php
 *
 * @created    2024-03-14
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 */
namespace OP;

/** IF_BITCOIN
 *
 * @created    2024-03-14
 * @version    1.0
 * @package    op-core
 * @author     Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright  Tomoaki Nagahara All right reserved.
 */
interface IF_BITCOIN
{
	/** Challenge to generate block.
	 *
	 * <pre>
	 * //  Address to receive rewards.
	 * $address  = OP()->Bitcoin()->GetAddress('mining');
	 *
	 * //  Challenge to generate block.
	 * $block_id = OP()->Bitcoin()->GenerateBlock($address);
	 * </pre>
	 *
	 * @created    2024-03-14
	 * @param      string     $address
	 * @param      int        $num
	 * @return     string     $block_id
	 */
	static public function GenerateBlock(string $address, int $num=1) : string;

}
