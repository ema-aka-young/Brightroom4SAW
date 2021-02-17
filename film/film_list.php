<!DOCTYPE html>
<html lang="en">
<head>
  <title>BrightRoom - Film </title>
  <?php
  include 'common/header.php';
  include '../../db_conn.php';
  include '../../film_functions.php';

  // Get posts under a particular topic

  $films = getPublishedFilms();
  $topics = getAllTopics();

  ?>

  <div class="container" data-aos="fade-up">
    <h1 class="text-center text-primary p-2">
      <a
      href="film_list.php">
      Film
    </a>
  </h1>
  <div class="row">

    <div class="col-md-6">

      <form action="film_search.php" method="post">
        <input type="text" placeholder="Search film here..." id="searchFilm" name ="searchFilm">
        <button type="submit">
          <i class="fa fa fa-search" aria-hidden="true"></i>
        </button>
      </form>
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

<!-- content -->
<div class="content">
  <div class="row hidden-md-up">

    <?php foreach ($films as $film):?>
      <div class="col-md-3">
        <div class="card"  onclick="window.location='film_single.php?film-slug=<?php echo $film['slug']; ?> ' " >
          <img class="card-img-top"  src="<?php echo BASE_URL . 'images/' . $film['image']; ?>" alt="Card image cap">
          <h4 class="card-title text-center"><?php echo $film['title'] ?></h4>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>
</div>
<!-- // container -->
<?php include 'common/footer.php' ?>
</body>

</html>
