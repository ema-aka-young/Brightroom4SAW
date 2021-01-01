<?php
	$con = mysqli_connect("localhost", "S4668271", "fragola86", "S4668271");
	if (mysqli_connect_errno($con)) {
		die("Failed to connect to MySQL: " . mysqli_connect_error($con));
	}
	 $db_selected = mysqli_select_db($con, 'S4668271');
	 if (!$db_selected) {
		 die("Failed to connect to the database: " . mysql_error());
	 }
?>
