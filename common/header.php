<?php include 'head.php'?>
</head>
<body>
  <header id="header" class="sticky-top">

    <?php
    session_start();
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path); //components array 
    ?>

    <div class=" d-flex flex-row">
      <div class="logo mr-auto">
        <h1 class="text-light"><a href="/~S4668271/index.php">BrightRoom</a></h1>
      </div>


      <nav class="nav-menu d-none d-lg-block align-top ">
        <ul>
          <li class="<?php if ($components[2]=="index.php" || $components[2]=="") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/index.php">Home</a></li>
          <li class="<?php if ($components[3]=="aboutus.php") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/pages/aboutus.php">About Us</a></li>
          <li class="<?php if ($components[3]== "gallery.php") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/pages/gallery.php">Gallery</a></li>
          <li class="<?php if ($components[3]=="film_list.php" || $components[3]=="film_filtered.php"|| $components[3]=="film_single.php" || $components[3]=="film_search.php") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/film/film_list.php">Film</a></li>
          <li class="<?php if ($components[3]=="blog_list.php" || $components[3]=="blog_filtered.php"|| $components[3]=="blog_post.php" || $components[3]=="blog_search.php" ) {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/blog/blog_list.php">Blog</a></li>
          <?php
          if (isset($_SESSION["admin"])): ?>
          <li class="drop-down <?php if ($components[3]=="users_dashboard.php" || $components[3]=="blog_dashboard.php") {echo " active"; } else  {echo " noactive";}?>"><a>Admin</a>
            <ul>
              <li><a href="/~S4668271/admin/users_dashboard.php">Users</a></li>
              <li><a href="/~S4668271/admin/blog_dashboard.php">Blog</a></li>
            </ul>
          </li>
        <?php endif; ?>
        <?php
        if (!isset($_SESSION["login"])): ?>
        <li class="<?php if ($components[3]=="login_form.php") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/pages/login_form.php">Login</a></li>
        <li class="<?php if ($components[3]=="registration_form.php") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/pages/registration_form.php">SignUp</a></li>
      <?php else : ?>
        <li class="<?php if ($components[3]=="show_profile.php") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/private/show_profile.php">Profile</a></li>
        <li class="<?php if ($components[3]=="logout.php") {echo "active"; } else  {echo "noactive";}?>"><a href="/~S4668271/private/logout.php">Logout</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</div>
</header>
