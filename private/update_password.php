<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	include 'common/header.php';
	include '../../db_conn.php';
	?>
	<title>BrightSearch - Your Profile</title>
</head>
<body>
	<?php
	if (!isset($_SESSION["login"])):
		$error = "You haven't logged in yet";
		$_SESSION['error'] = $error;
		header ("Location: /~S4668271/common/error.php");
	endif;

	$query = "select * from users where id = " . $_SESSION["id"].";";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($res);
	?>

	<div class="container" >
		<div class="row" data-aos="fade-up">
			<div class="col-sm-6 my-auto d-none d-sm-block">
				<div class="clearfix">
					<img class="img-fluid float-center" src="/~S4668271/images/film_strip.jpg" alt="...">
				</div>
			</div>
			<div class="col-sm-6 my-auto">
				<div id="editbox">
					<form action="change_password.php" method="POST">
						<h1>Edit Password</h1>
						<hr>
						<p>Insert old and new password then submit<p>
						<label for="oldpass"><b>Current Password:</b></label>
						<input type="password" id="oldpass" name="oldpass"required/>
						<br>
						<label for="pass"><b>New Password:</b></label>
						<input type="password" id="pass" name="pass" minlength="6"
							title="Must contain at least 6 characters" required>
						<br>
						<label for="confirm"><b>Confirm new Password:</b></label>
						<input type="password" id="confirm" minlength="6" name="confirm" required>
						<div id="msg"></div>
						<hr>
							<input type="submit" value="Submit to edit password">
						</form>
					</div>
				</div>
			</div>
		</div>


	<?php include 'common/footer.php' ?>
	</body>

	<script src="../js/submit.js" type="text/javascript"></script>
	<script src="../js/match_password.js" type="text/javascript"></script>
	</html>
