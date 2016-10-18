<?php
	session_start();

	if($_POST['username'])
	{
		// connect to database
		include_once("mysql_connect.php");

		// get user input
		$user = strip_tags($_POST["username"]);
		$pass = strip_tags($_POST["password"]);

		$user = mysqli_real_escape_string($db_connect, $user);
		$pass = mysqli_real_escape_string($db_connect, $pass);

		$sql = "SELECT UserName, Password FROM users WHERE UserName = '$user' AND Activated = '1' LIMIT 1";
		
		$query = mysqli_query($db_connect, $sql);
		if(!$query)
		{
			die("Error: " .mysqli_error($db_connect));
		}

		$row = mysqli_fetch_row($query);
		$db_Username = $row[0];
		$db_Password = $row[1];
		$db_UserType = $row[2];

		if($user == $db_Username && $pass == $db_Password)
		{
			//  set session variables
			$_SESSION['username'] = $user;

			//  direct to users feed
			header("Location: user.php");
		}
		else
		{
			echo "Oops... your username or password is incorrect.";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<title>BookLover</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="css/images/favicon.ico" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
	</head>

	<body>
		<!-- Header -->
		<div id="header" class="shell">
			<a href="home.html"><img src="css/images/mainLogo.png" height=70 widht=80 /></a>
			<center><h3>Log In</h3></center>
			<!-- End Header -->
			<br><br><br>
			<h3>
			<form id='login' action='mylogin.php' method='post' accept-charset='UTF-8' enctype = "multipart/form-data">
				<fieldset >
					<legend>Log In</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
		
					<label for='username' >Username:</label>
					<input type='text' name='username' id='username' maxlength="15" /><br>

					<label for='password' >Password:</label>
					<input type='password' name='password' id='password' maxlength="15" /> <br>

		
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<input type='submit' name='Submit' value='Login' />
					<br><br>
				</fieldset>
			</form>
			</h3>
			<br><br><br>
	  	</div>
		<!-- End Main -->

		<!-- Footer -->
		<br>
		<center><b><font color=white>&copy;</font>&nbsp;<a href="#"><font color=white>BookLover</font></a></center>
		<br><br><br>
		<!-- End Footer -->
	</body>
</html>
