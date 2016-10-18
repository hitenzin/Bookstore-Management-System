<?php
	// make connect
	mysql_connect("localhost", "root", "root");
	// select database
	mysql_select_db("booksystem"); 
	session_start();
	if(isset($_SESSION['username']))
	{
		// put stored session variables into local PHP variables
		$user = $_SESSION['username'];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head>
		<title>BookLover</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="css/images/favicon.ico" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
		
	</head>

	<body>
		<!-- Header -->
		<div id="header" class="shell">
			<a href="http://localhost/su_home.php"><img src="css/images/mainLogo.png" height=70 widht=80 /></a>
			<center><h3>Manage Your Marketplace</h3></center>
			<!-- End Header -->
			<br><br><br>
			<h3>
			<form>
				<fieldset >
					<legend>Books Being Sold</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$sql = "SELECT * FROM booksforsale WHERE UserName = '$user'";
						$query = mysql_query($sql);
						//var comm = null;
						// if no results were found
						$num_rows = mysql_num_rows($query);
				    	if($num_rows == 0)
				    	    echo "<font color=red>You are not selling any books!</font>";

				    	$row_index = 1;

						echo "<br><br>";
						echo "<h4><table id = 'active' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Title</th><th>Author</th><th>Price</th><th>Current Bid</th><th>Sale Ends on:</th><th>Bidder</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							$bidder = $row['Bidder'];
							$title = $row['Title'];
							$author = $row['Author'];
							$price = $row['Price'];
							$bid = $row['Bid'];
							$lastday = $row['DateFinish'];
							
							//$commenti = comm;
							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$row['Title']. "</td>";
							echo "<td align = 'center'>" .$row['Author']. "</td>";
							echo "<td align = 'center'>" .$row['Price']. "</td>";
							echo "<td align = 'center'>" .$row['Bid']. "</td>";
							echo "<td align = 'center'>" .$row['DateFinish']. "</td>";
							echo "<td align = 'center'>" .$row['Bidder']. "</td>";
							echo "<td align='center'>
							
									<button><a href='accept_bid.php?title=$title&author=$author&seller=$user&buyer=$bidder&bid=$bid&decision=abid'>Accept_Bid</a></button>
									
								</td>";
							echo "</tr>";

							$row_index += 1;
							
						}
						echo "</table></h4>";
			        ?> 
					<br><br>
				</fieldset>
				<br><br>
				<legend>Books to Sell</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$sql = "SELECT * FROM booksownedby WHERE UserName = '$user' AND Title NOT IN(SELECT Title FROM booksforsale WHERE UserName = '$user' AND Author = booksownedby.Author) AND Title NOT IN(SELECT Title FROM books WHERE Author = booksownedby.Author AND Activated = '0')";
						$query = mysql_query($sql);
						//var comm = null;
						// if no results were found
						$num_rows = mysql_num_rows($query);
				    	if($num_rows == 0)
				    	    echo "<font color=red>You have no books to sell right now!</font>";

				    	$row_index = 1;

						echo "<br><br>";
						echo "<h4><table id = 'active' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Title</th><th>Author</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							
							$title = $row['Title'];
							$author = $row['Author'];
							
							//$commenti = comm;
							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$row['Title']. "</td>";
							echo "<td align = 'center'>" .$row['Author']. "</td>";
							echo "<td align='center'>
							
									<button><a href='put_on_mp.php?title=$title&author=$author&decision=sell'>Sell_Book</a></button>
									
								</td>";
							echo "</tr>";

							$row_index += 1;
							
						}
						echo "</table></h4>";
			        ?> 
					<br><br>
				</fieldset>
			</form>
			</h3>
			<br><br><br>
	  	</div>

		<!-- Footer -->
		<br>
		<center><b><font color=white>&copy;</font>&nbsp;<a href="#"><font color=white>BookLover</font></a></center>
		<br><br><br>
		<!-- End Footer -->
	</body>
</html>