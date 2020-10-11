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
if (isset($_GET["dept"])) {
	$dept=$_GET["dept"];
}
if (isset($_GET["sub"])) {
	$subject=$_GET["sub"];
}
if (isset($_GET["semi"])) {
	$semister=$_GET["semi"];
}



?>

<?php 
if (isset($_GET['action']) and $_GET['action']=="logout") {
	session_ad_login::logout();
}
?>	
	<div class="header">
		<div class="h4 ad-head text-center">welcome to admin panel</div>

		<p class="text-right">Hello: al-noman</p>
	</div>
<div class="row">
	<div class="col-12 col-md-2 ad-buttons">
		<?php include "../inc/header/tcr_buttons.php"; ?>
	</div>
<?php
if($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['submit'])) {
	$attend=$_POST['attend'];
	$att_sub=$admin->attSubmit($_POST,$attend);
}

?>
	<div class="col-12 col-md-10 mt-4 text-center">
		<div class="container">
		<form action="" method="post">
			<input type="hidden" name="semi" value="<?php echo $semister; ?>">
			<input type="hidden" name="subject" value="<?php echo $subject; ?>">
			<input type="hidden" name="dept" value="<?php echo $dept; ?>">
			
			<table style="margin: 0 auto;" class="table">
				<tr>
					<th>roll</th>
					<th>name</th>
					<th>count</th>
				</tr>
				
					
<?php
$sql="SELECT name,roll from addstudents where department=".$dept." and semister=".$semister." order by id";
$getstd=$admin->selectStd($dept,$semister);
if ($getstd) {
	foreach ($getstd as $data) {
?>
			<tr>
				<td><?php echo $data['roll']; ?></td>
				<td><?php echo $data['name']; ?></td>
				<td>P <input type="radio" name="attend[<?php echo $data['roll']; ?>]" value="present">
					 |A<input type="radio" name="attend[<?php echo $data['roll']; ?>]" value="absent"></td>
			</tr>
<?php } } ?>
			</table>
			<button class="btn btn-primary float-right mr-md-5" type="submit" name="submit">submit</button>
		</form>
	  </div>
	</div>
  </div>
 </section> 


 ////----------------------------
	
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