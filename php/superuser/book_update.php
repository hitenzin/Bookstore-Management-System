<?php
	$title = $_GET['title'];
	$author = $_GET['author'];
	$decision = $_GET['decision'];
	echo $title; echo $author; echo $decision;	// test

	mysql_connect('localhost', 'root', 'root');
	mysql_select_db('booksystem');

	// update the database
	if ($decision == 'suspend')
	{
		$activation = "UPDATE books SET Activated = '0' WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($activation);
		if ($query) echo "<br>Successfully suspended book";
		else echo "<br>Error: failed to suspend book"; 

		$suspend_book = "INSERT INTO suspendedbooks (Title, Author) VALUES ('$title', '$author')"; 
		$query = mysql_query($suspend_book);
		if ($query) echo "<br>Successfully added book to suspendedbooks";
		else echo "<br>Error: failed to add suspended book";

		$remove_from_booksforsale = "DELETE FROM booksforsale WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_booksforsale);
		if($query) echo "<br>Successfully removed book from booksforsale";
		else echo "<br>Error: failed to remove from booksforsale";
	}
	else if ($decision == 'restore')
	{
		$activation = "UPDATE books SET Activated = '1' WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($activation);
		if ($query) echo "<br>Successfully unsuspended book";
		else echo "<br>Error: failed to unsuspend book"; 

		$remove_from_suspendedbooks = "DELETE FROM suspendedbooks WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_suspendedbooks);
		if($query) echo "<br>Successfully removed book from suspendedbooks";
		else echo "<br>Error: failed to remove from suspended";

		// reset all ratings of this book
		$remove_from_bookratings = "DELETE FROM bookratings WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_bookratings);
		if($query) echo "<br>Successfully resetted book ratings";
		else echo "<br>Error: failed to reset book ratings";
	}
	else if ($decision == 'remove')
	{
		$remove_from_books = "DELETE FROM books WHERE Title = '$title' AND Author = '$author'"; 
		$query = mysql_query($remove_from_books);
		if ($query) echo "<br>Successfully removed book from books";
		else echo "<br>Error: failed to remove from books";

		$remove_from_booksforsale = "DELETE FROM booksforsale WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_booksforsale);
		if($query) echo "<br>Successfully removed book from booksforsale";
		else echo "<br>Error: failed to remove from booksforsale";

		$remove_from_booksownedby = "DELETE FROM booksownedby WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_booksownedby);
		if($query) echo "<br>Successfully removed book from booksownedby";
		else echo "<br>Error: failed to remove from booksownedby";

		$remove_from_bookratings = "DELETE FROM bookratings WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_bookratings);
		if($query) echo "<br>Successfully removed book from bookratings";
		else echo "<br>Error: failed to remove from bookratings";

		$remove_from_comments = "DELETE FROM comments WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_comments);
		if($query) echo "<br>Successfully removed book from comments";
		else echo "<br>Error: failed to remove from comments";

		$remove_from_recentlyviewed = "DELETE FROM recentlyviewed WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_recentlyviewed);
		if($query) echo "<br>Successfully removed book from recentlyviewed";
		else echo "<br>Error: failed to remove from recentlyviewed";

		$remove_from_suspendedbooks = "DELETE FROM suspendedbooks WHERE Title = '$title' AND Author = '$author'";
		$query = mysql_query($remove_from_suspendedbooks);
		if($query) echo "<br>Successfully removed book from suspendedbooks";
		else echo "<br>Error: failed to remove from suspended";
	}

	//header("location: store_management.php");
?>

<html>
<body>
	<p><a href = "store_management.php"> Click here </a> to return to the store management page. </p>
</body>
</html>