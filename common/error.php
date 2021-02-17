<!DOCTYPE html>
<html>
<head>
  <title>Brightroom - Error Page</title>
</head>
<?php
include ('header.php');

?>

<body>
  <?php
  $error=$_SESSION['error'];
  ?>
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <div class="row">
        <div class="col-sm-8">
          <h1>Error!</h1>
          <h2><?php echo "$error"?></h2>
            <input type="button" value="Go back!" onclick="history.back()">
        </div>
        <div class="col-sm-4">
          <img class="img-fluid float-right" src="/~S4668271/images/error_monkey.gif" alt="error monkey">
        </div>
      </div>
    </div>
  </section>

</body>
<?php include 'footer.php' ?>
</html>
