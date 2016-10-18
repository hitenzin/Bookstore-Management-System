<?php
	$id = $_GET['id'];
	$decision = $_GET['decision'];
	echo $id; echo $decision;	// test

	mysql_connect('localhost', 'root', 'root');
	mysql_select_db('booksystem');

	if ($decision == 'suspend')
	{
		$activation = "UPDATE users SET Activated = '0' WHERE UserName = '$id'";
		$query = mysql_query($activation);
		if ($query) echo "<br>Successfully suspended user";
		else echo "<br>Error: failed to suspend user"; 

		$suspend_user = "INSERT INTO suspendedusers (UserName) VALUES ('$id')"; 
		$query = mysql_query($suspend_user);
		if ($query) echo "<br>Successfully added user to suspendedusers";
		else echo "<br>Error: failed to add suspended user";

		$remove_from_booksownedby = "DELETE FROM booksownedby WHERE UserName = '$id'";
		$query = mysql_query($remove_from_booksownedby);
		if($query) echo "<br>Successfully removed user's owned books";
		else echo "<br>Error: failed to remove user's owned books";
	}
	else if ($decision == 'blacklist')
	{
		$blacklist = "INSERT INTO blacklist (UserName, LastLogin) VALUES ('$id', '1')"; 
		$query = mysql_query($blacklist);
		if ($query) echo "<br>Successfully blacklisted user";
		else echo "<br>Error: failed to blacklist user";
	}
	else if ($decision == 'restore')
	{
		$activation = "UPDATE users SET Activated = '1' WHERE UserName = '$id'";
		$query = mysql_query($activation);
		if ($query) echo "<br>Successfully activated user";
		else echo "<br>Error: failed to activate user";

		$remove_from_suspendedusers = "DELETE FROM suspendedusers WHERE UserName = '$id'";
		$query = mysql_query($remove_from_suspendedusers);
		if($query) echo "<br>Successfully removed user from suspendedusers";
		else echo "<br>Error: failed to remove user from suspendedusers"; 

		// reset all ratings of this user
		$remove_from_userratings = "DELETE FROM userratings WHERE RatedUserName = '$id'";
		$query = mysql_query($remove_from_userratings);
		if($query) echo "<br>Successfully resetted user ratings";
		else echo "<br>Error: failed to reset user ratings";
	}
	else if ($decision == 'remove')
	{
		$remove_from_users = "DELETE FROM users WHERE UserName = '$id'";
		$query = mysql_query($remove_from_users);
		if($query) echo "<br>Successfully removed user from users";
		else echo "<br>Error: failed to remove from users";

		$remove_from_blacklist = "DELETE FROM blacklist WHERE UserName = '$id'";
		$query = mysql_query($remove_from_blacklist);
		if($query) echo "<br>Successfully removed user from blacklist";
		else echo "<br>Error: failed to remove from blacklist";

		$remove_from_booksownedby = "DELETE FROM booksownedby WHERE UserName = '$id'";
		$query = mysql_query($remove_from_booksownedby);
		if($query) echo "<br>Successfully removed user's owned books";
		else echo "<br>Error: failed to remove user's owned books";

		$remove_from_complaints = "DELETE FROM complaints WHERE UserName = '$id'";
		$query = mysql_query($remove_from_complaints);
		if($query) echo "<br>Successfully removed user from complaints";
		else echo "<br>Error: failed to remove from complaints";

		$remove_from_userratings = "DELETE FROM userratings WHERE RatedUserName = '$id'";
		$query = mysql_query($remove_from_userratings);
		if($query) echo "<br>Successfully removed user from userratings";
		else echo "<br>Error: failed to remove from userratings";
	}

	//header("location: account_management.php");
?>

<html>
<body>
	<p><a href = "account_management.php"> Click here </a> to return to the account management page. </p>
</body>
</html>