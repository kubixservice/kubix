<?php
if (!defined('FLUX_ROOT')) exit;

$title = 'Viewing Mission';
$missionID = $params->get('id');
require_once 'Flux/TemporaryTable.php';
include('/lib/functions/companionFunctions.php');

if($server->isRenewal) {
	$fromTables = array("{$server->charMapDatabase}.item_db_re", "{$server->charMapDatabase}.item_db2_re");
} else {
	$fromTables = array("{$server->charMapDatabase}.item_db", "{$server->charMapDatabase}.item_db2");
}
$itemDB    = "{$server->charMapDatabase}.items";
$tempItems = new Flux_TemporaryTable($server->connection, $itemDB, $fromTables);


$col	 =	"garrison_missions.mission_id, garrison_missions.mission_name, garrison_missions.mission_type, garrison_missions.mission_desc, garrison_missions.mission_time, ";
$col	.=	"garrison_missions.mission_reward1, garrison_missions.mission_rewardval1, garrison_missions.mission_reward2, ";
$col	.=	"garrison_missions.mission_rewardval2, garrison_missions.mission_reward3, garrison_missions.mission_rewardval3, ";
$col	.=	"garrison_missions.mission_charbaseexp, garrison_missions.mission_charjobexp, garrison_missions.mission_compbaseexp, garrison_missions.zeny_reward, ";
$col	.=	"garrison_missions.mission_reqlevel, garrison_missions.mission_jobreq, garrison_missions.mission_equiplv, ";
$col	.=	"$itemDB.id, $itemDB.name_english";

$sql	 =	"SELECT $col FROM `garrison_missions` ";
$sql	.=	"LEFT OUTER JOIN $itemDB ON garrison_missions.mission_reward1 = $itemDB.id ";
$sql	.=	"WHERE garrison_missions.mission_id = ?";

$sth = $server->connection->getStatement($sql);
$sth->execute(array($missionID));
$get_mission = $sth->fetchAll();
?>