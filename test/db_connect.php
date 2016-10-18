<?php
	$db_connect = mysqli_connect("localhost", "root", "root", "booksystem");

	if(mysqli_connect_errno())
	{
		echo "Failed to connect to mySQL: " .mysqli_connect_error();
	}
?>