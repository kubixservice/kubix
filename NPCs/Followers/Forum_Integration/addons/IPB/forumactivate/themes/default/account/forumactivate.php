<?php 
if (!defined('FLUX_ROOT')) exit;
	$code = $_GET['code'];
	$name = $_GET['user'];
	
	if($code == "" || $name == "") // just in case
		exit('oops o.O');
	
	foreach($aid as $a)
	{
		
		if($a->forum_status == 1)
			exit('already confirmed');
		
		$sql = "UPDATE `login` SET forum_status = true, forum_code = '' WHERE `account_id` = '".$a->account_id."'";
		$sth  = $server->connection->getStatement($sql);
		$sth->execute();

		$complete = $sth->fetchAll();
	}
	echo 'Successful';
?>