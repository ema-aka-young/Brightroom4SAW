<?php

  require 'common/header.php';
  require '../../db_conn.php'; //per connessione database

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    die(header("Location: /~S4668271/pages/login_form.php"));
  }

  if(!isset($_POST['email'], $_POST['pass']))
  {
    die(header("Location: /~S4668271/pages/login_form.php"));
  }
  $email = mysqli_real_escape_string($con, trim($_POST["email"]));
  $pssw = mysqli_real_escape_string($con, trim($_POST["pass"]));


    $query = "SELECT id,password,role from users where email = '$email';";
    $res = mysqli_query($con,$query);
    $pssw_db = mysqli_fetch_assoc($res);



  if (password_verify($pssw,$pssw_db["password"]))  {
      $_SESSION["login"] = 1;
      $_SESSION["id"] = $pssw_db["id"];
      /* check if admin then set 1    */
      if ($pssw_db["role"]=='Admin'){
         $_SESSION["admin"] = 1;
    }

    if ($pssw_db["role"]=='Author'){
         $_SESSION["author"] = 1;
    }

       die(header("Location: /~S4668271/index.php"));

  } else {

      $error = "<br> <h2> Invalid email or password. Try again! </h2> ";
      $_SESSION['error'] = $error;
      die(header ("Location: /~S4668271/common/error.php"));


  }

?>
