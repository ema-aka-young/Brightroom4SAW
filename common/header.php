<!--<link rel="stylesheet" href="style.css" type="text/css"> -->
<!DOCTYPE html>
<html lang="en">
   <head>
     <link rel="shortcut icon" href="/images/icon.ico" type="image/x-icon">
     <link rel="icon" href="/progettosaw/favicon.ico" type="image/x-icon">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>FilmSearch</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
      <link rel="stylesheet" type="text/css" href="css/aos.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   </head>

<header id="header" class="fixed-top">
<?php #get active page for underline in navbar
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$activePage = $components[1];
?>
   <div class="container d-flex">
      <div class="logo mr-auto">
         <h1 class="text-light"><a href="index.php">FilmSearch</a></h1>
      </div>
      <nav class="nav-menu d-none d-lg-block">
         <ul>
            <li class="<?php if ($activePage=="index.php") {echo "active"; } else  {echo "noactive";}?>"><a href="index.php">Home</a></li>
            <li class="<?php if ($activePage=="aboutus.php") {echo "active"; } else  {echo "noactive";}?>"><a href="aboutus.php">About Us</a></li>
            <li class="<?php if ($activePage=="film") {echo "active"; } else  {echo "noactive";}?>"><a href="#film">Film</a></li>
            <li class="<?php if ($activePage=="blog") {echo "active"; } else  {echo "noactive";}?>"><a href="#blog">Blog</a></li>
            <?php
#questa parte non funge 
#                if (!isset($_SESSION["login"])){
#                  if ($activePage=="login_form.php") {
#                   echo "<li class=active><a href='login_form.php'>Login</a></li>";
#                   echo "<li class=noactive><a href='registration_form.php'>Registration</a></li>";
#                  }
#                  else if ($activePage=="registration_form.php") {
#                   echo "<li class=noactive><a href='login_form.php'>Login</a></li>";
#                   echo "<li class=active><a href='registration_form.php'>Registration</a></li>";
#                  }
#                }
#                else {
#                  if ($activePage=="show_profile.php")
#                   echo "<li class=active><a href='show_profile.php'>Profile</a></li>";
#                  if ($activePage=="Logout.php")
#                    echo "<li><a href='logout.php'>Logout</a></li>";
#                }
            ?>

         </ul>
      </nav>
      <!-- .nav-menu -->
   </div>
</header>


<!--CONSIGLIO:
PER PADDING E MARGINI: em
PER LE WIDTH: % o em
PER I FONTSIZE: rem-->
