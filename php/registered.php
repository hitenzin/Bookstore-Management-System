<?php
		// connect to database
		include_once("superuser/mysql_connect.php");
					            
		// get user input
		$name = strip_tags($_POST["name"]);
		$username = strip_tags($_POST["username"]);
		$pass = strip_tags($_POST["password"]);
		$usertype = strip_tags($_POST["type"]);
		$amount = strip_tags($_POST["balance"]);
		$address = strip_tags($_POST["address"]);


		if(!$name || !$username || !$pass || !$usertype || !$amount || !$address)
			echo "Please fill in all the forms.";
		else {

			if(!@mysql_connect("localhost", "root", "root")) {
					                echo "<h2>Connection Error.</h2>";
					                die();
					            }
			//else echo "Connection Succesful!";
			mysql_select_db("booksystem");

			$result = mysql_query("insert into users(UserName, Type, UPass, Name, Address, Balance, Activated)
			 values('$username', '$usertype', '$pass', 'name', '$address', '$balance', '1')");
			//$result = mysql_query("SELECT count(*) from users"); 

			if($result){
				echo "Registration Succesful! Go to <a href = \"logIn.php\"> LogIn. </a>";
			}
		}
?>

