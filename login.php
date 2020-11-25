<!DOCTYPE html>
<html lang="it">
<head>
    <title>Sign-up</title>
    <?php
    require 'common/head.php'
    ?>

</head>

<html lang="en">
   <head>
     <link rel="shortcut icon" href="/images/icon.ico" type="image/x-icon">
     <link rel="icon" href="/progettosaw/favicon.ico" type="image/x-icon">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>FilmSearch</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
      <link rel="stylesheet" type="text/css" href="css/aos.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>

<body>

<?php
	require 'common/db_conn.php'; //per connessione database
	require 'common/header.php'; //per sessioni
	$email = mysqli_real_escape_string($con, trim($_POST["email"]));
	$pssw = mysqli_real_escape_string($con, trim($_POST["pass"]));

  	$query = "SELECT id, password from utenti where email = '$email';";
  	$res = mysqli_query($con,$query);
  	$pssw_db = mysqli_fetch_assoc($res);


	if (password_verify($pssw,$pssw_db["password"]))
	{
	    $_SESSION["login"] = 1;
	    $_SESSION["id"] = $pssw_db["id"];
	   	header("Location: index.php");
	    exit();

	} else {
	    echo "<br> <h3> Email o password errati, riprovare! :( </h3> <br>";
	    echo "<p><a href='login_form.php'>Try again</a></p>";
	}

?>
</body>
</html>
