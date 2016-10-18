<?php
	// make connect
	mysql_connect("localhost", "root", "root");
	// select database
	mysql_select_db("booksystem"); 
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
			<center><h3>Account Management</h3></center>
			<!-- End Header -->
			<br><br><br>
			<h3>
			<form>
				<fieldset >
					<legend>Active Users</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$sql = "SELECT * FROM users WHERE Activated = '1'";
						$query = mysql_query($sql);

						// if no results were found
						$num_rows = mysql_num_rows($query);
				    	if($num_rows == 0)
				    	    echo "<font color=red>There are currently no active users.</font>";

				    	$row_index = 1;

						echo "<br><br>";
						echo "<h4><table id = 'active' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Username</th><th>Membership</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							$id = $row['UserName'];
							$type = $row['Type'];

							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$id. "</td>";
							echo "<td align = 'center'>" .$type. "</td>";
							if($type != 'SU'){
							echo "<td align='center'>
									<button><a href='account_update.php?id=$id&decision=suspend'>Suspend</a></button>
									<button><a href='account_update.php?id=$id&decision=blacklist'
										onclick='return confirm(\"Are you sure you want to blacklist this user?\");'>
										Blacklist</a></button>
								</td>";
								}
							echo "</tr>";

							$row_index += 1;
						}
						echo "</table></h4>";
			        ?> 
					<br><br>
				</fieldset>
				<br><br>
				<fieldset >
					<legend>Suspended Users</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$sql = "SELECT * FROM users WHERE Activated = '0'";
						$query = mysql_query($sql);

						// if no results were found
						$num_rows = mysql_num_rows($query);
				    	if($num_rows == 0)
				    	    echo "<font color=red>There are currently no suspended users.</font>";

				    	$row_index = 1;

						echo "<br><br>";
						echo "<h4><table id = 'suspended' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Username</th><th>Membership</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							$id = $row['UserName'];
							$type = $row['Type'];

							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$id. "</td>";
							echo "<td align = 'center'>" .$type. "</td>";
							echo "<td align='center'>
									<button><a href='account_update.php?id=$id&decision=restore'>Restore</a></button>
									<button><a href='account_update.php?id=$id&decision=blacklist'
										onclick='return confirm(\"Are you sure you want to blacklist this user?\");'>
										Blacklist</a></button>
								</td>";
							echo "</tr>";

							$row_index += 1;
						}
						echo "</table></h4>";
			        ?> 
					<br><br>
				</fieldset>
				<br><br>
				<fieldset >
					<legend>Blacklist</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$sql = "SELECT * FROM blacklist";
						$query = mysql_query($sql);

				    	$row_index = 1;

				    	echo "<font size = '2'>These users have one last time to login to their accounts before they are removed from this list and the rest of the system.</font>";

						echo "<br><br>";
						echo "<h4><table id = 'blacklist' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Username</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							$id = $row['UserName'];

							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$id. "</td>";
							echo "<td align='center'><button><a href='account_update.php?id=$id&decision=remove'
									onclick='return confirm(\"Are you sure you want to remove this user from the system? Warning: This cannot be undone.\");'>
									Remove</a></button>
								</td>";
							echo "</tr>";

							$row_index += 1;
						}
						echo "</table></h4>";
			        ?> 
					<br><br>
				</fieldset>
				<br><br>
				<fieldset >
					<legend>Applications</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$sql = "SELECT * FROM upgradeapplication";
						$query = mysql_query($sql);

						echo "<font size='2'>The following registered users have applied to upgrade there accounts and become a book seller.</font>";

						// if no results were found
						$num_rows = mysql_num_rows($query);
				    	if($num_rows == 0)
				    	    echo "<font color=red>There are currently no applications.</font>";

				    	$row_index = 1;

						echo "<br><br>";
						echo "<h4><table id = 'apps' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Username</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							$id = $row['UserName'];

							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$id. "</td>";
							echo "<td align='center'>
									<button><a href='application_update.php?id=$id&decision=approve'>Approve</a></button>
									<button><a href='application_update.php?id=$id&decision=deny'>Deny</a></button>
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