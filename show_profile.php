<!DOCTYPE html>
<html>
<head>
	<title>FilmSearch - Your Profile</title>
</head>
<body>
	<?php
	require('common/header.php'); //for session
	require('common/db_conn.php'); //for database connection
	if (!isset($_SESSION["login"])):
		$error = "Non hai ancora fatto il login";
		$_SESSION['error'] = $error;
		header ("Location: error.php");
	endif;

	$query = "select * from users where id = " . $_SESSION["id"].";";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($res);

	/*
	$stmt = mysqli_prepare($con, "SELECT * FROM users where id = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
	*/

	?>
	<div class="container" >
		<div class = "row justify-content-start text-center">
			<div id="logbox" >
				<div class = "col-4">
					<form action="update_profile.php" method="POST">
						<h1>Edit Profile</h1>
						<input type="text" id="firstname" name="firstname" value= "<?php echo $row['nome']; ?>" />
						<input type="text" id="lastname" name="lastname" value= "<?php echo $row['cognome']; ?>" />
						<input type="email" id ="email" name="email" value= "<?php echo $row['email']; ?>"/>
						<input type="submit" value="Update profile">
					</div>
				</form>
			</div>
			<div id="logbox">
				<div class = "col-4">
					<form action="update_password.php" method="POST">
						<h1>Edit Password</h1>
						<input type="email" id ="email" name="email" value= "<?php echo $row['email']; ?>"/>
						<input type="password" id="pass" name="pass" placeholder="Old Password" />
						<input type="password" id="confirm" name="confirm" placeholder="Confirm old password">
						<input type="submit" value="Submit to edit password">
					</div>
				</form>
			</div>
		</div>
	</div>


</body>
<?php require 'common/footer.php' ?>
</html>
