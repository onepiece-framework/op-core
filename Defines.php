<?php
/** op-core:/Defines
 *
 * @created   2016-11-25
 * @version   1.0
 * @package   op-core
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

/** namespace
 *
 * @created   2020-01-24
 */
namespace OP;

/** Namespace
 *
 * @var string
 */
define('_OP_NAME_SPACE_', 'ONEPIECE', false);

/** App ID
 *
 *  This define is use only Config::Get(_OP_APP_ID_).
 *  If you set or get AppID, Use Env::AppID().
 *
 * @deprecated 2024-03-02
 * @var string
 */
define('_OP_APP_ID_', 'APP_ID', false);

/** Date format. (Not include hour, min, sec)
 *
 * @var string
 */
define('_OP_DATE_', 'Y-m-d', false);

/** Date and time format.
 *
 * @var string
 */
define('_OP_DATE_TIME_', 'Y-m-d H:i:s', false);

/** Developer IP Address.
 *
 * @created   2020-01-24
 * @var       string
 */
define('_OP_DEVELOPER_IP_', 'DEVELOPER_IP', false);

/** Developer E-Mal Address.
 *
 * @created   2020-01-24
 * @var       string
 */
define('_OP_DEVELOPER_MAIL_', 'DEVELOPER_MAIL', false);
