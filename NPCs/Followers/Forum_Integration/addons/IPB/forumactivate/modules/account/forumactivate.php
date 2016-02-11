<?php 
if (!defined('FLUX_ROOT')) exit;
$this->loginRequired();

$title = Flux::message('ReferralHeading');

require_once 'Flux/TemporaryTable.php';

$isMine        = false;
$accountID     = $params->get('id');
$account       = false;
if (!$accountID || $accountID == $session->account->account_id) {
	$isMine    = true;
	$accountID = $session->account->account_id;
	$account   = $session->account;
}

	$sql = "SELECT account_id, forum_status FROM `login` WHERE `account_id` = ?";
	$sth  = $server->connection->getStatement($sql);
	$sth->execute(array($accountID));

	$aid = $sth->fetchAll();
?>