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
			<center><h3>Registration</h3></center>
				<!-- End Header -->
				<?php
					include_once "mysql_connect.php";
			    ?>
		
			    	<br><br><br>
			    	<h3>
					<form id='register' action='registered.php' method='post' accept-charset='UTF-8'>
						<fieldset >
							<legend>Register</legend><br>
							<input type='hidden' name='submitted' id='submitted' value='1'/>

							<label for='name' >Full Name: </label>
							<input type='text' name='name' id='name' maxlength="20" /> <br>

							<label for='username' >Username:</label>
							<input type='text' name='username' id='username' maxlength="15" /><br>

							<label for='password' >Password:</label>
							<input type='password' name='password' id='password' maxlength="15" /> <br>

							<label for='type' >User Type:</label>
								<select name="type">
									<option value="RU">Registered User</option>
									<!-- <option value="SE">Seller</option>
									<option value="SU">Super User</option> -->
								</select><br>
							 
							<label for='balance' >Add Amount:</label>
							<input type='number' name='balance' id='balance' /><br>
							<label for='address' >Address:</label>
							<input type='text' name='address' id='address' size="60" /><br>

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							<input type='submit' name='Submit' value='Register' />
							<br><br>
						</fieldset>
					</form>
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


