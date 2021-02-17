<!DOCTYPE html>
<html lang="en">
 <head>
      <title>Brightroom - Change Password</title>
</head>
<body>
<?php
include 'common/header.php';
include '../../db_conn.php';

if (!isset($_SESSION["login"])){
  $error = "You are not logged in yet";
  $_SESSION['error'] = $error;
  die(header ("Location: /~S4668271/common/error.php"));
}

if(empty($_POST["pass"])) {
  $error = "New password field is empty";
  $_SESSION['error'] = $error;
  die(header ("Location: /~S4668271/common/error.php"));
}

if(strlen($_POST["pass"]) < 6) {
  $error = "New password is too short";
  $_SESSION['error'] = $error;
  die(header ("Location: /~S4668271/common/error.php"));
}


if($_POST["pass"]!=$_POST["confirm"]) {
  $error = "Confirm password doesn't match";
  $_SESSION['error'] = $error;
  die(header ("Location: /~S4668271/common/error.php"));
}


$id = $_SESSION["id"];

$query = "SELECT password from users where id = '$id'";
$res = mysqli_query($con,$query);
$pssw_db = mysqli_fetch_assoc($res);

$current = mysqli_real_escape_string($con, trim($_POST["oldpass"])); //get 'current' password from form
$newpass = password_hash(mysqli_real_escape_string($con,trim($_POST["pass"])), PASSWORD_DEFAULT);
$confirmnewpass = mysqli_real_escape_string($con, trim($_POST["confirm"]));


if (password_verify($current,$pssw_db["password"])  && !(password_verify($confirmnewpass,$pssw_db["password"]))){
  $query = "UPDATE users SET password='$newpass' WHERE id=". $_SESSION['id'];
  if (mysqli_query($con, $query))
  {
    echo "  <section id=\"hero\" class=\"d-flex flex-column justify-content-center align-items-center\">
              <div class=\"container text-align-top text-center text-md-center\" data-aos=\"fade-up\">
                 <div class=\"clearfix\">
                 <img class=\"img-fluid float-center\" src=\"/~S4668271/images/goofy.jpg\" alt=\"Welcome\"> ";
                 echo "<br><h1>Your profile has been updated</h1>";
                 echo "<p>Click <u><a href='/~S4668271/private/show_profile.php'>here</a></u> to go back </p>
                 </div>
              </div>
          </section>";
  }
  else
  {
    mysqli_error($con);
    $error = "We had some problems changing your password \n<u><a href='/~S4668271/private/show_profile.php'>Try again!</a></u>)";
    $_SESSION['error'] = $error;
    die(header ("Location: /~S4668271/common/error.php"));

  }
} 

elseif (!password_verify($current,$pssw_db["password"])) {
  $error = "Current password is not the correct password. Try again.";
  $_SESSION['error'] = $error;
  die(header ("Location: /~S4668271/common/error.php"));
}

elseif(password_verify($confirmnewpass,$pssw_db["password"])) {
  $error = "New password is the same as the old one";
  $_SESSION['error'] = $error;
  die(header ("Location: /~S4668271/common/error.php"));

}



include 'common/footer.php';
?>
</body>
</html>
