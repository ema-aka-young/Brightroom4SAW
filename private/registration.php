<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'common/header.php';
  include '../../db_conn.php'; //database connection
  ?>
  <title>BrightRoom - Welcome</title>
</head>

<body>
  <?php
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    die(header("Location: /~S4668271/pages/registration_form.php"));
  }

  if(!isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['pass']))
  {
    die(header("Location: /~S4668271/pages/registration_form.php"));
  }



  $email = mysqli_real_escape_string($con, trim($_POST['email']));
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Email pattern not correct";
    $_SESSION['error'] = $error;
    die(header ("Location: /~S4668271/common/error.php"));
  }
  $query = "SELECT email FROM users WHERE email = '$email' "; //email already in db
  $res = mysqli_query($con,$query);
  if (mysqli_num_rows($res) >0) {
    die(header("Location: /~S4668271/pages/login_form.php"));
  }
  else {
    $pattern= '/^[a-zàéèìòùA-Zàéèìòù\'-]{1,}(?: [a-zàéèìòùA-Zàéèìòù\'-]*){0,64}$/';
    if (!preg_match($pattern,$_POST["firstname"])) { //check regex
      $error = "Input not valid. Only letters and white space allowed";
      $_SESSION['error'] = $error;
      die(header ("Location: /~S4668271/common/error.php"));
    } else $nome =  htmlspecialchars(mysqli_real_escape_string($con, trim($_POST["firstname"])));//firstname sanification

    if (!preg_match($pattern,$_POST["lastname"])) { //check regex
      $error = "Input not valid. Only letters and white space allowed";
      $_SESSION['error'] = $error;
      die(header ("Location: /~S4668271/common/error.php"));
    } else $cogn = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST["lastname"])));//lastname sanification

    if(strlen($_POST["pass"]) < 6 ) { //password must be at least 6 chars
      $error = "You must insert a correct password. " . $_POST["pass"];
      $_SESSION['error'] = $error;
      die(header ("Location: /~S4668271/common/error.php"));
    }
    $pass = password_hash(mysqli_real_escape_string($con,trim($_POST["pass"])), PASSWORD_DEFAULT);
    $query = "INSERT INTO users (nome, cognome, email, password) VALUES ('$nome', '$cogn', '$email', '$pass')";
  }
  $res = mysqli_query($con,$query);
  if (mysqli_affected_rows($con)==1){

    $nome=str_replace("\\","","$nome");
    $cogn=str_replace("\\","","$cogn");
    echo "
    <section id=\"hero\" class=\"d-flex flex-column justify-content-center align-items-center\">
    <div class=\"container text-align-top text-center text-md-center\" data-aos=\"fade-up\">
    <div class=\"clearfix\">
    <img class=\"img-fluid float-center\" src=\"/~S4668271/images/welcome.png\" alt=\"Welcome\"> ";
    echo "<h1>Welcome on board, ";
    echo "$nome " . "$cogn ";
    echo "!</h1>";
    echo "<p>Click <u><a href='/~S4668271/pages/login_form.php'>here</a></u> to start using FilmSearch.</p>
    </div>
    </div>
    </section>";
  }
  mysqli_close($con);
  ?>
</body>
<?php require 'common/footer.php' ?>

</html>
