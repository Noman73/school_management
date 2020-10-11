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

<?php 
if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['submit'])) {
	$attendance=$admin->attendancePrepare($_POST);
}

?>
	
	<div class=" col-12 col-md-10 mt-4">
		<div class="container">
		<form action="" method="post">
			<table style="margin: 0 auto;">
				<tr>
					<td>
						<select class="form-control" name="semister" >
							<option value="">--semister--</option>
							<option value="1st">1st semister</option>
							<option value="2nd">2nd semister</option>
							<option value="3rd">3rd semister</option>
							<option value="4th">4th semister</option>
							<option value="5th">5th semister</option>
							<option value="6th">6th semister</option>
							<option value="7th">7th semister</option>
							<option value="8th">8th semister</option>
						</select>
					</td>
				</tr>
					<td>
						<select class="form-control" name="subject">
							<option>--subject--</option>
<?php 
$sql="SELECT sub_code,sub_name from add_subject order by id;";
$subjects=$admin->select($sql);
if ($subjects) {
	foreach ($subjects as $subject){
?>
							<option value="<?php echo $subject['sub_code']; ?>"><?php echo $subject['sub_name']; ?></option>
<?php } } ?>
						</select>
					</td>
				<tr>
					<td>
						<select class="form-control" name="department" id="">
							<option>--Department--</option>
							<option value="Civil">Civil</option>
							<option value="Electrical">Electrical</option>
							<option value="Computer">Computer</option>
						</select>
					</td>
				<tr>
					<td><button class="btn btn-primary mt-3" type="submit" name="submit">submit</button></td>
				</tr>
			</table>
		</form>

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