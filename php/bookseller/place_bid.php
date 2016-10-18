<?php
	$decision= $_GET['decision'];
	$title = $_GET['title'];
	$author = $_GET['author'];
	$bid = $_GET['bid'];
	$seller = $_GET['seller'];
	
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

	if($decision == 'pbid')
	{
	$check_balance = "SELECT * FROM users WHERE Balance >= (1 + '$bid') AND UserName = '$user'";
	$run_check = mysql_query($check_balance);
	if(mysql_num_rows($run_check)==1){
	$place_bid = "UPDATE booksforsale SET Bid = (1 + '$bid'), Bidder = '$user' WHERE UserName = '$seller' AND Title = '$title' AND Author = '$author'"; //update bid
	mysql_query($place_bid);
	echo "Your Bid has been placed, good luck!";
	}
	else{
	echo "Your balance was not high enough, please add money to your balance to bid";
	}
	}


	//header["location: comment.php"];
?>
