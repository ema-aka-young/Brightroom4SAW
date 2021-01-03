<!DOCTYPE html>
<html lang="it">
<head>
    <title>FilmSearch - Admin</title>
</head>
<body>

<?php
  require 'common/header.php';
  require 'common/db_conn.php'; //per connessione database
  if(!isset($_POST['pass']))
  {
    header("Location: admin_login.php");
    exit();
  }

  	$query = "select * from users where id = " . $_SESSION["id"].";";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($res);

  	$email = $row['email'];
  	$pssw = mysqli_real_escape_string($con, trim($_POST["pass"]));

    $query = "SELECT id,password,role from users where email = '$email';";
    $res = mysqli_query($con,$query);
    $pssw_db = mysqli_fetch_assoc($res);


  if (password_verify($pssw,$pssw_db["password"]))
  {
      $_SESSION["login"] = 1;
      $_SESSION["id"] = $pssw_db["id"];
      /* check if admin then set 1
      */
      if ($pssw_db["role"]=='Admin'){
         $_SESSION["admin"] = 1;
    }	

       header("Location: admin_dashboard.php");
      exit();

  } else {

      session_destroy();
	  setcookie(session_name(), '', time()-42000);
      header ("Location: login_form.php");
      exit();

  }

?>
</body>

</html>