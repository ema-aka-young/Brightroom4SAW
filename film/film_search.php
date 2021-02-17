<!DOCTYPE html>
<html>
<head>
  <?php
  include 'common/header.php';
  include '../../db_conn.php';
  include '../../film_functions.php';
  // Get posts under a particular topic

  if(!isset($_POST['searchFilm']))
  {
    header("Location: film_list.php");
    exit();
  }


  $research =htmlspecialchars($_POST['searchFilm']);
  $films = SearchFilms($research);
  $topics = getAllTopics();

  ?>
  <title>BrightRoom - Search "<?php echo $research ?>"</title>
</head>
<body>

  <div class="container" data-aos="fade-up">
    <h1 class="text-center text-primary p-2">
      <a href="film_list.php"> Film </a>
    </h1>
    <div class="row">
      <div class="col">
        <form action="film_search.php" method="post">
          <input type="text" placeholder="Search film here..." id="searchFilm" name ="searchFilm">
          <button type="submit">
            <i class="fa fa fa-search" aria-hidden="true"></i>
          </button>
        </form>
      </div>

      <div class="col">
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

    <?php if(!(empty($films)) && $research != "" ) {

      echo "<h1>Search results for \""; echo $research;
      echo "\"</h1>
      <div class=\"row hidden-md-up\">  ";

      foreach ($films as $film): ?>
      <div class="col-md-3">
        <div class="card" >
          <img class="card-img-top" onclick="window.location='film_single.php?film-slug=<?php echo $film['slug']; ?> ' " src="<?php echo BASE_URL . 'images/' . $film['image']; ?>" alt="Card image cap">
          <h4 class="card-title text-center"><?php echo $film['title'] ?></h4>
        </div>
      </div>
    <?php endforeach;
    echo "</div>";

  }
  else {echo "
    <h1>Search results for '$research' </h1>
    <div class=\"row\">
    <div class=\"col-sm-8\">
    <h2>Nothing Found<h2>
    <h3>It seems we can't find what you're looking for…</h3>


    </div>
    <div class=\"col-sm-4\">
    <img class=\"img-fluid float-right\" src=\"/~S4668271/images/nothing_found.jpeg\" alt=\"nothing_found\">
    </div>
    </div>
    <input type=\"button\" value=\"Go back!\" onclick=\"window.location='film_list.php';\">



    ";} ?>
  </div>
</div>
<?php include 'common/footer.php' ?>
</body>


</html>
