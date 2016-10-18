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
			<center><h3>Bookstore Management</h3></center>
			<!-- End Header -->
			<br><br><br>
			<h3>
			<form>
				<fieldset >
					<legend>Active Books</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$books = "SELECT * FROM books WHERE Activated = '1'";
						$query = mysql_query($books);

						// if no results were found in books
						$num_rows = mysql_num_rows($query);
				    	if($num_rows == 0)
				    	    echo "<font color=red>There are currently no active books in the database.</font>";

				    	$suspended_books = "SELECT * FROM suspendedbooks";
				    	$check_suspended_books = mysql_query($suspendedbooks);

				    	$row_index = 1;

						echo "<br><br>";
						echo "<h4><table id = 'active' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Title</th><th>Author</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							$title = $row['Title'];
							$author = $row['Author'];

							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$row['Title']. "</td>";
							echo "<td align = 'center'>" .$row['Author']. "</td>";
							echo "<td align='center'>
									<button><a href='book_update.php?title=$title&author=$author&decision=suspend'>Suspend</a></button>
									<button><a href='book_update.php?title=$title&author=$author&decision=remove'
										onclick='return confirm(\"Are you sure you want to remove this book from the system?  Warning: This cannot be undone.\");'>
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
					<legend>Suspended Books</legend><br>
					<input type='hidden' name='submitted' id='submitted' value='1'/>
					<?php
						$sql = "SELECT * FROM suspendedbooks";
						$query = mysql_query($sql);

						// if no results were found
						$num_rows = mysql_num_rows($query);
				    	if($num_rows == 0)
				    	    echo "<font color=red>There are currently no books in suspension.</font>";

				    	$row_index = 1;

						echo "<br><br>";
						echo "<h4><table id = 'suspended' width = '900' border = '1' cellpadding = '1' cellspacing = '1' align = 'center'>";
						echo "<tr><th>Index</th><th>Title</th><th>Author</th><th>Options</th></tr>";
						while($row = mysql_fetch_array($query))
						{
							$title = $row['Title'];
							$author = $row['Author'];

							echo "<tr>";
							echo "<td align = 'center'>" .$row_index. "</td>";
							echo "<td align = 'center'>" .$row['Title']. "</td>";
							echo "<td align = 'center'>" .$row['Author']. "</td>";
							echo "<td align='center'>
									<button><a href='book_update.php?title=$title&author=$author&decision=restore'>Restore</a></button>
									<button><a href='book_update.php?title=$title&author=$author&decision=remove'
										onclick='return confirm(\"Are you sure you want to remove this book from the system?  Warning: This cannot be undone.\");'>
										Remove</a></button>
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