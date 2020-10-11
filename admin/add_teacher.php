<?php
include "../lib/php_admin.php";
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
<section>
	<div class="header">
		<div class="h4 text-center">welcome to admin panel</div>
		<p class="text-right">Hello: al-noman</p>
	</div>
<div class="row">
	<div class="col-12 col-md-2 ad-buttons">
<?php include "../inc/header/buttons.php"; ?>
	</div>

	<div class="col-10">
<?php
if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['submit']) AND isset($_FILES['image'])) {
	$addTeacher=$admin->addTeacher($_POST,$_FILES);
}
?>

<div id="add-student">
 <div class="h3 mt-2 mb-3 text-center">ADD STUDENT</div>
<form  style="margin: 0 auto;width:60%;" action="" method="post" enctype="multipart/form-data">
		<?php
if (isset($addTeacher)) {
	echo $addTeacher;
}
?>
	<div class="form-group">

		<label for="name">Name :</label>
		<input class="form-control" type="text" name="name">
	</div>

	<div class="form-group">
		<label for="username">Username:</label>
		<input class="form-control" type="text" name="username">
	</div>
	<div class="form-group">
		<select class="form-control" type="text" name="department">
		    <option value="">--Department--</option>
		    <option value="Civil">Civil</option>
		    <option value="Electrical">Electrical</option>
		    <option value="Computer">Computer</option>
    	</select>
	</div>
		<div class="form-group">
		<label for="image">select image:</label>
		<input class="form-control" type="file" name="image">
	</div>

	
	
	<button class="btn btn-primary" type="submit" name="submit">Submit</button>
	<a href="index.php" class="btn btn-info">Go Back</a>
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