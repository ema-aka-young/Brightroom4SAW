<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'common/header.php';
  ?>
  <title>BrightRoom - Signup</title>


    <?php
    if (isset($_SESSION["login"])):
      $error = "You are already signed-up";
      $_SESSION['error'] = $error;
      header ("Location: /~S4668271/common/error.php");
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
            <div id="signupbox">
              <h1 class="text-center">SignUp:</h1>
              <hr>
              <form action="/~S4668271/private/registration.php" method="post" class="reg_form">
                <div id="signup_list">
                  <label for="firstname"><b>Firstname:</b></label>
                  <input type="text" id="firstname" name="firstname" placeholder="" pattern="^[a-zàéèìòùA-Zàéèìòù'-]{1,}(?: [a-zàéèìòùA-Zàéèìòù'-]*){0,64}$"  required/>
                  <br><label for="lastname"><b>Lastname:</b></label>
                  <input type="text" id="lastname" name="lastname" placeholder="" pattern="^[a-zàéèìòùA-Zàéèìòù'-]{1,}(?: [a-zàéèìòùA-Zàéèìòù'-]*){0,64}$"  required/>
                  <br><label for="email"><b>Email:</b></label>
                  <span id="message" style="color:#ff1a1a"></span>
                  <input type="email" id="email" name="email" placeholder="" maxlength="256" required/>
                  <div id="email_err"></div>
                  <br><label for="pass"><b>Password:</b></label>
                  <input type="password" id="pass" name="pass" placeholder="" minlength="6" title="Must contain at least 6 characters" required>
                  <br><label for="pass"><b>Confirm:</b></label>
                  <input type="password" id="confirm" name="confirm" minlength="6" placeholder="" required>
                  <div id="msg"></div>
                  <hr>
                  <div class="text-center">
                    <input type="submit" id="register" value="Submit"  disabled="disabled"/>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?php
require('common/footer.php');
?>
</body>
<script src="../js/check_email_db.js" type="text/javascript"></script>
<script src="../js/match_password.js" type="text/javascript"></script>
<script src="../js/submit.js" type="text/javascript"></script>

</html>
