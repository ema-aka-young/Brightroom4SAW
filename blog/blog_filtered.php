<?php
include '../../blog_functions.php';
include '../../db_conn.php';
	// Get posts under a particular topic
if (isset($_GET['topic'])) {
	$topic_id = $_GET['topic'];
	$posts = getPublishedPostsByTopic($topic_id);
}
$topics = getAllPostTopics();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BrightRoom - <?php echo getTopicNameById($topic_id) ?></title>

<?php
  include 'common/header.php';
?>


	<div class="container" data-aos="fade-up">
		<!-- content -->
		<div class="content">
			<h1 class="text-center text-primary p-2">
				<a
				href="blog_list.php">
				Blog
			</a>
		</h1>
		<div class="row">
			<div class="col">
				<h1 class="content-title">
					Articles about <u><?php echo getTopicNameById($topic_id); ?></u>
				</h1>
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
	<div class="row hidden-md-up">
		<?php foreach ($posts as $post): ?>
			<div class="col-xl-4 col-md-6 col-xs-12" >
				<div class="post">
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
		<?php endforeach ?>
	</div>
</div>
<!-- // content -->
</div>
<!-- // container -->

<?php include 'common/footer.php' ?>

</body>
<!-- Footer -->
<!-- // Footer -->
</html>
