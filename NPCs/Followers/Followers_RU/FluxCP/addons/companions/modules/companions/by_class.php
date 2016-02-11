<?php
if (!defined('FLUX_ROOT')) exit;

$title = 'Viewing Companion Class';
$companionID = $params->get('id');

require_once 'Flux/TemporaryTable.php';
include('/lib/functions/companionFunctions.php');

$sql	 =	"SELECT * FROM `companion_list` WHERE `companion_class` = ?";

$sth = $server->connection->getStatement($sql);
$sth->execute(array($companionID));
$get_companion = $sth->fetchAll();
?>