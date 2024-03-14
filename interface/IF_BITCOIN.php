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

	/** Get address, And can also set label and their purpose.
	 *
	 * <pre>
	 * //  Generate a different address each time.
	 * $new_address_1    = OP()->Bitcoin()->GetAddress();
	 * $new_address_2    = OP()->Bitcoin()->GetAddress();
	 *
	 * //  Generate a same address each time from label.
	 * $nickname_address = OP()->Bitcoin()->GetAddress('nickname');
	 *
	 * //  Can set purpose label.
	 * $purpose_address  = OP()->Bitcoin()->GetAddress('nickname','purpose');
	 * </pre>
	 *
	 * @created    2024-03-14
	 * @param      string     $label
	 * @return     string     $address
	 */
	static public function GetAddress(string $label=null, string $purpose=null) : string;

	/** Get all balance or each address balance.
	 *
	 * <pre>
	 * //  Get balance of total in wallet.
	 * $wallet_balance  = OP()->Bitcoin()->GetBalance()
	 *
	 * //  Can get balance each address.
	 * $address         = OP()->Bitcoin()->GetAddress('nickname');
	 * $address_balance = OP()->Bitcoin()->GetBalance($address);
	 * </pre>
	 *
	 * @created    2024-03-14
	 * @param      string     $address
	 * @return     float      $balance
	 */
	static public function GetBalance(string $address=null) : float;
}
