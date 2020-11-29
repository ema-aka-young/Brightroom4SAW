<!DOCTYPE html>
<html lang="en">
<head>
    <title>FilmSearch - Sign-up</title>
</head>
<body>
<?php
  require('common/header.php');
	require 'common/db_conn.php'; //per connessione database
	//TODO: controlla che i campi siano tutti compilati
if(!isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['pass']))
{
  header("Location: registration_form.php");
}
else {
	$nome = mysqli_real_escape_string($con, trim($_POST["firstname"]));
	$cogn = mysqli_real_escape_string($con, trim($_POST["lastname"]));
	$email = mysqli_real_escape_string($con, trim($_POST["email"]));
	$pass = password_hash(mysqli_real_escape_string($con,trim($_POST["pass"])), PASSWORD_DEFAULT);
	$query = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$nome', '$cogn', '$email', '$pass')";
}
	$res = mysqli_query($con,$query);
	if (mysqli_affected_rows($con)==1){

		echo "<h1>";
	        echo "Hello ";
	        echo "$nome " . "$cogn ";
	        echo "your data have been registered.";
	    echo "</h1>\n";
	    //todo timer (js?)
	   	//header("Location: index.php");
    }
    mysqli_close($con);
?>
</body>
</html>
