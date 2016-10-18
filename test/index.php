<?php
	session_start();

	if($_POST['username'])
	{
		// // temporary database
		// $db_Username = "brandon";
		// $db_Password = "password";

		// connect to database
		include_once("db_connect.php");

		// get user input
		$user = strip_tags($_POST["username"]);
		$pass = strip_tags($_POST["password"]);

		// increase security
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

<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title> Test </title>
</head>

<body>
<div id = "wrapper">
<h1> Login </h1>
<form id = "form" action = "index.php" method = "post" enctype = "multipart/form-data">
Username: <input type = "text" name = "username" /> <br>
Password: <input type = "password" name = "password" /> <br>
<input type = "submit" value = "Login" name = "Submit" />
</form>
</body>
</html>