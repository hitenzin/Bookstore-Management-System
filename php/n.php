<html>
	<head>
	<title>Form</title>
	</head>

	<body>
	
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
	    	        $result = mysql_query("SELECT Title FROM books 
	    	        	where (Title like '%".$query."%' or Author like '%".$query."%')"); 
	                
	                echo "<table>";
	                while ($row = mysql_fetch_array($result)) {
		                    echo "<tr valign='middle'>"; 
		                    echo "<td>".$row['Title']."</td>"; 
		                	echo "</tr>"; 
                	}
                	echo "</table>";
               

                ?>   


</body>
</html>

