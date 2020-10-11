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
		<div class="h4 ad-head text-center">welcome to admin panel</div>

		<p class="text-center text-md-right">Hello: al-noman</p>
	</div>
<div class="row">
	<div class="col-12 col-md-2 ad-buttons">
<?php include "../inc/header/buttons.php"; ?>
	</div>
<?php
$sql="select id from addstudents order by id";
$total_student=$admin->countRow($sql);

$sql="select id from addstudents where department=:dept";
$computer=$admin->countRowWithBind($sql,$data='Computer');

$sql="select id from addstudents where department=:dept";
$electrical=$admin->countRowWithBind($sql,$data='Electrical');

$sql="select id from addstudents where department=:dept";
$civil=$admin->countRowWithBind($sql,$data='Civil');

$sql="select id from add_teacher order by id";
$teacher=$admin->countRow($sql);

$sql="select sum(ammount) as total_ammount from payment";
$stmt=$admin->objSelect($sql);
$total_pay=$stmt->total_ammount;
$sql="select sum(ammount) as total_ammount from due";
$stmt=$admin->objSelect($sql);
$total_due=$stmt->total_ammount;
$current_total_due=$total_due-$total_pay;
?>


	<div class="col-12 col-md-10">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<div class="bg-info mt-4 pt-4 pb-4 rounded">
						<h4 class="text-center">TOTAL STUDENTS<span class="rounded-circle p-1 bg-primary h6"><?php if (isset($total_student)) {
							echo $total_student;
						} ?></span></h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="bg-warning mt-4 pt-4 pb-4 rounded">
						<h4 class="text-center">TOTAL TEACHER<span class="rounded-circle p-1 bg-primary h6"><?php if (isset($teacher)) {
							echo $teacher;
						} ?></span></h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="bg-danger mt-4 pt-4 pb-4 rounded">
						<h4 class="text-center">COMPUTER<span class="rounded-circle p-1 bg-primary h6"><?php if (isset($computer)) {
							echo $computer;
						} ?></span></h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="bg-success mt-4 pt-4 pb-4 rounded">
						<h4 class="text-center">CIVIL<span class="rounded-circle p-1 bg-primary h6"><?php if (isset($civil)) {
							echo $civil;
						} ?></span></h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="bg-secondary mt-4 pt-4 pb-4 rounded">
						<h4 class="text-center">ELECTRICAL<span class="rounded-circle p-1 bg-primary h6"><?php if (isset($electrical)) {
							echo $electrical;
						} ?></span></h4>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="bg-info mt-4 pt-4 pb-4 rounded">
						<h4 class="text-center">TOTAL DUE<span class="rounded-circle p-1 bg-danger text-light h6"><?php if (isset($current_total_due)) {
							echo $current_total_due;
						} ?></span></h4>
					</div>
				</div>
			</div>
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