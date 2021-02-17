<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Brightroom - Edit Profile</title>
   </head>
   <body>
      <?php
         include 'common/header.php';
         include '../../db_conn.php';

         if (!isset($_SESSION["login"])) {
           $error = "You must authenticate to access this page";
           $_SESSION['error'] = $error;
           die(header ("Location: /~S4668271/common/error.php"));
         }

         if(!isset($_POST['firstname'], $_POST['lastname'], $_POST['email']))
         {
            header("Location: /~S4668271/private/show_profile.php");
         }

         $email = mysqli_real_escape_string($con, trim($_POST['email']));
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $error = "Email pattern not correct";
           $_SESSION['error'] = $error;
           die(header ("Location: /~S4668271/common/error.php"));
         }

         $pattern= '/^[a-zàéèìòùA-Zàéèìòù\'-]{1,}(?: [a-zàéèìòùA-Zàéèìòù\'-]*){0,64}$/'; // - '
         if (!preg_match($pattern,$_POST["firstname"])) {
           $error = "Only letters and white space allowed";
           $_SESSION['error'] = $error;
           header ("Location: /~S4668271/common/error.php");
           exit();
         } else $nome =  htmlspecialchars(mysqli_real_escape_string($con, trim($_POST["firstname"])));

         if (!preg_match($pattern,$_POST["lastname"])) {
           $error = "Only letters and white space allowed";
           $_SESSION['error'] = $error;
           header ("Location: /~S4668271/common/error.php");
           exit();
         } else $cogn = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST["lastname"])));



         $query = "UPDATE users SET nome=?, cognome=?, email=? WHERE id=". $_SESSION['id'] . ";";

         $stmt = mysqli_prepare($con, $query);
    //     mysqli_stmt_bind_param($stmt, 'sss', $_POST['firstname'], $_POST['lastname'], $_POST['email']);
         mysqli_stmt_bind_param($stmt, 'sss',$nome, $cogn, $email);
         mysqli_stmt_execute($stmt);

         if(mysqli_affected_rows($con) === 0){
          $error = "Something went really bad, didn't update your profile.";
          $_SESSION['error'] = $error;
          header ("Location: /~S4668271/common/error.php");
          exit();
         } else{
         	echo "
          <section id=\"hero\" class=\"d-flex flex-column justify-content-center align-items-center\">
              <div class=\"container text-align-top text-center text-md-center\" data-aos=\"fade-up\">
                 <div class=\"clearfix\">
                 <img class=\"img-fluid float-center\" src=\"/~S4668271/images/goofy.jpg\" alt=\"Welcome\"> ";
                 echo "<br><h1>OK, ";
                 echo "$nome " . "$cogn ";
                 echo "! Your profile has been updated</h1>";
                 echo "<p>Click <u><a href='/~S4668271/private/show_profile.php'>here</a></u> to go back </p>
                 </div>
              </div>
          </section>";
         }


include 'common/footer.php' ?>
</html>
