<!DOCTYPE html>
<html>
<head>
<title>Gruppo 13</title>
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

<br>
<br>
<br>
<br>
<br>
<br>
<h1>Show Profile</h1>
<?php
	require('common/header.php'); //for session
	require('common/db_conn.php'); //for database connection
	echo "Ciao user con id = " . $_SESSION["id"] . ".<br>";

	$query = "select * from utenti where id = " . $_SESSION["id"].";";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($res);

/*
	$stmt = mysqli_prepare($con, "SELECT * FROM utenti where id = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
*/

?>
<div class="reg_form_div">
<form action="update_profile.php" method="POST">
	<input type="text" id="nome" name="nome" value= "<?php echo $row['nome']; ?>" />

	<input type="text" id="surname" name="surname" value= "<?php echo $row['cognome']; ?>" />

	<input type="email" id ="email" name="email" value= "<?php echo $row['email']; ?>"/>

	<input type="submit" value="Update profile">
</form>
</div>

<?php require 'common/footer.php' ?>
</body>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/aos.js"></script>
</body>
<script>
AOS.init();
</script>
</html>
