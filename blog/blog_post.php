<?php
include '../../db_conn.php';
include '../../blog_functions.php';

 if (isset($_GET['post-slug'])) {
	 $post = getPost($_GET['post-slug']);
 } else {
	 die(header("Location: ../404.php"));
 }

 $topics = getAllPostTopics();
 $topic_id = getPostTopic($post['id']);
 $user_id = $post['user_id'];
 $result = mysqli_query($con, "SELECT nome, cognome FROM users WHERE id = '$user_id' ");
 $author = mysqli_fetch_row($result);

 if ($post['published'] == false) {
	 die(header("Location: ../404.php"));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>BrightRoom - <?php echo$post['title'] ?></title>
<?php
include 'common/header.php';
?>
<section id="topSection"></section>

<div class="container" data-aos="fade-up">
	<div class="row">
	    <div class="col">
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
	<!-- Page Content -->
  <div class="content text-center">
		<h1 class="text-center text-primary p-2">
						<?php echo $post['title']; ?>
				</h1>

      <!-- Post Content Column -->

        <!-- Author -->
        <p class="lead">by <?php	echo $author[0]; echo " "; echo $author[1];	?></p>

        <hr>

        <!-- Date/Time -->
        <p style="color: #b3b3b3"> <?php echo getTopicNameById($topic_id['id'])?> -
        <i class="far fa-calendar-check"></i> <?php echo $post['created_at']?>
        <?php if (isset($_SESSION["admin"])):
        	echo "
        	<form action=\"/~S4668271/private/blog_edit_post.php\" method=\"post\" id=\"post\" enctype=\"multipart/form-data\">
        	<input type = \"hidden\" name = \"post_id\" value = \"".$post['id']."\" />
        	<button type=\"submit\" name=\"submit\" form=\"post\" id=\"post\"><p style=\"color: #b3b3b3\"> <i class=\"far fa-edit\"></i> Edit </p></button>
        	</form>
        	";
        endif;
        ?>
      	</p>


        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="/~S4668271/images/<?php echo $post['image']?>" alt="post image" width="400" height="400">

        <br>

        <!-- Post Content -->
        <div class="post-body-div">
          <?php echo html_entity_decode($post['body']); ?>
       </div>

        <hr>


      </div>


  </div>
  <button onclick="topFunction()" id="TopButton" title="Go to top">  <i class="fa fa-arrow-up" ></i></button>
<?php include( 'common/footer.php'); ?>
<script src="../js/top_button.js"></script>
</body>

</html>
