<?php
/** op-core:/ci/EMail.php
 *
 * @created   2022-10-31
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

//	...
$ci = OP::Unit('CI');

//	init
$user_name = get_current_user();
$file_name = OP::MetaPath('core:/testcase/email.txt');

//	From
$result =  null;
$args   = ["{$user_name}@localhost", $user_name];
$ci->Set('From', $result, $args);

//	To
$result =  null;
$args   = ["{$user_name}@localhost", $user_name];
$ci->Set('To', $result, $args);

//	Cc
$result =  null;
$args   = ["{$user_name}@localhost", $user_name];
$ci->Set('Cc', $result, $args);

//	Bcc
$result =  null;
$args   = ["{$user_name}@localhost"];
$ci->Set('Bcc', $result, $args);

//	ReplyTo
$result =  null;
$args   = ["{$user_name}@localhost", $user_name];
$ci->Set('ReplyTo', $result, $args);

//	ErrorsTo
$result =  null;
$args   = ["{$user_name}@localhost", $user_name];
$ci->Set('ErrorsTo', $result, $args);

//	ReturnPath
$result =  null;
$args   = ["{$user_name}@localhost", $user_name];
$ci->Set('ReturnPath', $result, $args);

//	Subject
$result =  null;
$args   = 'This is self-check test';
$ci->Set('Subject', $result, $args);

//	Content
$result =  null;
$args   = 'This is self-check test mail.';
$ci->Set('Subject', $result, $args);

//	Attachment
$result =  null;
$args   = [$file_name,'text/plain','EMail.php'];
$ci->Set('Attachment', $result, $args);

//	Send
$result = true;
$args   = null;
$ci->Set('Send', $result, $args);

//	Debug
$result = null;
$args   = null;
$ci->Set('Debug', $result, $args);

//	_mail
$result = true;
$args   = null;
$ci->Set('_mail', $result, $args);

//	_socket
$result = false;
$args   = null;
$ci->Set('_socket', $result, $args);

//	_mta
$result = false;
$args   = null;
$ci->Set('_mta', $result, $args);

//	_get_headers
$args   = null;
$result = "MIME-Version: 1.0
Content-Type: Multipart/Mixed; boundary=\"--onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59\"
Content-Transfer-Encoding: Base64
X-SENDER: onepiece-framework:EMail
From: {$user_name} <{$user_name}@localhost>
Cc: {$user_name} <{$user_name}@localhost>
Bcc: {$user_name}@localhost
Reply-to: {$user_name} <{$user_name}@localhost>
Return-path: {$user_name} <{$user_name}@localhost>
Errors-to: {$user_name} <{$user_name}@localhost>
";
$ci->Set('_get_headers', $result, $args);

//	_get_mail_address
$args   = null;
$result = "X-SENDER: onepiece-framework:EMail
From: {$user_name} <{$user_name}@localhost>
Cc: {$user_name} <{$user_name}@localhost>
Bcc: {$user_name}@localhost
Reply-to: {$user_name} <{$user_name}@localhost>
Return-path: {$user_name} <{$user_name}@localhost>
Errors-to: {$user_name} <{$user_name}@localhost>";
$ci->Set('_get_mail_address', $result, $args);

//	_get_to
$args   = null;
$result = "{$user_name} <{$user_name}@localhost>";
$ci->Set('_get_to', $result, $args);

//	_get_full_name
$result = "{$user_name} <{$user_name}@localhost>";
$args   = ["{$user_name}@localhost", $user_name];
$ci->Set('_get_full_name', $result, $args);

//	GetLocalAddress
$args   = null;
$result = "{$user_name}@localhost";
$ci->Set('GetLocalAddress', $result, $args);

//	_get_parameters
$args   = null;
$result = "-f {$user_name}@localhost";
$ci->Set('_get_parameters', $result, $args);

//	_get_boundary
$args   = null;
$result = '--onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59';
$ci->Set('_get_boundary', $result, $args);

//	_get_content_type
$args   = null;
$result = "MIME-Version: 1.0
Content-Type: Multipart/Mixed; boundary=\"--onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59\"
Content-Transfer-Encoding: Base64
";
$ci->Set('_get_content_type', $result, $args);

//	_get_content
$args   = null;
$result = "----onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit


----onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

email.txt
----onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59--
";
$ci->Set('_get_content', $result, $args);

//	_get_content_multipart
$args   = null;
$result = "MIME-Version: 1.0
Content-Type: Multipart/Mixed; boundary=\"--onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59\"
Content-Transfer-Encoding: Base64
";
$ci->Set('_get_content_type', $result, $args);

//	_get_content
$args   = null;
$result = "----onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit


----onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

email.txt
----onepiece-framework--Boundary--63ab23b20281aa288d47352f732f1c59--
";
$ci->Set('_get_content_multipart', $result, $args);

//	_get_subject
$args   = null;
$result = 'This is self-check test mail.';
$ci->Set('_get_subject', $result, $args);

//	_set_addr
$args   = ["{$user_name}@localhost",$user_name,'to'];
$result = null;
$ci->Set('_set_addr', $result, $args);

//	_set_error
$result = null;
$args   = null;
$ci->Set('_set_error', $result, $args);

//	...
return $ci->GenerateConfig();
