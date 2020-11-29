<!DOCTYPE html>
<head>
   <title>FilmSearch - Login</title>
</head>
<?php
   require 'common/header.php';
   ?>
<body>
  <?php
     if (isset($_SESSION["login"])):
       $error = "Hai già fatto il login";
       $_SESSION['error'] = $error;
       header ("Location: error.php");
   endif;
       ?>
   <div class="container" data-aos="fade-up">
      <div class="text-center" >
         <div id="logbox">
            <h1>LogIn:</h1>
            <form action="login.php" method="post">
               <div id="signup_list">
                  <input type="email" id="email" name="email" placeholder="E-mail">
                  <input type="password" id="pass" name="pass" placeholder="Password">
                  <input type="submit" value="Submit"/>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>
<?php
   require('common/footer.php');
   ?>
</html>
