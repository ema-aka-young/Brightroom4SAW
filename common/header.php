<link rel="stylesheet" href="style.css" type="text/css">


<header id="header" class="fixed-top">
   <div class="container d-flex">
      <div class="logo mr-auto">
         <h1 class="text-light"><a href="index.php">FilmSearch</a></h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav class="nav-menu d-none d-lg-block">
         <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="#film">Film</a></li>
            <li><a href="#blog">Blog</a></li>
            <?php
                session_start();
                if (!isset($_SESSION["login"])){
                    echo "<li><a href='login_form.php'>Login</a></li>";
                    echo "<li><a href='registration_form.php'>Register</a></li>";
                }
                else {
                    echo "<li><a href='show_profile.php'>Profile</a></li>";
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
            ?>
            <!--
               <li><a href="#team">Team</a></li>
               <li class="drop-down"><a href="">Drop Down</a>
                 <ul>
                   <li><a href="#">Drop Down 1</a></li>
                   <li class="drop-down"><a href="#">Drop Down 2</a>
                     <ul>
                       <li><a href="#">Deep Drop Down 1</a></li>
                       <li><a href="#">Deep Drop Down 2</a></li>
                       <li><a href="#">Deep Drop Down 3</a></li>
                       <li><a href="#">Deep Drop Down 4</a></li>
                       <li><a href="#">Deep Drop Down 5</a></li>
                     </ul>
                   </li>
                   <li><a href="#">Drop Down 3</a></li>
                   <li><a href="#">Drop Down 4</a></li>
                   <li><a href="#">Drop Down 5</a></li>
                 </ul>
               </li>
               -->
         </ul>
      </nav>
      <!-- .nav-menu -->
   </div>
</header>


<!--CONSIGLIO:
PER PADDING E MARGINI: em
PER LE WIDTH: % o em
PER I FONTSIZE: rem-->
