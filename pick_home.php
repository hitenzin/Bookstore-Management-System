<?php
	session_start();

	// make connect
	mysql_connect("localhost", "root", "root");
	// select database
	mysql_select_db("booksystem"); 
	if(isset($_SESSION['username']))
	{
		// put stored session variables into local PHP variables
		$user = $_SESSION['username'];
	}
	$check_user = "SELECT * FROM users WHERE UserName = '$user' AND Type <> 'SU'";
	$run_check = mysql_query($check_user);
	echo"reached";
	$num = mysql_num_rows($run_check);
	echo $num;
	if(mysql_num_rows($run_check)){
	$check_ru = "SELECT * FROM users WHERE UserName = '$user' AND Type = 'RU'";
	$run_checkru = mysql_query($check_ru);
	if(mysql_num_rows($run_checkru)){
	echo"You are a RU";
	header("Location: ru_home.php");
	}
	$check_se = "SELECT * FROM users WHERE UserName = '$user' AND Type = 'SE'";
	$run_checkse = mysql_query($check_se);
	if(mysql_num_rows($run_checkse)){
	echo"You are a SE";
	header("Location: se_home.php");
	}
	
	}
?>