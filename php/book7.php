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
			<a href="http://localhost:8888/home.html"><img src="css/images/mainLogo.png" height=70 widht=80 /></a>
			<center><h3>Book Details</h3></center>
				<!-- End Header -->
				
			    	<br><br><br>
			    	<h3>
					<form>
						<fieldset >
							<legend>The Affair</legend><br>
							<input type='hidden' name='submitted' id='submitted' value='1'/>

							<?php

					           if(!@mysql_connect("localhost", "root", "root")) {
					                echo "<h2>Connection Error.</h2>";
					                die();
					            }
					            // else echo "Connection Succesful!";
					            mysql_select_db("booksystem");
						    ?>

						    <?php
				  	        	//$query = $_POST["query"]; 
				  	        	//echo $query;

				  	        	//$query = mysql_real_escape_string($_REQUEST['query']);
				  	        	$query = $_POST['query'];
				  	        	//echo $query."**<br>";

				  	        	// result for the query, returns everything using LIKE patter matching
				    	        $result = mysql_query("SELECT * FROM books 
				    	        	where Title = 'The Affair'"); 
						
				                echo "<h4><table>"; 
					            while ($row = mysql_fetch_array($result)) {
					            		echo "<tr><td><img src=\"css/images/image07.jpg\" height=200 width=150/></td></tr>";
					                    echo "<tr><td>Title = ".$row['Title']."</td></tr>"; 
					                    echo "<tr><td>Author = ".$row['Author']."</td></tr>"; 
					                    echo "<tr><td>Genre = ".$row['Genre']."</td></tr>"; 
					                    echo "<tr><td>Year = ".$row['Year']."</td></tr>"; 
					                    echo "<tr><td>Publisher = ".$row['Publisher']."</td></tr>"; 
					                    echo "<tr><td>Summary = ".$row['Abstract']."</td></tr>"; 
					                    echo "<tr></tr><tr><tr/><tr></tr><tr></tr><tr><tr/><tr></tr>";
					                    echo "<tr></tr><tr><tr/><tr></tr><tr></tr><tr><tr/><tr></tr>";
			                	}
			                	echo "</table></h4>";
			                ?>   

							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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


