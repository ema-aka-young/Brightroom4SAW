<!DOCTYPE html>
<html lang="it">
<head>
    <title>FilmSearch - Sign-up</title>
</head>
<body>

<?php
  session_start();
  require 'common/header.php';
	require 'common/db_conn.php'; //per connessione database
	if(!isset($_POST['email'], $_POST['pass']))
	{
  	header("Location: login_form.php");
	}
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
