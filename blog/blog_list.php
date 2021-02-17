<?php
include '../../db_conn.php';
include '../../blog_functions.php';
// Get posts under a particular topic
$topics = getAllPostTopics();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BrightRoom - Posts</title>
  <?php
  include 'common/header.php';
  ?>

  <div class="container" data-aos="fade-up">
    <div class="content">
      <section id="topSection">
      <h1 class="text-center text-primary p-2">
        Blog
      </h1>
    </section>
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
    <div id="post_single">
    </div>
  </div>
</div>

<?php
if (isset($_SESSION["admin"]) || isset($_SESSION["author"])){
  echo "<div class=\"position-fixed text-left floating-action-menu\" style=\"bottom: 20px; left: 20px;\">
<button onclick=\"window.location='/~S4668271/private/blog_create_post.php'\" title=\"Add new post\" class=\"btn btn-dark btn-circle btn-xl\" type=\"button\"><i class=\"far fa-edit fa-2x\" aria-hidden=\"true\"></i></button>
</div>";
}
?>

<script src="../js/top_button.js"></script>
<script src="../js/blog_list.js"></script>
<?php include 'common/footer.php' ?>
</body>
</html>
