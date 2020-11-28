<?php
	$con = mysqli_connect("localhost", "su", "su", "dbfilm");
	if (mysqli_connect_errno($con)) {
		die("Failed to connect to MySQL: " . mysqli_connect_error($con));
	}
?>
