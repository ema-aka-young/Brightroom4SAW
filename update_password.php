<!DOCTYPE html>
<html>
<head>
  <title>FilmSearch - Edit Password</title>
</head>
<body>
  <?php
  require 'common/header.php';
  require 'common/db_conn.php';

  if (!isset($_SESSION["login"])):
    $error = "Non hai ancora fatto il login";
    $_SESSION['error'] = $error;
    header ("Location: error.php");
  endif;

  if(!isset($_POST['email']))
  {
    header("Location: show_profile.php");
  }


  $email = mysqli_real_escape_string($con, trim($_POST["email"]));
  $pssw = mysqli_real_escape_string($con, trim($_POST["pass"]));
  $query = "SELECT id,password from users where email = '$email';";
  $res = mysqli_query($con,$query);
  $pssw_db = mysqli_fetch_assoc($res);

  echo "<h4> GET values:</h4>";
  echo "<p> " . $_POST['pass'] . "</p>";
  echo "<p> " . $_POST['email'] . "</p>";
  if (password_verify($pssw,$pssw_db["password"]))
  {
    echo "
    <div class=\"container\" >
      <div class = \"row justify-content-start text-center\">
        <div id=\"logbox\" >
          <h1>Change Password</h1>
              <form action=\"change_password.php\" method=\"POST\">
                <input type=\"password\" id=\"newpass\" name=\"newpass\" placeholder=\"New password\" pattern=\"(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,256}\"
                  title=\"Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters\">
                <input type=\"password\" id=\"confirmnewpass\" name=\"confirmnewpass\" placeholder=\"Confirm new password\">
                <input type=\"submit\" value=\"Submit\"  />
              </form>
            </div>
        </div>
    </div>
    ";
    echo "
    <script>
          $(document).ready(function(){
            $(\"#confirm\").keyup(function(){
                 if ($(\"#pass\").val() != $(\"#confirm\").val()) {
                     $(\"#msg\").html(\"Password do not match\").css(\"color\",\"red\");
                 }else{
                     $(\"#msg\").html(\"Password matched\").css(\"color\",\"green\");
                }
          });
    });
    </script>
    ";
  } else {


    $error = "<br> <h2> Email o password errati,  :( <u><a href='show_profile.php'>riprovare!</a></u></h2> ";
    $_SESSION['error'] = $error;
    header ("Location: error.php");
    exit();

  }




  require 'common/footer.php' ?>
  </html>
