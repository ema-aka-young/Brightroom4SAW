<!DOCTYPE html>
<html>
<head>
  <?php
  require 'common/header.php';
  include('common/db_conn.php');
  ?>
</head>
<body>
  <!-- config.php should be here as the first include  -->

  <?php require_once('public_function.php') ?>

  <!-- Retrieve all posts from database  -->
  <?php $posts = getPublishedPosts(); ?>
  <hr>
  <!-- more content still to come here ... -->

  <!-- Add this ... -->
  <?php foreach ($posts as $post): ?>
  	<div class="post" style="margin-left: 0px;">
  		<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
          <!-- Added this if statement... -->
  		<?php if (isset($post['topic']['name'])): ?>
  			<a
  				href="<?php echo 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
  				class="btn category">
  				<?php echo $post['topic']['name'] ?>
  			</a>
  		<?php endif ?>

  		<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
  			<div class="post_info">
  				<h3><?php echo $post['title'] ?></h3>
  				<div class="info">
  					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
  					<span class="read_more">Read more...</span>
  				</div>
  			</div>
  		</a>
  	</div>
  <?php endforeach ?>

<!-- TODO : solo se si è moderatori / administratori -->
<input type="button" onclick="window.location='blog.php'" class="btn btn-dark" value="Scrivi un post..."/>

</body>
<?php require 'common/footer.php' ?>
</html>
