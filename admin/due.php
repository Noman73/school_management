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
		<p class="text-right">Hello: Noman</p>
	</div>
<div class="row">
	<div class="col-12 col-md-2 ad-buttons">
<?php include "../inc/header/buttons.php"; ?>
	</div>

	<div class="col-10">
<?php
if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['search'])) {
	$get_info=$admin->getStudentInfo($_POST);
}

if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['submit'])) {
	$due_list=$admin->insertDue($_POST,$_FILES);
}
?>

<div id="add-student">
 <div class="h3 mt-2 mb-3 text-center">DUE LISTING</div>
  <div style="width:40%;margin:0 auto;">
	<?php
	if (isset($due_list)) {
		echo $due_list;
	}
	?>
 </div>
 <form style="margin-right:20%" class="float-right" action="" method="post">
 	<div class="form-group">
 		<input class="form-control-sm" type="text" name="query" placeholder="roll....">
 		<button class="btn-sm btn-primary" type="submit" name="search">search</button>
 	</div>
 </form>
<form  style="margin: 0 auto;width:60%;margin-bottom:40px;" action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="name">Name :</label>
		<input class="form-control" type="text" value="<?php if(isset($get_info->name)){ echo $get_info->name; } ?>" name="name">
	</div>

	<div class="form-group">
		<label for="semister">semister:</label>
		<input class="form-control" type="text" name="semister" value="<?php if(isset($get_info->semister)){ echo $get_info->semister; } ?>">
    </div>
    <div class="form-group">
		<label for="roll">roll:</label>
		<input class="form-control" type="text" value="<?php if(isset($get_info->roll)){ echo $get_info->roll; } ?>" name="roll">
	</div>
	<div class="form-group">
		<label for="type">Fees type:</label>
		<input class="form-control" type="text" value="" name="type">
	</div>
	
	<div class="form-group">
		<label for="ammount">Due Ammount:</label>
		<input class="form-control" type="text" name="ammount">
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