<!DOCTYPE html>
<html lang="en">
<head>
  <title>Brightroom - Gallery</title>
  <?php
  include 'common/header.php';
  ?>



  <section id="topSection"></section>
  <div class="container" data-aos="fade-up">
    <h1 class="text-center text-primary p-2">Gallery</h1>

    <!-- topic menu -->
    <div class="row">
      <div class="col">
        <div class="content-title float-right">
          <nav class="gallery-menu ">
            <button class="filter-button" data-filter="all"><h2>All</h2></button>
            <button class="filter-button" data-filter="cinestill"><h2>Cinestill</h2></button>
            <button class="filter-button" data-filter="fuji"><h2>Fujifilm</h2></button>
            <button class="filter-button" data-filter="kodak"><h2>Kodak</h2></button>
          </nav>
        </div>
      </div>
    </div>
    <!-- end topic menu -->

    <div class="row">
      <div class="column">
        <a href="/~S4668271/film/film_single.php?film-slug=portra-400">
          <img class="filter kodak" src="/~S4668271/images/film/portra-400/portra-400_1.jpg" alt="kodak1">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=cinestill-50D">
          <img class="filter cinestill" src="/~S4668271/images/film/cinestill-50D/cinestill-50D_6.jpg" alt="cintestill1">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=fuji-color-C200">
          <img class="filter fuji" src="/~S4668271/images/film/fuji-color-C200/fuji-color-C200_6.jpg" alt="fuji1">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=portra-400">
          <img class="filter kodak" src="/~S4668271/images/film/portra-400/portra-400_3.jpg" alt="kodak2">
        </a>

      </div>
      <div class="column">
        <a href="/~S4668271/film/film_single.php?film-slug=cinestill-800T">
          <img class="filter cinestill" src="/~S4668271/images/film/cinestill-800T/cinestill-800T_6.jpg" alt="cinestill2">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=portra-800">
          <img class="filter kodak" src="/~S4668271/images/film/portra-800/portra-800_1.jpg" alt="kodak3">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=cinestill-50D">
          <img class="filter cinestill" src="/~S4668271/images/film/cinestill-50D/cinestill-50D_2.jpg" alt="cinestill3">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=portra-800">
          <img class="filter kodak" src="/~S4668271/images/film/portra-800/portra-800_3.jpg" alt="kodak4">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=fuji-color-C200">
          <img class="filter fuji" src="/~S4668271/images/film/fuji-color-C200/fuji-color-C200_1.jpg" alt="fuji2">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=fujifilm-industrial-100">
          <img class="filter fuji" src="/~S4668271/images/film/fujifilm-industrial-100/fujifilm-industrial-100_3.jpg" alt="fuji3">
        </a>


      </div>
      <div class="column">
        <a href="/~S4668271/film/film_single.php?film-slug=fujifilm-industrial-100">
          <img class="filter fuji" src="/~S4668271/images/film/fujifilm-industrial-100/fujifilm-industrial-100_6.jpg" alt="fuji 4">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=cinestill-800T">
          <img class="filter cinestill" src="/~S4668271/images/film/cinestill-800T/cinestill-800T_1.jpg" alt="cinestill4">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=portra-160">
          <img class="filter kodak" src="/~S4668271/images/film/portra-160/portra-160_6.jpg" alt="kodak5">
        </a>
        <a href="/~S4668271/film/film_single.php?film-slug=cinestill-800T">
          <img class="filter cinestill" src="/~S4668271/images/film/cinestill-800T/cinestill-800T_7.jpg" alt="cinestill5">
        </a>


      </div>
    </div>
  </div>
  <div>
    <button onclick="topFunction()" id="TopButton" title="Go to top">  <i class="fa fa-arrow-up" ></i></button>
  </div>

<script src="../js/top_button.js"></script>
<script src="../js/gallery.js"></script>
<?php include 'common/footer.php' ?>
</body>
</html>
