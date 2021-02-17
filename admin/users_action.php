<?php
//action.php

session_start();
require('../../db_conn.php');

if (!isset($_SESSION["admin"])){
	die( header( 'Location: ../403.php' ));
}

if($_SERVER['REQUEST_METHOD'] != 'POST'){
   $error = "403. You don’t have permission to access this page";
	$_SESSION['error'] = $error;
   die( header( 'location: /~S4668271/common/error.php' ));
}

if($_POST['action'] == 'edit')
{

 $id    = $_POST['id'];
 $nome  = $_POST['nome'];
 $cognome  = $_POST['cognome'];
 $email   = $_POST['email'];
 $role = $_POST['role'];

 $query = "UPDATE users
SET nome = ?,
cognome = ?,
email = ?,
role = ?
WHERE id = '".$_POST["id"]."'
";
$stmt = $con->prepare($query);
$stmt->bind_param("ssss", $nome,$cognome,$email,$role);
$stmt->execute();
$stmt->close();
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "DELETE FROM users
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = mysqli_query($con,$query);
 echo json_encode($_POST);
}

$con->close();
?>
