<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Gruppo 13 FORM</title>
	<?php 
		require('common/header.php');
	?>

</head>

<body>
	<h1>Login:</h1>
	<div class="reg_form_div">
		<form action="login.php" method="post">
			<i class="fa fa-at fa-2x"></i>
			<input type="email" id="email" name="email" placeholder="E-mail">

			<i class="fa fa-key fa-2x"></i>
			<input type="password" id="pass" name="pass" placeholder="Password">

			<input type="submit" value="Submit">
		</form>
	</div>


<?php 
	require('common/footer.php');
?>
</body>


</html>
