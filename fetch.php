<?php

//fetch.php

//require('common/header.php'); //for session
//require('common/db_conn.php'); //for database connection

$con = new PDO("mysql:host=localhost; dbname=S4668271","S4668271","fragola86");

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

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $con->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();
#$number_filter_row = $statement->num_rows();

$statement = $con->prepare($query . $query1);
//direi che questa prepare scassa e ritorna false, forse da controllare le query sopra
//needs a bind?!? boh
#$statement = bind_param()()

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
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
 $statement = $con->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($con),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);
?>
