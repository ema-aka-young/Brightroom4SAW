<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Gruppo 13 FORM</title>
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
</html>
