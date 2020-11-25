<!DOCTYPE html>
<html>
<head>
<title>Gruppo 13</title>
</head>
<body>

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
</html>