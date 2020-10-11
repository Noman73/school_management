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

		<div class="container">
	<h4 class="head text-center">Update Your News</h4>
	<?php 
	if ($_SERVER['REQUEST_METHOD']=='POST'  AND isset($_POST['submit'])){
	$news=$admin->newsUpdate($_POST);
	}
	if (isset($news)) {
		echo $news;
	}
	?>

<form style="width:50%; margin:0 auto;" action=""  method="POST">	
	<div class="form-group">
		<textarea class="form-control" name="news" cols="60" rows="5"></textarea>

		<div class="form-group">
		<button class="btn btn-primary mt-2" type="submit" name="submit">Submit</button>
		<a class="btn btn-info mt-2" href="index.php">Go Back</a>
	</div>
	</div>
</form>	
         
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