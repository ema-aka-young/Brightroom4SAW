<!DOCTYPE html>
<html>
<head>
	<title>FilmSearch - Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
</head>


<?php
	session_start();
	//require('common/header.php');
	//require('common/db_conn.php'); //for database connection
	if ($_SESSION["admin"]!=1):
		$error = "Non hai i privilegi per accedere a questa pagina";
		$_SESSION['error'] = $error;
		header ("Location: error.php");
	endif;
  ?>


  	<div class="container">
  		<br>
	   <div class="panel panel-default">
	    <div class="panel-heading">Admin Dashboard</div>
	    <div class="panel-body">
	     <div class="table-responsive">
	      <table id="usersdata" class="table table-bordered table-striped">
	       <thead>
	        <tr>
	         <th>ID</th>
	         <th>First Name</th>
	         <th>Last Name</th>
	         <th>Email</th>
			 <th>Role</th>
	        </tr>
	       </thead>
	       <tbody></tbody>
	      </table>
	     </div>
	    </div>
	   </div>
	  </div>


</body>
</html>

	<script>
	 $(document).ready(function(){

	 var dataTable = $('#usersdata').DataTable({
	  "processing" : true,
	  "serverSide" : true,
	  "order" : [],
	  "ajax" : {
	   url:"fetch.php",
	   type:"POST"
	  }
	 });

	 $('#usersdata').on('draw.dt', function(){
	  $('#usersdata').Tabledit({
	   url:'action.php',
	   dataType:'json',
	   columns:{
	    identifier : [0, 'id'],
	    editable:[[1, 'nome'], [2, 'cognome'], [3, 'email'], [4, 'role', '{"1":"Author","2":"Admin","3":"User"}']]
	   },
	   restoreButton:false,
	   onSuccess:function(data, textStatus, jqXHR)
	   {
	    if(data.action == 'delete')
	    {
	     $('#' + data.id).remove();
	     $('#usersdata').DataTable().ajax.reload();
	    }
	   }
	  });
	 });
	  
	}); 
</script>


