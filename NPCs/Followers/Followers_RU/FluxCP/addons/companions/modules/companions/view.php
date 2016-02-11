<?php
if (!defined('FLUX_ROOT')) exit;

$title = 'Viewing Companion';
$companion = $params->get('id');

require_once 'Flux/TemporaryTable.php';
include('/lib/functions/companionFunctions.php');

$sql	 =	"SELECT * FROM `companion_list` WHERE `companion_unique_id` = ?";

$sth = $server->connection->getStatement($sql);
$sth->execute(array($companion));
$companion_id = $sth->fetchAll();
?>