<?php
	if($_POST['complaint']){
	$rateduser= $_GET['rateduser'];
	$decision= $_GET['decision'];
	$complaint = $_POST['complaint'];
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

	if($decision == 'comp')
	{
	$new_comp = "INSERT INTO complaints VALUES ('$rateduser', '$complaint')";
	$add_comp = mysql_query($new_comp);
	if($add_comp){
	$check_if_seller = "SELECT * FROM users WHERE UserName = '$rateduser' AND Type = 'SE'";
	$run_check = mysql_query($check_if_seller);
	if((mysql_num_rows($run_check))>0){
	$sus_seller = "UPDATE users SET Activated = '0' WHERE UserName = '$rateduser'";
	mysql_query($sus_seller);
	$find_books_owned = "SELECT * FROM booksownedby WHERE UserName = '$rateduser'";
	$get_books_owned = mysql_query($find_books_owned);
	while($row = mysql_fetch_array($get_books_owned))
						{
							$title = $row['Title'];
							$author = $row['Author'];
							$sus_seller_books = "UPDATE books SET Activated = '0' WHERE Title = '$title' AND Author = '$author'";
							mysql_query($sus_seller_books);
							$row_index += 1;
						}
						}
	echo "Complaint Added!";
	//usleep(4000000);
	//header("location: comment.php");
	}
	else {
	echo "Complaint failed to be added";
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
			<center><h3>Complaint</h3></center>
			<!-- End Header -->
			<br><br><br>
			<h3>
			<?php
	$rateduser= $_GET['rateduser'];
			echo"<form id='complaint' action='complain_seller.php?rateduser=$rateduser&decision=comp' method='post' accept-charset='UTF-8'>";
				echo"<fieldset >";
					echo"<legend>New Complaint</legend><br>";
					echo"<input type='hidden' name='submitted' id='submitted' value='1'/>";

					echo"<label for='complaint' >Complaint: </label>";
					echo"<input type='text' name='complaint' id='complaint' maxlength='100'/><br>";


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
