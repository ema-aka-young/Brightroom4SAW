<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
      <meta name="description" content="" />
      <meta name="author" content="" />
      <?php require 'head.php' ?>
   </head>
   <header id="header" class="sticky-top">
      <?php
         session_start();
         $directoryURI = $_SERVER['REQUEST_URI'];
         $path = parse_url($directoryURI, PHP_URL_PATH);
         $components = explode('/', $path);
         $activePage = $components[2];
         ?>
      <div class="container d-flex">
         <div class="logo mr-auto">
            <h1 class="text-light"><a href="index.php">FilmSearch</a></h1>
         </div>
         <nav class="nav-menu d-none d-lg-block">
            <ul>
               <li class="<?php if ($activePage=="index.php" || $activePage=="") {echo "active"; } else  {echo "noactive";}?>"><a href="index.php">Home</a></li>
               <li class="<?php if ($activePage=="aboutus.php") {echo "active"; } else  {echo "noactive";}?>"><a href="aboutus.php">About Us</a></li>
               <li class="<?php if ($activePage=="film") {echo "active"; } else  {echo "noactive";}?>"><a href="#film">Film</a></li>
               <li class="<?php if ($activePage=="blog_list.php") {echo "active"; } else  {echo "noactive";}?>"><a href="blog_list.php">Blog</a></li>
               <?php
                  if (isset($_SESSION["admin"])): ?>
               <li class="<?php if ($activePage=="admin.php") {echo "active"; } else  {echo "noactive";}?>"><a href="admin.php">Admin</a></li>
               <?php endif; ?>
               <?php
                  if (!isset($_SESSION["login"])): ?>
               <li class="<?php if ($activePage=="login_form.php") {echo "active"; } else  {echo "noactive";}?>"><a href="login_form.php">Login</a></li>
               <li class="<?php if ($activePage=="registration_form.php") {echo "active"; } else  {echo "noactive";}?>"><a href="registration_form.php">SignUp</a></li>
               <?php else : ?>
               <li class="<?php if ($activePage=="show_profile.php") {echo "active"; } else  {echo "noactive";}?>"><a href="show_profile.php">Profile</a></li>
               <li class="<?php if ($activePage=="logout.php") {echo "active"; } else  {echo "noactive";}?>"><a href="logout.php">Logout</a></li>
               <?php endif; ?>
            </ul>
         </nav>
      </div>
      <hr>
   </header>
