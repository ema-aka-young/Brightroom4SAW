<!DOCTYPE html>
<html lang="en">
<head>
	<title>BrightRoom - Blog Dashboard</title>
	<?php include 'common/header.php'; ?>
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
		<div class="panel-heading"><h1 style="text-align:center;">Blog Dashboard</h1></div>
		<div class="panel-body">
			<div class="table-responsive">
				<table id="blogdata" class="table table-bordered table-striped table-responsive" >
					<thead>
						<tr>
							<th>ID</th>
							<th>Author</th>
							<th>Title</th>
							<th>Slug</th>
							<th>Image</th>
							<th>Published</th>
							<th>Date</th>
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

<script src="../js/blog_dashboard.js" type="text/javascript"></script>