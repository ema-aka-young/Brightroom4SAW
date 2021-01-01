<?php

//action.php

$con = new PDO("mysql:host=localhost; dbname=S4668271","S4668271","fragola86");

if($_POST['action'] == 'edit')
{
 $data = array(
  ':id'    => $_POST['id'],
  ':nome'  => $_POST['nome'],
  ':cognome'  => $_POST['cognome'],
  ':email'   => $_POST['email'],
  ':role' => $_POST['role']
 );

 $query = "
 UPDATE users
 SET nome = :nome,
 cognome = :cognome,
 email = :email,
 role = :role
 WHERE id = :id
 ";
 $statement = $con->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM users
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $con->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>
