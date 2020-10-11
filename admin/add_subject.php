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
		<?php include "../inc/header/tcr_buttons.php"; ?>
    </div>

	<div class=" col-12 col-md-10">
		<div class="container">
<?php
if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['submit'])) {
	$addsubject=$admin->addSubject($_POST);
}
?>
		<form style="width:40%; margin:0 auto;" action="" method="post">

			<?php if (isset($addsubject)){
				echo $addsubject;
				} ?>
			<div class="form-group">
				<label for="subject_name">Subject Name</label>
				<input class="form-control" type="text" name="sub_name">
			</div>			
			 
			<div class="form-group">
				<label for="Subject Code">Subject Code:</label>
				<input class="form-control" type="text" name="sub_code">
			</div>
			<div class="form-group">
			<select class="form-control" name="dept">
				<option>--Department--</option>
				<option value="Civil">Civil</option>
				<option value="Electrical">Electrical</option>
				<option value="Computer">Computer</option>
			</select>
			</div>
					
						
							<button class="btn btn-primary"  type="submit" name="submit">Submit</button>
						

		</form>
	  </div>
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