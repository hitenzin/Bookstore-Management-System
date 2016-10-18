<?php
	$seller= $_GET['seller'];
	$title= $_GET['title'];
	$author= $_GET['author'];
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

	if($decision == 'return')
	{
	$return = "DELETE FROM receipts WHERE UserNameBuyer = '$user' AND UserNameSeller = '$seller' AND Title = '$title' AND Author = '$author'";
	$complete_return = mysql_query($return);
	if($complete_return){
	echo "Book Has Been Returned!";
	//usleep(4000000);
	//header("location: comment.php");
	}
	else {
	echo "Book Could not be returned";
	//usleep(4000000);
	//header("location: comment.php");
	}
	
	}


	//header["location: comment.php"];
?>
