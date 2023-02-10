<?php
/** op-core:/ci/CI.php
 *
 * @created   2022-10-18
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
$ci = new CI();

//	Set
$result =  null;
$args   = ['Test', [], []];
$ci->Set('Set', $result, $args);

//	GenerateConfig
$result = ['Test' => [['result' => [], 'args' => []]]];
$args   = null;
$ci->Set('GenerateConfig', $result, $args);

//	Root
$args   = null;
$result = OP()->MetaPath('app:/');
$ci->Set('Root', $result, $args);

//	SubmoduleConfig
$args   = true;
$result = CI::SubmoduleConfig();
$ci->Set('SubmoduleConfig', $result, $args);

//	CheckCommitID
$file_name   = '.ci_commit_id_'.OP()->Unit('Git')->CurrentBranch();
$commit_id_1 = OP()->Unit('Git')->CurrentCommitID();
$commit_id_2 = file_exists($file_name) ? file_get_contents($file_name) : null;
$args   = '';
$result = ($commit_id_1 === $commit_id_2) ? true: false;
$ci->Set('CheckCommitID', $result, $args);

//	SaveCommitID
$args   = null;
$result = null;
$ci->Set('SaveCommitID', $result, $args);

//	CurrentBranchName
$args   = '';
$result = trim(`git rev-parse --abbrev-ref HEAD`);
$ci->Set('CurrentBranchName', $result, $args);

//	CurrentCommitID
$args   = '';
$result = trim(`git show --format='%H' --no-patch 2>&1`);
$ci->Set('CurrentCommitID', $result, $args);

//	...
return $ci->GenerateConfig();
