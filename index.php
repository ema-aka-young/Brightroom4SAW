<!DOCTYPE html>
<html lang="en">
   <head>
      <title>FilmSearch</title>
     <link rel="shortcut icon" href="/images/icon.ico" type="image/x-icon">
     <link rel="icon" href="/progettosaw/favicon.ico" type="image/x-icon">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
      <link rel="stylesheet" type="text/css" href="css/aos.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>
   <body>
         <!-- ======= Header ======= -->
<?php
     require 'common/header.php';
?>

      <!-- ======= Hero Section ======= -->
      <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
         <div class="container text-center text-md-left" data-aos="fade-up">
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
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/aos.js"></script>
   </body>
   <script>
      AOS.init();
   </script>
</html>
