<!DOCTYPE html>
<html lang="en">
<head>
  <title>BrightRoom - Publish</title>
</head>
<body>

  <?php

  include 'common/header.php';
  include '../../db_conn.php';
  include '../../blog_functions.php';

  if (!isset($_SESSION["admin"]) && !isset($_SESSION["author"])) {
    die(header ("Location: ../403.php"));
  }
  if(!isset($_POST['title'], $_POST['body']))
  {
    die(header ("Location: blog_create_post.php"));
  }

  $title = $_POST["title"];
  $body = $_POST["body"];
  $topic = $_POST["topic"];
  $topic_id=getTopicIdByName($topic);

//sanitize input
  $clean_title = htmlspecialchars(mysqli_real_escape_string($con,trim($title)));
  $clean_body =  htmlentities($body); //Convert all applicable characters to HTML entities < --> &lt

  if ($title == NULL || $body == NULL  ) { //post must have title and body
    $error = "<br> <h2> Something went wrong creating your post :( </h2>
    <p>Maybe title or body are not valid?</p>";
    $_SESSION['error'] = $error;
    header ("Location: /~S4668271/common/error.php");
    exit();
  }
  $user_id=$_SESSION["id"];
  $date = date('Y-m-d h:i:s', time());
  $published=0;
  $slug=str_replace(" ","-",strtolower($clean_title)); //create slug
  $nuller=NULL; //used in bind for id

  /***************************************************************
  UPLOAD image
  *****************************************************************/
  $target_dir = "../images/uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  //image is uploaded

  // Check if image file is a actual image or fake image
  if(!empty($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {

    } else {
      $error= "File is not an image.";
      $_SESSION['error'] = $error;
      header ("Location: /~S4668271/common/error.php");
      exit();
    }

  }


  // Check if file already exists
  if (file_exists($target_file) && $target_file!==$target_dir) {
    $error=  "Sorry, file already exists. $target_file";
    $_SESSION['error'] = $error;
    header ("Location: /~S4668271/common/error.php");
    exit();
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) { //max 500kb
    $error= "Sorry, your file is too large.";
    $_SESSION['error'] = $error;
    header ("Location: /~S4668271/common/error.php");
    exit();
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $error= "You should upload an image (JPG, JPEG, PNG & GIF files). ";
    $_SESSION['error'] = $error;
    header ("Location: /~S4668271/common/error.php");
    exit();
  }

  if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $error = "Sorry, there was an error sending your post";
    $_SESSION['error'] = $error;
    header ("Location: /~S4668271/common/error.php");
    exit();
  }

  $target_file=str_replace("../images/","","$target_file"); //path

  /***************************************************************
  ADD post
  *****************************************************************/


  $query = $con->prepare("INSERT INTO posts (id, user_id, title, slug, image, body, published, created_at)
  VALUES (?,  ?, ?, ?, ?, ?, ?, ?);");

  if (!$query) {
    die('prepare() failed: ' . htmlspecialchars($query->error));
  }
  $rc=$query->bind_param('iissssis', $nuller, $user_id, $clean_title, $slug, $target_file, $clean_body, $published, $date);
  if(!$rc) {
    die('bind_param() failed: ' . htmlspecialchars($query->error));
  }
  $rc=$query->execute();
  if(!$rc) {
    die('execute() failed: ' . htmlspecialchars($query->error));
  }

  //once posted we get post_id and insert the post in the correct topic in post_topic
  $post_id=$con->query("SELECT id FROM posts WHERE id = (SELECT MAX(id) FROM posts)")->fetch_object()->id;
  $query = $con->prepare("INSERT INTO post_topic (id,post_id,topic_id) VALUES (?, ?, ?);");


  if (!$query) {
    die('prepare() failed: ' . htmlspecialchars($query->error));
  }
  $rc=$query->bind_param('iii', $nuller, $post_id , $topic_id);
  if(!$rc) {
    die('bind_param() failed: ' . htmlspecialchars($query->error));
  }
  $rc=$query->execute();
  if(!$rc) {
    die('execute() failed: ' . htmlspecialchars($query->error));
  }

  echo "
  <section id=\"hero\" class=\"d-flex flex-column justify-content-center align-items-center\">
  <div class=\"container text-align-top text-center text-md-center\" data-aos=\"fade-up\">
  <div class=\"clearfix\">
  <img class=\"img-fluid float-center\" src=\"../images/reading_monkey.png\" alt=\"reading-post\"> ";
  echo "<h1>Thanks for the contribution </h1>";
  echo "<h2>We are reading your post and it will be published soon!</h2>";
  echo "<p>Click <u><a href='/~S4668271/blog/blog_list.php'>here</a></u> to visit our Blog.</p>
  </div>
  </div>
  </section>";

  include 'common/footer.php'
  ?>

</body>
</html>
