<?php
if (!defined('FLUX_ROOT')) exit;
$title = "Companion List";
$bind = array();
require_once 'Flux/TemporaryTable.php';
include('/lib/functions/companionFunctions.php');

$sql	=	"SELECT * FROM `companion_list`";

$sth  = $server->connection->getStatement($sql);

$sth->execute($bind);
$companion_list = $sth->fetchAll();
?>