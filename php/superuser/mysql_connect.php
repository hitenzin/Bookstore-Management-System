<?php
	// $db_host = "localhost";
	// $db_username = "root";
	// $db_pass = "root";
	// $db_name = "booksystem"; 

	// @mysql_connect("$db_host", "$db_username", "$db_pass") or die ("Could not connect to MySQL.");
	// @mysql_select_db("$db_name") or die ("Database could not be found.");

	// echo "Successful Connection";

	$db_connect = mysqli_connect("localhost", "root", "root", "booksystem");

	if(mysqli_connect_errno())
	{
		echo "Failed to connect to mySQL: " .mysqli_connect_error();
	}
?>