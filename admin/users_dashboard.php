<!DOCTYPE html>
<html>
<head>
	<title>BrightRoom - Users Dashboard</title>
	<?php require 'common/header.php'; ?>
	<script src="/~S4668271/js/jquery.dataTables.js"></script>
	<script src="/~S4668271/js/dataTables.bootstrap4.js"></script>
	<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
	<script src="/~S4668271/js/jquery.tabledit.js"></script>
	<link rel="stylesheet" type="text/css" href="/~S4668271/css/dataTables.bootstrap4.css">
</head>


<?php

if (!isset($_SESSION["admin"])){
	die( header( 'Location: ../403.php' ));
}
?>


<div class="container" data-aos="fade-up">
	<br>
	<div class="panel panel-default">
		<div class="panel-heading"><h1 style="text-align:center;">Users Dashboard</h1></div>
		<div class="panel-body">
			<div class="table-responsive">
				<table id="usersdata" class="table table-bordered table-striped table-responsive" >
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
<?php require 'common/footer.php' ?>
</html>

<script>
	$(document).ready(function(){

		var dataTable = $('#usersdata').DataTable({
			"processing" : true,
			"serverSide" : true,
			"order" : [],
			"ajax" : {
				url:"users_fetch.php",
				type:"POST"
			}
		});

		$('#usersdata').on('draw.dt', function(){
			$('#usersdata').Tabledit({
				url:'users_action.php',
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
