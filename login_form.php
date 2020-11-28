<!DOCTYPE html>
<head>
   <title>FilmSearch - Login</title>
</head>
<?php
   require 'common/header.php';
   ?>
<body>
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
