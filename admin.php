<!DOCTYPE html>
<html>
<head>
			<title>FilmSearch - Your Profile</title>
</head>
<body>
<?php
	require('common/header.php'); //for session
	require('common/db_conn.php'); //for database connection
	if ($_SESSION["admin"]!=1):
		$error = "Non hai i privilegi per accedere a questa pagina";
		$_SESSION['error'] = $error;
		header ("Location: error.php");
	endif;
  ?>

  <?php
  	$query= "SELECT * FROM users ORDER BY users.id ASC";
  	$res= mysqli_query($con,$query);
  ?>

  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
         <div class="container text-align-top text-center text-md-center" data-aos="fade-up">
            <h1>Admin dashboard</h1>
            <div class="table-responsive">
            	<table id="usersdata" class="table table-striped table-bordered">
            		<thead>
            			<tr>
	            			<td>Id</td>
	            			<td>Name</td>
	            			<td>Surname</td>
	            			<td>Email</td>
	            			<td>Role</td>
	            		</tr>
            		</thead>

            		<?php
            		while ($row = mysqli_fetch_array($res))
            		{
            			echo '
            			<tr>
	            			<td>'.$row["id"].'</td>
	            			<td>'.$row["nome"].'</td>
	            			<td>'.$row["cognome"].'</td>
	            			<td>'.$row["email"].'</td>
	            			<td>'.$row["role"].'</td>
	            		</tr>
            			';
            		}

            		?>

            	</table>
            </div>
         </div>
      </section>
  </body>

<script>
    $(document).ready(function(){
    $('#usersdata').DataTable();
} );
</script>


  <?php require 'common/footer.php' ?>
  </html>

  
