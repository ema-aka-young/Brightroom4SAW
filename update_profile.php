<!DOCTYPE html>
<html>
<!--
<head>
<link rel="shortcut icon" href="/images/icon.ico" type="image/x-icon">
<link rel="icon" href="/progettosaw/favicon.ico" type="image/x-icon">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<meta name="description" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
<link rel="stylesheet" type="text/css" href="css/aos.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head> -->
<head>
			<title>FilmSearch - Edit Profile</title>
</head>
<?php
require 'common/header.php';
?>
<body>
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
