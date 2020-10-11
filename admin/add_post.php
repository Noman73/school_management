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
	$post=$admin->post($_POST);
}
?>
		<form style="width:40%; margin:0 auto;margin-top:40px;" action="" method="post">

			<?php if (isset($post)){
				echo $post;
				} ?>
			<div class="form-group">
				<label for="title">post title:</label>
				<input class="form-control" type="text" name="title">
				<input type="hidden" name="name" value="<?php echo session_ad_login::get('username'); ?>">
			</div>			
			<div class="form-group">
			<select class="form-control" name="dept">
				<option>--Department--</option>
				<option value="Civil">Civil</option>
				<option value="Electrical">Electrical</option>
				<option value="Computer">Computer</option>
			</select>
			</div>
			<div class="form-group">
				<label for="title">Describtions:</label>
				<textarea class="form-control" name="details"  rows="2"></textarea>
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