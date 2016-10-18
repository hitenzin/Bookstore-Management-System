<?php
	$decision= $_GET['decision'];
	$bidder = $_GET['buyer'];
	$title = $_GET['title'];
	$author = $_GET['author'];
	$bid = $_GET['bid'];
	
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

	if($decision == 'abid')
	{
	$deduct_balance = "UPDATE users SET Balance = (Balance - '$bid') WHERE UserName = '$bidder'"; //Lower the bidders balance
	mysql_query($deduct_balance);
	$add_balance = "UPDATE users SET Balance = (Balance + '$bid') WHERE UserName = '$user'";
	mysql_query($add_balance);
	$gen_receipt = "INSERT INTO receipts VALUES ('$bidder','$user','$title','$author')";
	mysql_query($gen_receipt);
	$take_book_off_mp = "DELETE FROM booksforsale WHERE UserName = '$user' AND Title = '$title' AND Author = '$author'";
	mysql_query($take_book_off_mp);
	$adjust_own_seller = "DELETE FROM booksownedby WHERE UserName = '$user' AND Title = '$title' AND Author = '$author'";
	mysql_query($adjust_own_seller);
	$adjust_own_buyer = "INSERT INTO booksownedby VALUES('$bidder', '$title', '$author')";
	mysql_query($adjust_own_buyer);
	
	echo "Thank you for using BookLover!";
	
	}


	//header["location: comment.php"];
?>
