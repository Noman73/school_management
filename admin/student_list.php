<?php
include "../lib/php_admin.php";
include_once "../lib/session_ad_login.php";
session_ad_login::init();
session_ad_login::checkAdminLogin();
$admin=new admin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>technocrats</title>
<link rel="stylesheet" href="../inc/css/bootstrap.css">
<link rel="stylesheet" href="../inc/css/animate.css">
<link rel="stylesheet" href="../inc/css/font-awesome.min.css">
<link rel="stylesheet" href="../inc/css/navbar-fixed.css">
<link rel="stylesheet" href="../inc/css/style.css">
</head>
<body>
<?php 
if (isset($_GET['action']) and $_GET['action']=="logout") {
	session_ad_login::logout();
}
?>		

<!--end menubar-->


<!--categories-->
<section>
	<div class="header">
		<p class="h4 text-center">welcome to admin panel</p>
		<p class="text-right">Hello: al-noman</p>
	</div>
<div class="row">
	<div class="col-12 col-md-2 ad-buttons">
<?php include "../inc/header/buttons.php"; ?>
	</div>
	
	<div class="col-12 col-md-10">
		<div class="container">
		<table style="width:100%;margin:0 auto;margin-top:10px; margin-bottom: 50px; background-color:white;" class="table table-striped text-center table-bordered">

	<thead class="table-info">
		<?php 
		$result_data=$admin->getAddStudentData();
		?>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th width="200px">Name</th>
			<th>Username</th>
			<th>Department</th>
			<th>Roll</th>
			<th>Session</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php 
		if ($result_data) {
			$i=0;
			foreach ($result_data as $data_index) {
			$i++;	
			
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data_index['dates']; ?></td>
			<td><?php echo $data_index['name']; ?></td>
			<td><?php echo $data_index['username']; ?></td>
			<td><?php echo $data_index['department']; ?></td>
			<td><?php echo $data_index['roll']; ?></td>
			<td><?php echo $data_index['session']; ?></td>
			<td>
				<a class="btn btn-success" href="#">VIEW</a>
			</td>
		</tr>
	<?php } } ?>
	</tbody>
</table>
		

	</div>
	</div>
  </div>
 </section>
<!--all scripts-->

  <script src="../inc/js/jquery.min.js"></script>
  <script src="../inc/js/popper.min.js"></script>
  <script src="../inc/js/bootstrap.min.js"></script>
  <script src="../inc/js/navbar-fixed.js"></script>
  <script src="../inc/js/wow.min.js"></script>	
<script>
 new WOW().init();
 </script>
</body>
</html>