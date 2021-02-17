<!DOCTYPE html>
<html>
<head>
  <title>BrightRoom - Edit Post</title>
  <?php
  include 'common/header.php';
  include '../../db_conn.php';
  include '../../blog_functions.php';
  ?>

</head>

<?php
$topics=getAllPostTopics();
  $id=$_POST['post_id'];
  $sql = "SELECT * FROM posts WHERE id='$id'";
  $result = mysqli_query($con, $sql);
  $post = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $post_body = $post[0];
?>

<body>
  <div class="container">
    <div class="d-flex justify-content-left" >
      <div class="row">
        <form action="blog_update_post.php" method="post" id="post" enctype="multipart/form-data">
          <?php echo"
          <input type = \"hidden\" name = \"post_id\" value = \"".$id."\" />
          "?>
        </form>
      </div>



    </div>
    <div class="row justify-content-center">
      <textarea name="body" form="post" style="width: 100%;" class = "tinymce "><?php echo $post_body['body'] ?></textarea>

    </div>




    <br>
    <br>
    <div class="d-flex justify-content-center">
      <div class="row">
        <div class="col-sm-6 text-center">
          <button type="submit" name="submit" form="post" id="post" class="btn btn-primary btn-lg ">Publish</button>

        </div>
        <div class="col-sm-6 text-center">
          <button type="button" class="btn btn-secondary btn-lg " onclick="history.back()">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <!--TODO sistemare spazio in fondo-->
</body>
<!-- js -->
<script type="text/javascript" src="/~S4668271/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="/~S4668271/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/~S4668271/plugins/tinymce/init-tinymce.js"></script>

</html>
