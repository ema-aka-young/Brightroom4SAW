<?php
	$con = mysqli_connect("localhost", "", "", "");
	if (mysqli_connect_errno($con)) {
		die("Failed to connect to MySQL: " . mysqli_connect_error($con));
	}
	 $db_selected = mysqli_select_db($con, '');
	 if (!$db_selected) {
		 die("Failed to connect to the database: " . mysql_error());
	 }
	 define('BASE_URL', 'https://webdev19.dibris.unige.it/~S4668271/');
?>
