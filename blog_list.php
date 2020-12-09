<!DOCTYPE html>
<html>
  <head>
    <?php
     require 'common/header.php';
     require 'common/db_conn.php';
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
		<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
			<div class="post_info">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>
   </body>
    <?php require 'common/footer.php' ?>
 </html>
