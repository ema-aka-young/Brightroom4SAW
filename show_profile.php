<!DOCTYPE html>
<html>
<head>
			<title>FilmSearch - Your Profile</title>
</head>
<body>
<?php
	require('common/header.php'); //for session
	require('common/db_conn.php'); //for database connection
	#echo "Ciao user con id = " . $_SESSION["id"] . ".<br>";
	if (!isset($_SESSION["login"])):
		$error = "Non hai ancora fatto il login";
		$_SESSION['error'] = $error;
		header ("Location: error.php");
	endif;

	$query = "select * from utenti where id = " . $_SESSION["id"].";";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($res);

/*
	$stmt = mysqli_prepare($con, "SELECT * FROM utenti where id = ?");
	mysqli_stmt_bind_param($stmt, 's', $email);
	mysqli_stmt_execute($stmt);
*/

?>
<div class="container" data-aos="fade-up">
	 <div class="text-center" >
			<div id="logbox">
				<form action="update_profile.php" method="POST">
					<h1>Profile</h1>
					<div id="signup_list">
						<input type="text" id="nome" name="nome" value= "<?php echo $row['nome']; ?>" />
						<input type="text" id="surname" name="surname" value= "<?php echo $row['cognome']; ?>" />
						<input type="email" id ="email" name="email" value= "<?php echo $row['email']; ?>"/>
						<input type="submit" value="Update profile">
						</div>
				</form>
			</div>
	 </div>
	</div>
</body>
<?php require 'common/footer.php' ?>
</html>
