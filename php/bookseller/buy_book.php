<?php
	$decision= $_GET['decision'];
	$seller = $_GET['seller'];
	$price = $_GET['price'];
	$title = $_GET['title'];
	$author = $_GET['author'];
	
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

	if($decision == 'buying')
	{
	$check_balance = "SELECT * FROM users WHERE Balance >= '$price' AND UserName = '$user'";
	$run_check = mysql_query($check_balance);
	$num = mysql_num_rows($run_check);
	if($num > 0){
	$deduct_balance = "UPDATE users SET Balance = (Balance - '$price') WHERE UserName = '$user'"; //Lower the bidders balance
	mysql_query($deduct_balance);
	$add_balance = "UPDATE users SET Balance = (Balance + '$price') WHERE UserName = '$seller'";
	mysql_query($add_balance);
	$gen_receipt = "INSERT INTO receipts VALUES ('$user','$seller','$title','$author')";
	mysql_query($gen_receipt);
	$take_book_off_mp = "DELETE FROM booksforsale WHERE UserName = '$seller' AND Title = '$title' AND Author = '$author'";
	mysql_query($take_book_off_mp);
	$adjust_own_seller = "DELETE FROM booksownedby WHERE UserName = '$seller' AND Title = '$title' AND Author = '$author'";
	mysql_query($adjust_own_seller);
	$adjust_own_buyer = "INSERT INTO booksownedby VALUES('$user', '$title', '$author')";
	mysql_query($adjust_own_buyer);
	
	echo "Thank you for using BookLover!";
	}
	else{
	
	echo "your balance is too low";
	
	}
	}


	//header["location: comment.php"];
?>
