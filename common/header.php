<link rel="stylesheet" href="style.css" type="text/css">

<header>
    <div class="container">

        <p>Header </p>
        <p><a href="index.html">Homepage</a></p>
    </div>
    <?php
        session_start();
        if (!isset($_SESSION["login"])){
            echo "<p> <a href='login_form.php'> Login </a> </p></br>";
            echo "<p> <a href='registration_form.php'> Register </a> </p></br>";
        }
        else {
            echo "<p> <a href= 'show_profile.php'> Profile </a> </p> </br>";
            echo "<p> <a href='logout.php'> Logout </a> </p></br>";
        }
        echo "<hr style='width:100%'>";

    ?>
</header>


<!--CONSIGLIO:
PER PADDING E MARGINI: em
PER LE WIDTH: % o em
PER I FONTSIZE: rem-->
