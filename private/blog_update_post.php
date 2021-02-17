<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'common/header.php';
    include '../../db_conn.php';
    include '../../blog_functions.php';
    ?>
    <title>BrightRoom - Update Post</title>
</head>
<body>

    <?php

  //TODO rivedi accesso diretto
    if(!isset($_POST['body']))
    {
        $error = "You must authenticate to access this page";
        $_SESSION['error'] = $error;
        header ("Location: /~S4668271/common/error.php");
        exit();
    }


    $body = $_POST["body"];
    $post_id=$_POST["post_id"];
    $clean_body =  htmlentities($body);

    if ($body == NULL  ) {
        $error = "<br> <h2> Something went wrong creating your post :( </h2>
        <p>Maybe title or body are empty?</p>";
        $_SESSION['error'] = $error;
        header ("Location: /~S4668271/common/error.php");
        exit();
    }

/***************************************************************
     UPDATE post
     *****************************************************************/


     $query = "UPDATE posts SET body = '$clean_body' WHERE id='$post_id'";
     if ($con->query($query) === TRUE) {
      echo "
      <section id=\"hero\" class=\"d-flex flex-column justify-content-center align-items-center\">
      <div class=\"container text-align-top text-center text-md-center\" data-aos=\"fade-up\">
      <div class=\"clearfix\">
      <img class=\"img-fluid float-center\" src=\"/~S4668271/images/reading_monkey.png\" alt=\"reading-post\"> ";
      echo "<h1>Post updated! </h1>";
      echo "<p>Click <u><a href='/~S4668271/blog/blog_list.php'>here</a></u> to visit our Blog.</p>
      </div>
      </div>
      </section>";
  } else {
      echo "
      <section id=\"hero\" class=\"d-flex flex-column justify-content-center align-items-center\">
      <div class=\"container text-align-top text-center text-md-center\" data-aos=\"fade-up\">
      <div class=\"clearfix\">
      <img class=\"img-fluid float-center\" src=\"/~S4668271/images/reading_monkey.png\" alt=\"reading-post\"> ";
      echo "<h1>Error updating your post!". $con->error." </h1>";
      echo "
      </div>
      </div>
      </section>";
  }


  mysqli_close($con);
  include 'common/footer.php'


  ?>

</body>
</html>
