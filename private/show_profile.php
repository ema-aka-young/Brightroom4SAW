<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	include 'common/header.php';
	include '../../db_conn.php';
	include '../../blog_functions.php';
	?>
	<title>BrightRoom - Your Profile</title>

	<?php


	if (!isset($_SESSION["login"])) {
		$error = "You must authenticate to access this page";
		$_SESSION['error'] = $error;
		die(header ("Location: /~S4668271/common/error.php"));
	}

	$user_id = $_SESSION["id"];
	$query = "SELECT * FROM users WHERE id = $user_id;";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($res);
	$posts = getAllPostTopicsFromUser($user_id);
	?>

	<div class="container">
		<div class="row" data-aos="fade-up">
			<div class="col-sm-6 my-auto d-none d-sm-block">
				<div class="clearfix">
					<img class="img-fluid float-center" src="/~S4668271/images/film_strip.jpg" alt="...">
				</div>
			</div>
			<div class="col-sm-6 my-auto">
				<div id="editbox" >
					<form action="/~S4668271/private/update_profile.php" method="POST">
						<h1>Edit Profile</h1>
						<hr>
						<p>Change your info and submit<p>
							<label for="firstname"><b>Firstname:</b></label>
							<input type="text" id="firstname" name="firstname" value= "<?php echo $row['nome']; ?>" pattern="^[a-zàéèìòùA-Zàéèìòù'-]{1,}(?: [a-zàéèìòùA-Zàéèìòù'-]*){0,64}$"  required/>
								<br>	<label for="lastname"><b>Lastname:<br></b></label>
								<input type="text" id="lastname" name="lastname" value= "<?php echo $row['cognome']; ?>" pattern="^[a-zàéèìòùA-Zàéèìòù'-]{1,}(?: [a-zàéèìòùA-Zàéèìòù'-]*){0,64}$"  required/>
									<br>	<label for="email"><b>Email:<br></b></label>
									<input type="email" id ="email" name="email" value= "<?php echo $row['email']; ?>"/>
									<hr>
									<a href="update_password.php"> Do you want to edit your password? </a>
									<hr>
									<input type="submit" value="Update profile">
								</form>
							</div>
						</div>
					</div>

					<div class="row" data-aos="fade-up" data-aos-delay="100">
						<div class="col-sm-6 my-auto">
							<div id="editbox" >
								<h1>Your activities</h1>
								<hr>
								<p>Your role is: <b><?php echo $row['role'];?></b></p>
								<?php
								foreach ($posts as $post) {
									echo "<li> <a href=/~S4668271/blog/blog_post.php?post-slug=";
									echo $post['slug'];
									echo ">";
									echo $post['title'];
									echo"</a></li>";
								}
								if (!$posts) {
									echo "<p>You haven't published any articles yet.</p>";
								}
								?>
							</div>
						</div>

						<div class="col-sm-6 my-auto d-none d-sm-block">
							<div class="clearfix">
								<img class="img-fluid float-right" src="/~S4668271/images/contact_sheet.jpg" alt="...">
							</div>
						</div>
					</div>
				</div>
			</body>
			<?php include 'common/footer.php' ?>
			</html>
