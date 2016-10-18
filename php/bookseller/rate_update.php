<?php
	if($_POST['rating']){
	$title= $_GET['title'];
	$author= $_GET['author'];
	$decision= $_GET['decision'];
	$newrat = strip_tags($_POST["rating"]);
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
	$db_connect = mysqli_connect("localhost", "root", "root", "booksystem");
	$newrat = mysqli_real_escape_string($db_connect, $newrat);
	if($decision == 'rate')
	{
	$new_rat = "INSERT INTO bookratings VALUES ('$user', '$title', '$author', '$newrat', '0')";
	$add_rat = mysql_query($new_rat);
	if($add_comm){
	echo "Comment Added!";
	//usleep(4000000);
	//header("location: comment.php");
	}
	else {
	echo "Comment failed to be added";
	//usleep(4000000);
	//header("location: comment.php");
	}
	}


	}
	//header["location: comment.php"];
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
			<center><h3>Rating</h3></center>
			<!-- End Header -->
			<br><br><br>
			<h3>
			<?php
	
	$title= $_GET['title'];
	$author= $_GET['author'];
	$decision= $_GET['decision'];
			echo"<form id='comment' action='rate_update.php?title=$title&author=$author&decision=rate' method='post' accept-charset='UTF-8' enctype = 'multipart/form-data'>";
				echo"<fieldset >";
					echo"<legend>New Rating</legend><br>";
					echo"<input type='hidden' name='submitted' id='submitted' value='1'/>";

					echo"<label for='rating' >Rating:</label>";
					echo"<input type='number' name='rating' id='rating' min='1' max='5'/><br>";


					echo"<input type='submit' name='Submit' value='Submit' />";
					echo"<br><br>";
				echo"</fieldset>";
			echo"</form>";
			?>
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
