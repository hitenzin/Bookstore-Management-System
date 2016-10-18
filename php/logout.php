<?php
	session_start();
	session_destroy();

	if(isset($_SESSION['username']))
	{
		$msg = "You are now logged out";

		//header("Location: home.html");
	}
?>
<html>
<body>
	<?php echo $msg; ?><br>
	<p><a href = "/home.html"> Click here </a> to return to the home page. </p>
</body>
</html>