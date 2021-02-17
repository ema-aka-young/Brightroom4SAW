<!DOCTYPE html>
<html lang="en">
   <head>
      <?php
         include 'common/header.php';
         ?>
      <title>BrightRoom - Login</title>
   
      <?php
         if (isset($_SESSION["login"])):
            $error = "You are already logged-in";
            $_SESSION['error'] = $error;
            die(header ("Location: /~S4668271/common/error.php"));
         endif;
         ?>
      <section id="hero" class="d-flex flex-column justify-content-center align-items-center ">
         <div class="container" data-aos="fade-up">
            <div class="row">
               <div class="col-sm-6 my-auto d-none d-sm-block">
                  <div class="clearfix">
                     <img class="img-fluid float-center" src="/~S4668271/images/film_strip.jpg" alt="...">
                  </div>
               </div>
               <div class="col-sm-6 my-auto">
                  <div class="d-flex align-items-center justify-content-center" >
                     <div id="logbox">
                        <h1>Login:</h1>
                        <form action="/~S4668271/private/login.php" method="post">
                           <div id="signup_list">
                              <input type="email" id="email" name="email" placeholder="E-mail">
                              <br> <input type="password" id="pass" name="pass" placeholder="Password">
                              <hr>
                              <a href="/~S4668271/pages/registration_form.php"> Not subscribed yet? </a>
                              <hr>
                              <input type="submit" value="Submit"  disabled="disabled"/>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php require('common/footer.php');?>
   </body>
   <script src="../js/submit.js" type="text/javascript"></script>
</html>