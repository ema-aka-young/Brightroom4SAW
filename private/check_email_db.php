<?php
include '../../db_conn.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
   die( header( 'Location: ../403.php' ));
}
$email = mysqli_real_escape_string($con, trim($_POST['email']));
$query = "SELECT email FROM users WHERE email = '$email' ";
$res = mysqli_query($con,$query);
if (mysqli_num_rows($res) >0) {
    echo "<p style=\"color:red\">Email already in use</p>";
}
else echo "";
exit();
?>
