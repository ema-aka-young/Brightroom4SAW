<!DOCTYPE html>
<html>
<head>
	<title>Gruppo 13 FORM</title>
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

<?php
	require('common/header.php');
?>

<body>
<h1>Registrazione:</h1>
<div class="reg_form_div">
	<form action="registration.php" method="post" class="reg_form">

		<i class="fa fa-address-card fa-2x"></i>
		<input type="text" id="firstname" name="firstname" placeholder="Firstname">

		<i class="fa fa-address-card fa-2x"></i>
		<input type="text" id="lastname" name="lastname" placeholder="Lastname">

		<i class="fa fa-at fa-2x"></i>
		<input type="email" id="email" name="email" placeholder="E-mail">

		<i class="fa fa-key fa-2x"></i>
		<input type="password" id="pass" name="pass" placeholder="Password">

		<i class="fa fa-key fa-2x"></i>
		<input type="password" id="confirm" name="confirm" placeholder="Confirm password">

		<input type="submit" value="Submit">

	</form>
</div>

<?php
	require('common/footer.php');
?>

</body>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/aos.js"></script>
</body>
<script>
AOS.init();
</script>
</html>
