<?php
//fetch.php

session_start();
require('../../db_conn.php'); //for database connection

if (!isset($_SESSION["admin"])){
	die( header( 'Location: ../403.php' ));
}

if($_SERVER['REQUEST_METHOD'] != 'POST'){
  die( header( 'Location: ../403.php' ));
}



$column = array("id", "nome", "cognome", "email", "role");
$query = "SELECT * FROM users";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE nome LIKE "%'.$_POST["search"]["value"].'%"
 OR cognome LIKE "%'.$_POST["search"]["value"].'%"
 OR email LIKE "%'.$_POST["search"]["value"].'%"
 OR role LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id ASC ';
}
$query1 = '';


if($_POST['length'] != -1)
{
$query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = mysqli_query($con,$query);
$number_filter_row = $con->affected_rows;
$statement = mysqli_query($con,$query . $query1);
$result = $statement->fetch_all(MYSQLI_ASSOC);
$data = array();
foreach ($result as $row) {
  $sub_array = array();
  $sub_array[] = $row['id'];
  $sub_array[] = $row['nome'];
  $sub_array[] = $row['cognome'];
  $sub_array[] = $row['email'];
  $sub_array[] = $row['role'];
  $data[] = $sub_array;
}
function count_all_data($con)
{
 $query = "SELECT * FROM users";
 $statement = mysqli_query($con,$query);
 return $con->affected_rows;
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($con),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);
?>
