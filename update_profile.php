<?php 
	require 'common/header.php';
	require 'common/db_conn.php';


	echo "<h4> GET values:</h4>";
	echo "<p> " . $_POST['nome'] . "</p>";
	echo "<p> " . $_POST['surname'] . "</p>";
	echo "<p> " . $_POST['email'] . "</p>";

	
	$query = "update utenti set nome=?, cognome=?, email=? where id=". $_SESSION['id'] . ";";

	$stmt = mysqli_prepare($con, $query);
	mysqli_stmt_bind_param($stmt, 'sss', $_POST['nome'], $_POST['surname'], $_POST['email']);
	mysqli_stmt_execute($stmt);

	if(mysqli_affected_rows($con) === 0){
		echo "<p>Something went really bad, didn't update your profile.</p>";
		mysqli_close($con);
	} else{
		echo "<p>SUCCESS</p>";
		mysqli_close($con);
		//header('location: index.php');
	}
	
?>