<!DOCTYPE html>
<html>
   <head>
      <title>FilmSearch - Signup</title>
   </head>
   <?php
      require('common/header.php');
      ?>
   <body>
      <div class="container" data-aos="fade-up">
         <div class="text-center" >
            <div id="logbox">
               <form action="registration.php" method="post" class="reg_form">
                  <h1>Sign-up!</h1>
               <form action="registration.php" method="post" class="reg_form">
                  <div id="signup_list">
                     <input type="text" id="firstname" name="firstname" placeholder="Firstname">
                     <input type="text" id="lastname" name="lastname" placeholder="Lastname">
                     <input type="email" id="email" name="email" placeholder="E-mail">
                     <input type="password" id="pass" name="pass" placeholder="Password">
                     <input type="password" id="confirm" name="confirm" placeholder="Confirm password">
                     <input type="submit" value="Submit"/>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <?php
         require('common/footer.php');
         ?>
   </body>
   <script type="text/javascript" src="js/bootstrap.js"></script>
   <script type="text/javascript" src="js/main.js"></script>
   <script type="text/javascript" src="js/aos.js"></script>
   </body>
   <script>
      AOS.init();
   </script>
</html>
