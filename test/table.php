<?php
	// make connection
	mysql_connect("localhost", "root", "root");
	mysql_select_db("booksystem");

	$sql = "SELECT * FROM upgradeapplication";

	$records = mysql_query($sql);


?>

<html>
<head>
	<title>Table</title>
</head>

<body>

	<table width = "600" border = "1" cellpadding = "1" cellspacing = "1">
		<tr>
			<th>Name</th>
		<tr>
			<?php
				while($row = mysql_fetch_assoc($records))
				{
					echo "<tr>";
					echo "<td>".$row['UserName']."</td>";
					echo "</tr>";
				}
			?>
	</table>

</body>
</html>