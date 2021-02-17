<?php
//action.php

session_start();
require('../../db_conn.php');

if (!isset($_SESSION["admin"])){
	die( header( 'Location: ../403.php' ));
}

if($_SERVER['REQUEST_METHOD'] != 'POST'){
  die( header( 'Location: ../403.php' ));
}

if($_POST['action'] == 'edit')
{

 $id    = $_POST['id'];
 $user_id = $_POST['user_id'];
 $title  = $_POST['title'];
 $slug  = $_POST['slug'];
 $image  = $_POST['image'];
 $published = $_POST['published'];
 $created_at = $_POST['created_at'];

 $query = "UPDATE posts
SET user_id = ?,
title = ?,
slug = ?,
image = ?,
published = ?,
created_at = ?
WHERE id = '".$_POST["id"]."'
";
$stmt = $con->prepare($query);
$stmt->bind_param("ssssss",$user_id,$title,$slug,$image,$published,$created_at);
$stmt->execute();
$stmt->close();
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "DELETE FROM posts
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = mysqli_query($con,$query);
 echo json_encode($_POST);
}

$con->close();
?>
