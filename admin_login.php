<!DOCTYPE html>
<head>
   <title>FilmSearch - Admin Login</title>
</head>
<?php
   require 'common/header.php';
   ?>
<body>
  <?php
     if ($_SESSION["admin"]!=1):
      $error = "Non hai i privilegi per accedere a questa pagina";
      $_SESSION['error'] = $error;
      header ("Location: error.php");
   endif;
       ?>
   <div class="container" data-aos="fade-up">
      <div class="text-center" >
         <div id="logbox">
            <form action="admin.php" method="post">
               <div id="signup_list">
                  <h4>Please insert your password to enter the admin page:</h4>
                  <input type="password" id="pass" name="pass" placeholder="Password">
                  <input type="submit" value="Submit"  disabled="disabled"/>
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