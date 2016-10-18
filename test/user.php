<?php
	session_start();

	if(isset($_SESSION['username']))
	{
		// put stored session variables into local PHP variables
		$user = $_SESSION['username'];
		$result = "Welcome " .$user;
	}
	else
	{
		$result = "You are not logged in";
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title> <?php echo $user; ?> </title>
</head>

<body>
	<?php
		echo $result;
	?>
</body>
</html>