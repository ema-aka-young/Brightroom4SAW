<!DOCTYPE html>
<html>
   <head>
      <title>FilmSearch - Signup</title>
   </head>
   <?php
      require('common/header.php');

    ?>
   <body>
     <?php
        if (isset($_SESSION["login"])):
          $error = "Sei già registrato";
          $_SESSION['error'] = $error;
          header ("Location: error.php");
      endif;
          ?>
      <div class="container" data-aos="fade-up">
         <div class="text-center" >
            <div id="logbox">
               <form action="registration.php" method="post" class="reg_form">
                  <div id="signup_list">
                     <input type="text" id="firstname" name="firstname" placeholder="Firstname" pattern="^[^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{1,128}$"  required/>
                     <input type="text" id="lastname" name="lastname" placeholder="Lastname" pattern="^[^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{1,128}$"  required/>
                     <input type="email" id="email" name="email" placeholder="E-mail" minlenght="3" maxlength="256" required/>
                     <div id="email_err"></div>
                     <input type="password" id="pass" name="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,256}"
                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" >
                     <input type="password" id="confirm" name="confirm" placeholder="Confirm password">
                     <div id="msg"></div>
                     <input type="submit" id="register" value="Submit"  disabled="disabled"/>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script src="/js/psw_check.js"></script>

<script>
      function checkEmail(){
 $.ajax({
  url: "checkEmailinDb.php",
  data: {
   'email': $("#email").val()
  },
  dataType: 'json',
  success: function(data){
   if(data == 1){
    $("#email_err").html("Email già presente");
   }
   else{
    $("#email_err").hide();
   }
  }
 });
 return false;
}
</script>

<script>
    document.getElementById("email").addEventListener('focusout', checkEmail);
</script>


   </body>
      <?php
         require('common/footer.php');
      ?>
</html>
