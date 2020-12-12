<?php
	require 'common/db_conn.php'; //per connessione database
	$email = mysqli_real_escape_string($con, trim($_GET['email']));

	$query = "select email from utenti where email = '$email' ";
	$res = mysqli_query($con,$query);
	
	if(mysqli_num_rows($res) >0){
		return "ko"; 
	}
?>