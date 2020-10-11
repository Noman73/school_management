<?php
include "../lib/php_admin.php";
include "../lib/format.php";
$fm=new format();
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
	<!--menubar-->
	
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

		<p class="text-right">Hello: al-noman</p>
	</div>
<div class="row">
	<div class="col-12 col-md-2 ad-buttons">
  <?php include "../inc/header/buttons.php"; ?>
	</div>

	<div class="col-12 col-md-10">
		
		 <?php
$department=$_GET['department'];
$roll=$_GET['roll'];
$getlogdata=$admin->getLoginUser($department,$roll);
if ($getlogdata) {

?>
<div class="">
<div class="text-capitalize text-center mt-3"><h4>welcome ! <strong>
<?php
 $username=$getlogdata->username;
 $name=$getlogdata->name;
 $roll=$getlogdata->roll;
 $image=$getlogdata->image;
 $dept=$getlogdata->department;
echo $name;
 
?></strong></h4></div>
<div style="text-align: center; line-height:0;">
<span class="text-center text-capitalize">Roll: <strong>
<?php
 echo $roll;
?>
</strong></span>

<span class="text-center text-capitalize">Department: <strong>
<?php
echo $department;
}
?>
</strong></span>
<div class="clearfix"><img style="width:100px;height:100px;margin-top:20px;" class="img-fluid rounded" src="../uploads/<?php echo $image; ?>"></div>
</div>
</div>
<div class="container">
<h4 id="header-payment" class="p-2 text-capitalize text-center">payment record</h4>

<div id="payment">

<?php
if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['payment'])) {
	$payment=$admin->payment($_POST);
}
?>
<form action="" method="POST">
	<input type="hidden" name="roll" value="<?php echo $roll; ?>">
	<input type="hidden" name="dept" value="<?php echo $dept; ?>">

	<div class="form-group">
		<label for="semister">semister:</label>
		<select class="form-control" name="semister">
		    <option value="">--select--</option>
		    <option value="1st">1st semister</option>
		    <option value="2nd">2nd semister</option>
		    <option value="3rd">3rd semister</option>
		     <option value="4th">4th semister</option>
		    <option value="5th">5th semister</option>
		    <option value="6th">6th semister</option>
		    <option value="7th">7th semister</option>
		    <option value="8th">8th semister</option>
		    <option value="outer">others</option>  
    	</select>
	</div>

	<div class="form-group">
		<label for="date">Date:</label>
		<input class="form-control" type="date" name="date">
	</div>
	<div class="form-group">
		<label for="fees">Fees Type:</label>
		<input class="form-control" type="text" name="fees">
	</div>

	<div class="form-group">
		<label for="ammount">Ammount:</label>
		<input class="form-control" type="text" name="ammount">
	</div>

	
	
	<button class="btn btn-primary" type="submit" name="payment">Submit</button>
	<a href="index.php" class="btn btn-info">Go Back</a>
  </form>
</div>
</div>
</div>
</div>
<!--end column-->


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