<?php
session_start();
require 'common/db_conn.php';

if (!isset($_SESSION["login"])):
  $error = "Non hai ancora fatto il login";
  $_SESSION['error'] = $error;
  header ("Location: error.php");
endif;

$newpass = password_hash(mysqli_real_escape_string($con,trim($_POST["newpass"])), PASSWORD_DEFAULT);
$confirmnewpass = mysqli_real_escape_string($con, trim($_POST["confirmnewpass"]));

$query = "UPDATE users SET password='$newpass' WHERE id=". $_SESSION['id'] . ";";
if (mysqli_query($con, $query))
{
  header("Location: show_profile.php");
}
else
{
  mysqli_error($con);
  $error = "We have some problems changing your password :( \n<u><a href='show_profile.php'>Try again!</a></u>)";
  $_SESSION['error'] = $error;
  header ("Location: error.php");
}
mysqli_close($con);


require 'common/footer.php' ?>
</html>
