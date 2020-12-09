<!DOCTYPE html>
<html>
   <head>
      <title>FilmSearch - Error Page</title>
   </head>
   <?php
      require('common/header.php');

    ?>

<body>
  <?php
  $error=$_SESSION['error'];
  ?>
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
     <div class="container text-center text-md-left" data-aos="fade-up">
        <h1>Error!</h1>
        <h2><?php echo "$error"?></h2>
        <img class="img-fluid float-right" src="images/error_monkey.gif" alt="...">
     </div>
  </section>

</body>

<?php require 'common/footer.php' ?>
</html>
