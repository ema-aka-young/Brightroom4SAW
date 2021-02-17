<!DOCTYPE html>
<html>
<head>
  <title>BrightRoom - Blog</title>
  <?php
  include 'common/header.php';
  include '../../db_conn.php';
  include '../../blog_functions.php';
  $topics=getAllPostTopics();
  ?>
</head>

<?php
if (!isset($_SESSION["admin"]) && !isset($_SESSION["author"])) {
  die(header ("Location: ../403.php"));
}
?>


<body>
  <div class="container">
    <div class="d-flex justify-content-left" >
      <div class="row">
        <form action="blog_publish.php" method="post" id="post" enctype="multipart/form-data">
          <input style="margin-left:20%; width: 480px;" type="text" id="title" name="title" placeholder="Insert a title here..." >
          <input type="file" name="fileToUpload" id="fileToUpload">
          <select name="topic" id="topic">
           <?php foreach ($topics as $topic): ?>
            <option value="<?php echo $topic['name']?>"><?php echo $topic['name']?> </option>'
          <?php endforeach ?>
        </select>
      </form>
    </div>



  </div>
  <div class="row justify-content-center">
    <textarea name="body" form="post" style="width: 100%;" class = "tinymce "></textarea>

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

</body>
<!-- js -->
<script type="text/javascript" src="/~S4668271/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="/~S4668271/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/~S4668271/plugins/tinymce/init-tinymce.js"></script>
</html>
