<?php
	session_start();

	if($_POST['username'])
	{
		// connect to database
		include_once("superuser/mysql_connect.php");
		
		// get user input
		$user = strip_tags($_POST["username"]);
		$pass = strip_tags($_POST["password"]);
		
		$user = mysqli_real_escape_string($db_connect, $user);
		$pass = mysqli_real_escape_string($db_connect, $pass);
		//might need to change login so that it does not check for activated that way we can tell users if their account is suspended
		$sql = "SELECT UserName, UPass, Type, Activated FROM users WHERE UserName = '$user' AND Activated = '1' LIMIT 1";
		$check_black = "SELECT * FROM blacklist WHERE UserName = '$user'";
		$query = mysqli_query($db_connect, $sql);
		$run_check_black = mysql_query($db_connect, $check_black);
		if(!$query && !$run_check_black)
		{
			die("Error: " .mysqli_error($db_connect));
		}
		
		if($query)
		{
		$row = mysqli_fetch_row($query);
		$db_Username = $row[0];
		$db_Password = $row[1];
		$db_UserType = $row[2];
		$db_Active = $row[3];
		
		echo $db_UserType;

		if($user == $db_Username && $pass == $db_Password)
		{
			//  set session variables
			$_SESSION['username'] = $user;

			//  direct to users feed
			if($db_UserType == "RU")
			{			
				header("Location: ../ru_home.php");
			}
			
			if($db_UserType == "SE")
			{			
				header("Location: ../se_home.php");
			}
			
			if($db_UserType == "SU")
			{			
				header("Location: ../su_home.php");
			}
		}
		elseif($pass <> $db_Password || $user <> $db_username)
		{
			echo "Oops... your username or password is incorrect.";
		}//check statements should be counts or exist were if count == 1 then it exists
		}
		
		if($run_check_black)
		{
		$row1 = mysqli_fetch_row($check_black);
		$dbblack_Username = $row1[0];
		$dbblack_LastLogin = $row1[1];
		

		
		if($user == $dbblack_Username && $dbblack_LastLogin)
		{
		
			if($user == $db_Username && $pass == $db_Password)
			{
			$update_lastlogin = "UPDATE blacklist SET LastLogin = '0' WHERE UserName = '$user'";
			mysql_query($db_connect, $update_lastlogin);
			echo "Your account has been blacklisted, this is your last login.";
			usleep(3000000);//delay rerouting
			//  set session variables
			$_SESSION['username'] = $user;
			if($db_UserType == "RU")
			{			
				header("Location: ../ru_home.php");
			}
			
			if($db_UserType == "SE")
			{			
				header("Location: ../se_home.php");
			}
			
			if($db_UserType == "SU")
			{			
				header("Location: ../su_home.php");
			}
			
			}

		
		}
		
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
			<a href="http://localhost/home.html"><img src="css/images/mainLogo.png" height=70 widht=80 /></a>
			<center><h3>Log In</h3></center>
			<!-- End Header -->
			<br><br><br>
			<h3>
			<form id='login' action='login.php' method='post' accept-charset='UTF-8' enctype = "multipart/form-data">
				<fieldset >
					<legend>Log In</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>

					<label for='username' >Username:</label>
					<input type='text' name='username' id='username' maxlength="15" /><br>

					<label for='password' >Password:</label>
					<input type='password' name='password' id='password' maxlength="15" /> <br>

					<input type='submit' name='Submit' value='Log In' />
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


