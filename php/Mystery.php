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
			<center><h3>Mystery Category</h3></center>
				<!-- End Header -->
				
			    	<br><br><br>
			    	<h3>
					<form>
						<fieldset >
							<legend>Book Details</legend><br>
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
				    	        $result = mysql_query("SELECT * FROM books where Genre = 'Mystery' order by Title"); 
								
								// when no result is found from query
				    	        $num_results = mysql_num_rows($result); 
				    	        if($num_results == 0)
				    	        	echo "<font color=red>No Search Result Found!</font>";
				    	        else 
				    	        	echo $num_results." results found.";

				    	        echo "<br><br>";
				                echo "<h4><table>"; 
					            while ($row = mysql_fetch_array($result)) {
					            		$bookTitle = $row['Title'];
	
					                    switch ($bookTitle) {
										    case "The Devils Elixir":
										        echo "<tr><td><img src=\"css/images/image01.jpg\" /></td></tr>";
										        break;
										    case "The Shepard":
										        echo "<tr><td><img src=\"css/images/image02.jpg\" /></td></tr>";
										        break;
										    case "A Praying Life":
										        echo "<tr><td><img src=\"css/images/image03.jpg\" /></td></tr>";
										        break;
										    case "Strange Case of Finley Jayne":
										        echo "<tr><td><img src=\"css/images/image04.jpg\" /></td></tr>";
										        break;
										    case "007 Carte Blanche":
										        echo "<tr><td><img src=\"css/images/image05.jpg\" /></td></tr>";
										        break;
										    case "Trader of Secrets":
										        echo "<tr><td><img src=\"css/images/image06.jpg\" /></td></tr>";
										        break;
										    case "The Affair":
										        echo "<tr><td><img src=\"css/images/image07.jpg\" /></td></tr>";
										        break;
										    case "The Third Gate":
										        echo "<tr><td><img src=\"css/images/image08.jpg\" /></td></tr>";
										        break;
										    case "So Good They Cant Ignore You":
										        echo "<tr><td><img src=\"css/images/sliderbook1.png\"  height=200 width=150/></td></tr>";
										        break;
										    case "Animal Farm":
										        echo "<tr><td><img src=\"css/images/sliderbook2.png\" height=200 width=250/></td></tr>";
										        break;
										    case "The Good House":
										        echo "<tr><td><img src=\"css/images/sliderbook3.png\" height=200 width=150/></td></tr>";
										        break;
										    case "Maestro":
										        echo "<tr><td><img src=\"css/images/sliderbook4.png\" height=200 width=150/></td></tr>";
										        break;
										}

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


