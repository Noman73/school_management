<?php
include "../lib/php_admin.php";
include_once "../lib/session_ad_login.php";
session_ad_login::init();
session_ad_login::checkTcrLogin();
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

	<div class="header">
		<div class="h4 ad-head text-center">welcome to admin panel</div>

		<p class="text-right">Hello: al-noman</p>
	</div>
<div class="row">
	<!--navigation-->
	<div class="col-12 col-md-2 ad-buttons">
<?php include "../inc/header/buttons.php"; ?>

</div>


	
	<div class=" col-12 col-md-10">
		<div class="container">
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'  AND isset($_POST['submit'])){
	$search=$admin->feesSearch($_POST);
}
?>
			<form action="" method="post">
				<div class="float-right" class="form-group">
					<input class="form-control-sm" type="text" name="roll">
					<button class="btn-sm btn-primary" type='submit' name="submit">search</button>
				</div>
			</form>

			<!--/end form--->
			<table style="width:100%;margin:0 auto;margin-top:50px;" class="table table-striped text-center table-bordered">

	<thead class="table-info">
		<tr>
			<th>no</th>
			<th>date</th>
			<th>Semister</th>
			<th>Student Roll</th>
			<th>Fees type</th>
			<th>Ammount</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<tr>
<?php if (isset($search)) {
	$i=0;
	foreach ($search as $data) {
		$i++;
?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data['dates']; ?></td>
			<td><?php echo $data['semister']; ?></td>
			<td><?php echo $data['roll']; ?></td>
			<td><?php echo $data['fees']; ?></td>
			<td><?php echo $data['ammount']; ?></td>
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











 