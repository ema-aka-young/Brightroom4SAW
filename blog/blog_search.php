<?php
include '../../db_conn.php';
include '../../blog_functions.php';
// Get posts under a particular topic
if(!isset($_POST['searchPost']))
{
  die(header("Location: blog_list.php"));
}
$research = htmlspecialchars($_POST['searchPost']);
$searchposts = SearchPost($research);
$topics = getAllPostTopics();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>BrightRoom - Search "<?php echo $research ?>"</title>
  <?php
  include 'common/header.php';
  ?>

  <div class="container" data-aos="fade-up">
    <h1 class="text-center text-primary p-2">
      <a
      href="blog_list.php">
      Blog
    </a>
  </h1>
    <div class="row">
      <div class="col">

      <form action="blog_search.php" method="post">
        <input type="text" placeholder="Search post here..." id="searchPost" name ="searchPost">
        <button type="submit">
          <i class="fa fa fa-search" aria-hidden="true"></i>
        </button>
      </form>
    </div>

    <div class="col">
      <h2 class="content-title float-right">
        <a href="blog_list.php"> All </a>
        <?php foreach ($topics as $topic): ?>
          <a
          href="<?php echo 'blog_filtered.php?topic=' . $topic['id'] ?>">
          <?php echo $topic['name']; ?>
        </a>
      <?php endforeach ?>
    </h2>
  </div>
</div>
<!-- content -->
<div class="content">

  <?php if(!(empty($searchposts)) && $research != "" ) {

    echo "<h1>Search results for \""; echo $research;
    echo "\"</h1>
    <div class=\"justify-content-center\">
    <div class=\"row hidden-md-up\">  ";

    foreach ($searchposts as $post): ?>
    <div class="col-md-4">
      <div class="post" style="margin-left: 0px;">
        <a href="blog_post.php?post-slug=<?php echo $post['slug']; ?>">
          <img src="<?php echo BASE_URL . 'images/' . $post['image']; ?>" class="post_image" alt="">
          <div class="post_info">
            <h3><?php echo $post['title'] ?></h3>
            <div class="info">
              <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
              <span class="read_more">Read more...</span>
            </div>
          </div>
        </a>
      </div>
    </div>
  <?php endforeach;

echo "</div>";

}
else {echo "
  <h1>Search results for '$research' </h1>
  <div class=\"row hidden-md-up\">
  </div>
  <div class=\"row\">
  <div class=\"col-sm-8\">
  <h2>Nothing Found<h2>
  <h3>It seems we can't find what you're looking for…</h3>


  </div>
  <div class=\"col-sm-4\">
  <img class=\"img-fluid float-right\" src=\"/~S4668271/images/nothing_found.jpeg\" alt=\"nothing_found\">
  </div>
  </div>
  <input type=\"button\" value=\"Go back!\" onclick=\"window.location='blog_list.php';\">
  </div>


  ";} ?>
</div>
</div>


<!-- // content -->
<!-- // container -->
<?php include 'common/footer.php' ?>
</body>

</html>
