<?php
    require 'common/db_conn.php'; 
    $email = mysqli_real_escape_string($con, trim($_POST['email']));

    $query = "SELECT email FROM utenti WHERE email = '$email' ";
    $res = mysqli_query($con,$query);   
    if (mysqli_num_rows($res) >0) {
        echo "Email already taken";
    }
    else echo "";
    exit();
?>