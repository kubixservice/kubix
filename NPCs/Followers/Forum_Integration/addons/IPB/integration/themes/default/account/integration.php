<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2>Account integration</h2>

<form method="POST">
	<br /><input type='text' name='name' placeholder='Forum name'>
	<br /><input type='text' name='email' placeholder='Email'>
	<br /><input type='hidden' name='forum'><br />
	<input type='submit' value='Submit'>
</form>
<?php foreach($integration as $item): ?>
<?php
function getForumName($server, $forumMail)
{
	$sql = "select name from `forum_members` WHERE `email`='".$forumMail."'";
	$sth  = $server->connection->getStatement($sql);
	$sth->execute();
	$getName = $sth->fetchAll();
	
	foreach($getName as $d)
		return $d->name;	
}

function getForumMail($server, $forumName)
{
	$sql = "select email from `forum_members` WHERE `name`='".$forumName."'";
	$sth  = $server->connection->getStatement($sql);
	$sth->execute();
	$getMail = $sth->fetchAll();
	
	foreach($getMail as $e)
		return $e->email;	
}

if(isset($_POST['forum']))
{
	if($item->forum_status == 1)
		exit('already confirmed');
	
	$forumName = trim($_POST['name']);
	$forumMail = trim($_POST['email']);
	
	if($item->email != $forumMail)
		exit('Game email needs to be equal input email.');
	
	if(getForumName($server, $forumMail) == "" || getForumName($server, $forumMail) != $forumName)
		exit('Input name and forum name must be equal or username not found.');
	
	if(getForumMail($server, $forumName) == "" || getForumMail($server, $forumName) != $forumMail || getForumMail($server, $forumName) != $item->email)
		exit('Ragnarok account email not equal forum account email.');
	$rand = rand(1000000, 99999999);
	$postMessage = "
		Activate integration with forum.
		Confirm your email: ".$siteURL."?module=account&action=forumactivate&code=".$rand."&user=".$forumName."
	";
	$headers = "From: ".Flux::message('InviteServerName')." <".Flux::message('InviteServerEmail').">\r\n"; 
	$headers .= "Bcc: ".Flux::message('InviteServerEmail')."\r\n"; 
	
	$sql = "update `login` set `forum_name` = '".$forumName."', `forum_code` = '".$rand."' WHERE `userid` = '".$item->userid."'";
	$sth  = $server->connection->getStatement($sql);
	$sth->execute();
	$getMail = $sth->fetchAll();	
	
	if (mail($forumMail, "Activate integration", $postMessage, $headers)) { 
		echo 'email sended';
	} else { 
		echo 'error';
	}
}
?>
<?php endforeach ?>