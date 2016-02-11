<?php
if (!defined('FLUX_ROOT')) exit;
$this->loginRequired();

$title = "in progress";

require_once 'Flux/TemporaryTable.php';

$isMine        = false;
$accountID     = $params->get('id');
$account       = false;
$forumType = 1; 
	// Type of your forum
	// 1 = Xenforo
	// 2 = IPB (currenly not supported)

if (!$accountID || $accountID == $session->account->account_id) {
	$isMine    = true;
	$accountID = $session->account->account_id;
	$account   = $session->account;
}

	$sql = "SELECT userid, email, forum_status FROM `login` WHERE `account_id` = ?";
	$sth  = $server->connection->getStatement($sql);
	$sth->execute(array($accountID));

	$integration = $sth->fetchAll();
?>