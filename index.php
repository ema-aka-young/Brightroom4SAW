<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>BrightRoom - Home</title>
  <?php
  include 'common/header.php';
  ?>



    <section id="hero" class="d-flex flex-column justify-content-center align-items-center ">
      <div class="container text-align-top text-center text-md-left" data-aos="fade-up">
        <div class="row">
          <div class="col-md-8">
            <h1>Looking for a film stock?</h1>
            <h2>Get inspired! </h2>

          </div>
          <div class="col-md-4">
            <div class="d-flex align-items-center justify-content-center " >
              <div class="clearfix d-none d-sm-block d-md-block d-lg-block">
                <img class="img-fluid float-center" src="images/canister.gif" alt="...">
              </div>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-center ">
          <div class="col">
        <form action="film/film_search.php" method="post" class="form-inline d-flex justify-content-left md-form form-sm mt-0 align-items-center">
          <div style="text-align: center;">
            <input style="width: 280px; margin-right: 15px; margin-left: 40px;" type="text" value="" placeholder="Enter your search here..." id="searchFilm" name ="searchFilm">
            <button type="submit">
              <i class="fa fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </form>
      </div>
      </div>


      </div>


    </section>
    <?php include 'common/footer.php' ?>
  </body>

  </html>
