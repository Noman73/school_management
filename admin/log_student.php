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
<body class="payment">
<!--end menubar-->
<section>
	<div class="header">
		<div class="h4 ad-head text-center">welcome to admin panel</div>

		<p class="text-right">Hello: al-noman</p>
	</div>
<div class="row">
	<div class="col-12 col-md-2 ad-buttons">
<?php include "../inc/header/buttons.php"; ?>
	</div>
	<div class="col-12 col-md-10">
		<?php
if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['log'])) {
	$logstudent=$admin->logStudent($_POST);
}

?>

<h2 class="text-capitalize text-center log-head">log student</h2>

<div id="payment">
<?php
if (isset($logstudent)) {
	echo $logstudent;
}
 ?>
<form action="" method="POST">
	<div class="form-group">
		<label for="department">Department :</label>
		<select class="form-control" type="text" name="department">
		    <option value="">--select--</option>
		    <option value="Civil">Civil</option>
		    <option value="Electrical">Electrical</option>
		    <option value="Computer">Computer</option>
      
    	</select>
	</div>

	
	
	<div class="form-group">
		<label for="roll">Student Roll:</label>
		<input class="form-control" type="text" name="roll">
	</div>

	
	
	<button class="btn btn-primary" type="submit" name="log">Log</button>
	<a href="admin.php" class="btn btn-info">Go Back</a>
  </form>
</div>

</div>

	</div>
  </div>
 </section> 
















<!-----scripts----->
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