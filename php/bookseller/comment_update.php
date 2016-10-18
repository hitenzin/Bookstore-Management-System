<?php
	if($_POST['newcomm']){
	$title= $_GET['title'];
	$author= $_GET['author'];
	$decision= $_GET['decision'];
	$newcomm = strip_tags($_POST['newcomm']);

	if($newcomm){
	echo $newcomm;
	};
	// make connect
	mysql_connect("localhost", "root", "root");
	// select database
	mysql_select_db("booksystem"); 
	$db_connect = mysqli_connect("localhost", "root", "root", "booksystem");
	$newcomm = mysqli_real_escape_string($db_connect, $newcomm);
	if($decision == 'comment')
	{
	$new_comm = "INSERT INTO comments(Title, Author, Comments) VALUES ('$title', '$author', '$newcomm')";
	$add_comm = mysql_query($new_comm);
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
		<!--[if IE 6]>
			<script type="text/javascript" src="js/png-fix.js"></script>
		<![endif]-->
		<script type="text/javascript" src="js/functions.js"></script>
	</head>

	<body>
		<!-- Header -->
		<div id="header" class="shell">
			<a href="http://localhost/home.html"><img src="css/images/mainLogo.png" height=70 widht=80 /></a>
			<center><h3>Comment</h3></center>
				<!-- End Header -->
				<?php
					include_once "mysql_connect.php";
			    ?>
			<br><br><br>
			<h3>
			
			<?php
	
	$title= $_GET['title'];
	$author= $_GET['author'];
	$decision= $_GET['decision'];
			echo"<form id='comment' action='comment_update.php?title=$title&author=$author&decision=comment' method='post' accept-charset='UTF-8'>";
			echo"	<fieldset >";
			echo"		<legend>New Comment</legend><br>";
			echo"		<input type='hidden' name='submitted' id='submitted' value='1'/>";

			echo"		<label for='newcomm' >Newcomm:</label>";
			echo"		<input type='text' name='newcomm' id='newcomm' maxlength='100'/><br>";


			echo"		<input type='submit' name='Submit' value='Submit' />";
			echo"		<br><br>";
			echo"	</fieldset>";
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
