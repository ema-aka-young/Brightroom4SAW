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




$column = array("id", "user_id", "title", "slug", "image", "published","created_at");
$query = "SELECT id, user_id, title, slug, image, published,created_at FROM posts";

if(isset($_POST["search"]["value"]))
{
  $query .= '
  WHERE user_id LIKE "%'.$_POST["search"]["value"].'%"
  OR title LIKE "%'.$_POST["search"]["value"].'%"
  OR slug LIKE "%'.$_POST["search"]["value"].'%"
  OR image LIKE "%'.$_POST["search"]["value"].'%"
  OR published LIKE "%'.$_POST["search"]["value"].'%"
  OR created_at LIKE "%'.$_POST["search"]["value"].'%"
  ';
}

if(isset($_POST["order"])) //order cols
{
  $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
  $query .= 'ORDER BY id ASC ';
}
$query1 = '';


if($_POST['length'] != -1) //how many rows in the table
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
  $sub_array[] = $row['user_id'];
  $sub_array[] = $row['title'];
  $sub_array[] = $row['slug'];
  $sub_array[] = $row['image'];
  $sub_array[] = $row['published'];
  $sub_array[] = $row['created_at'];
  $data[] = $sub_array;
}
function count_all_data($con)
{
  $query = "SELECT * FROM posts";
  $statement = mysqli_query($con,$query);
  return $con->affected_rows;
}

$output = array(
  'draw'   => intval($_POST['draw']), /* sequence counter, it allows responses to come back out of order and DataTables will draw the correct page. */
  'recordsTotal' => count_all_data($con),
  'recordsFiltered' => $number_filter_row,
  'data'   => $data
);

echo json_encode($output); /* Returns the JSON representation of a value */
?>
