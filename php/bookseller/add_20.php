<?php
	$decision= $_GET['decision'];
	$balance= $_GET['balance'];
	
	session_start();
	if(isset($_SESSION['username']))
	{
		// put stored session variables into local PHP variables
		$user = $_SESSION['username'];
	}

	// make connect
	mysql_connect("localhost", "root", "root");
	// select database
	mysql_select_db("booksystem"); 

	if($decision == 'add')
	{
	$add_balance = "UPDATE users SET Balance = (Balance + '20.00') WHERE UserName = '$user'";
	mysql_query($add_balance);
	
	echo "Thank you for using BookLover!";
	}
	


	//header["location: comment.php"];
?>
