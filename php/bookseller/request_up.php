<?php
	$decision= $_GET['decision'];
	
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

	if($decision == 'up')
	{
	$request_up = "INSERT INTO upgradeapplication VALUES('$user')";
	mysql_query($request_up);
	
	echo "Thank you for using BookLover! A super user will review your application";
	}
	


	//header["location: comment.php"];
?>
