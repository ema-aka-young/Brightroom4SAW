<!DOCTYPE html>
<html lang="en">
<head>
    <title>FilmSearch - Welcome</title>
</head>
<body>
<?php
    require('common/header.php');
	require('common/db_conn.php'); //per connessione database
if(!isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['pass']))
{
  header("Location: registration_form.php");
}

$email = mysqli_real_escape_string($con, trim($_POST['email']));
$query = "SELECT email FROM users WHERE email = '$email' ";
$res = mysqli_query($con,$query);
if (mysqli_num_rows($res) >0) {
    header("Location: login_form.php");
}
else {
	$nome = mysqli_real_escape_string($con, trim($_POST["firstname"]));
	$cogn = mysqli_real_escape_string($con, trim($_POST["lastname"]));
	$pass = password_hash(mysqli_real_escape_string($con,trim($_POST["pass"])), PASSWORD_DEFAULT);
	$query = "INSERT INTO users (nome, cognome, email, password) VALUES ('$nome', '$cogn', '$email', '$pass')";
}
	$res = mysqli_query($con,$query);
	if (mysqli_affected_rows($con)==1){

echo "
<section id=\"hero\" class=\"d-flex flex-column justify-content-center align-items-center\">
    <div class=\"container text-align-top text-center text-md-center\" data-aos=\"fade-up\">
       <div class=\"clearfix\">
       <img class=\"img-fluid float-center\" src=\"images/welcome.png\" alt=\"Welcome\"> ";
       echo "<h1>Welcome on board, ";
       echo "$nome " . "$cogn ";
       echo "!</h1>";
       echo "<p>Click <u><a href='login_here.php'>here</a></u> to start using FilmSearch.</p>
       </div>
    </div>
</section>";
    }
    mysqli_close($con);
?>
 <?php require 'common/footer.php' ?>
</html>
