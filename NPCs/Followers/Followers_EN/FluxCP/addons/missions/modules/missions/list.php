<?php
if (!defined('FLUX_ROOT')) exit;
$title = "Mission List";
$bind = array();
require_once 'Flux/TemporaryTable.php';
include('/lib/functions/companionFunctions.php');

// Monsters table.
$mobDB      = "{$server->charMapDatabase}.monsters";
//here needs the same check if the server is renewal or not, I'm just lazy to do it by myself
if($server->isRenewal) {
	$fromTables = array("{$server->charMapDatabase}.mob_db_re", "{$server->charMapDatabase}.mob_db2_re");
} else {
	$fromTables = array("{$server->charMapDatabase}.mob_db", "{$server->charMapDatabase}.mob_db2");
}
$tempMobs   = new Flux_TemporaryTable($server->connection, $mobDB, $fromTables);

// Monster Skills table.
$skillDB    = "{$server->charMapDatabase}.mobskills";
//here needs the same check if the server is renewal or not, I'm just lazy to do it by myself
if($server->isRenewal) {
	$fromTables = array("{$server->charMapDatabase}.mob_skill_db_re", "{$server->charMapDatabase}.mob_skill_db2_re");
} else {
	$fromTables = array("{$server->charMapDatabase}.mob_skill_db", "{$server->charMapDatabase}.mob_skill_db2");
}

$tempSkills = new Flux_TemporaryTable($server->connection, $skillDB, $fromTables);

// Items table.
if($server->isRenewal) {
	$fromTables = array("{$server->charMapDatabase}.item_db_re", "{$server->charMapDatabase}.item_db2_re");
} else {
	$fromTables = array("{$server->charMapDatabase}.item_db", "{$server->charMapDatabase}.item_db2");
}
$itemDB    = "{$server->charMapDatabase}.items";
$tempItems = new Flux_TemporaryTable($server->connection, $itemDB, $fromTables);

$sql	=	"SELECT * FROM `garrison_missions` ORDER BY `mission_reqlevel` DESC";

$sth  = $server->connection->getStatement($sql);

$sth->execute($bind);
$missions = $sth->fetchAll();
?>