<!DOCTYPE html>
<html lang="en">
<head>

<?php
include '../../db_conn.php';
include '../../film_functions.php';

if (isset($_GET['film-slug'])) {
	$film = getFilm($_GET['film-slug']);
}

echo "<title>BrightRoom - "; echo $film['title']; echo "</title>";

include 'common/header.php';

if ($film['published'] == false) {
	die (header ("Location :  ../404.php"));
}


$topics = getAllTopics();
$topic = getFilmTopic($film['id']);
?>

	<div class="container" data-aos="fade-up">
		<div class="row">
			<div class="col-md-6">

			</div>
			<div class="col-md-6">
				<h2 class="content-title float-right">
					<a href="film_list.php"> All </a>
					<?php foreach ($topics as $topic): ?>
						<a
						href="<?php echo 'film_filtered.php?topic=' . $topic['id'] ?>">
						<?php echo $topic['name']; ?>
					</a>
				<?php endforeach ?>
			</h2>
		</div>
	</div>
	<div class="container" data-aos="fade-up">

		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
				<h1 class="text-center text-primary p-2 content-title">
					<?php echo $film['title']; ?>
				</h1>
				<br>

				<div class="row d-flex justify-content-center">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
						</ol>
						<div class="carousel-inner" style="max-width:800px; max-height:600px !important;">
							<div class="carousel-item active">
								<img class="d-block w-100 " src="<?php echo BASE_URL .'/images/film/'.$film['slug'].'/'.$film['slug'].'_1.jpg'?>" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 " src="<?php echo BASE_URL .'/images/film/'.$film['slug'].'/'.$film['slug'].'_2.jpg'?>" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 " src="<?php echo BASE_URL .'/images/film/'.$film['slug'].'/'.$film['slug'].'_3.jpg'?>" alt="Third slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 " src="<?php echo BASE_URL .'/images/film/'.$film['slug'].'/'.$film['slug'].'_4.jpg'?>" alt="Fourth slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 " src="<?php echo BASE_URL .'/images/film/'.$film['slug'].'/'.$film['slug'].'_5.jpg'?>" alt="Fifth slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div> <!-- end carousel -->

				</div>
			<div class="row d-flex justify-content-center">

				<div class="post-body-div text-wrap">
					<?php echo html_entity_decode($film['body']); ?>
			</div>
		</div>


			<div class="row d-flex justify-content-center">
				<img class="img-fluid float-left" src="<?php echo  BASE_URL .'/images/' .$film['image']?>" alt="film image" width="250" height="250">

			</div>
		<div class="row d-flex justify-content-center">
			<a href="https://www.amazon.com/s?k=<?php echo $film['slug']?>&ref=nb_sb_noss_2" target="_blank" rel="noopener noreferrer" style="border:none;text-decoration:none"><img src="https://www.niftybuttons.com/amazon/amazon-button3.png" alt="buy on amazon button"></a>

		</div>


			<!-- // row -->
		</div>
		</div>
		<!-- // Page wrapper -->

	</div>
</div>
<!-- // content -->
<?php include( 'common/footer.php'); ?>
</body>

</html>
