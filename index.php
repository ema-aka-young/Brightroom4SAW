<!DOCTYPE html>
<html lang="en">
<head>
      <title>FilmSearch - Home</title>
</head>
   <?php
        require 'common/header.php';
   ?>
   <body>
      <!-- ======= Hero Section =======-->
      <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
         <div class="container text-align-top text-center text-md-left" data-aos="fade-up">
            <h1>Looking for a film stock?</h1>
            <h2>Get inspired! </h2>
            <div class="container2" data-aos="fade-left">
               <input type="text" value="" placeholder="Enter your search here..." id="searchBar">
               <button> <i class="fa fa-search"></i></button> <!-- se rimuovo button si allinea alla ricerca ma ovviamente non va il button-->
            </div>
         </div>
      </section>
      <!-- End Hero -->
      <main id="main">
      </main>
      <!-- End #main -->
  </body>
   <?php require 'common/footer.php' ?>
</html>
