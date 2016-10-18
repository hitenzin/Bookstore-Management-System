<?php
	$id = $_GET['id'];
	$decision = $_GET['decision'];
	echo $id; echo $decision;	// test

	mysql_connect('localhost', 'root', 'root');
	mysql_select_db('booksystem');

	// update the user's account type
	if ($decision == 'approve')
	{
		$apps = "UPDATE users SET Type = 'SE' WHERE UserName = '$id' AND Activated = '1'"; 
		$query = mysql_query($apps);
		if ($query) echo "Update Sucessful";
		else echo "Error: failed to update";
	}

	// remove the user from the upgradeapplication table
	$sql = "DELETE FROM upgradeapplication WHERE UserName = '$id'";
	$query = mysql_query($sql);

	//header("location: account_management.php");
?>