<?php
include "lib/user.php";
include_once "lib/user_session.php";
user_session::init();
user_session::checkSession();
$user=new user();
if (isset($_GET['action']) and $_GET['action']=="logout") {
	user_session::logout();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>technocrats</title>
<link rel="stylesheet" href="inc/css/bootstrap.css">
<link rel="stylesheet" href="inc/css/animate.css">
<link rel="stylesheet" href="inc/css/font-awesome.min.css">
<link rel="stylesheet" href="inc/css/navbar-fixed.css">
<link rel="stylesheet" href="inc/css/style.css">
</head>
<body class="payment">
	<!--menubar-->
	
<section>
	<nav class="navbar bg-dark fixed-top navbar-expand-md">
  <div class="container">
    <a class="navbar-brand" href="#">Technocrats!</a>
    <button class="navbar-toggler colp-button"  type="button" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="navbar-nav ml-auto d-block-sm">
	        <li class="nav-item">
	          <a class="nav-link text-light" href="index.php">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="#">ABOUT US</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="#">OUR ARTICLSE</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="#">CONTACT US</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="?action=logout">LOGOUT</a>
	        </li>
       </ul>
    </div>
  </div>
</nav>
</section>

<div style="padding-top:55px;" class="row">
	<!--navigation-->
	<div class="col-12 col-md-2 ad-buttons">
		<?php include "inc/header/st_buttons.php"; ?>
	</div>
<div class="col-12 col-md-10">
	<div class="container">
		<img style="width:50px;height:50px;border:2px solid blue; margin-left:10px;" class="float-right rounded-circle" src="uploads/<?php echo user_session::get('image'); ?>" alt="">
		<div class="mt-2 h5 text-md-right text-capitalize text-center"><strong>welcome:</strong> <?php 
		$username=user_session::get('username');
		if (isset($username)) {
			echo $username;
		}
		?></div>
<?php 
$roll=user_session::get('roll');
$sql="SELECT SUM(ammount) as total_ammount from payment where roll=:roll";
$total_pays=$user->totalPays($sql,$roll);
$query="SELECT SUM(ammount) as total_ammount from due where roll=:roll";
$total_due=$user->totalPays($query,$roll);
if (isset($total_pays)) {
	$total_pay=$total_pays->total_ammount;
}
if (isset($total_due)) {
	$total_dues=$total_due->total_ammount;
}
$current_due=$total_dues-$total_pay;
?>
		<div class="float-right font-weight-bold text-danger">
			Due:<?php echo $current_due; ?>
		</div>
		<div class="row">
<?php 
$sql="select * from post where dept=:dept order by id desc limit 10";
$dept=user_session::get('department');
$getpost=$user->getPost($sql,$dept);
if ($getpost) {
	foreach ($getpost as $data) {
	
?>
			<div class="col-12 col-md-8 mt-5">
				<div class="h4 text-primary">
					<?php echo $data['title']; ?>
				</div>
				<div class="text-secondary">
					<strong>@<?php echo $data['name']; ?></strong>
					<?php echo $data['details']; ?>
				</div>
			</div>
<?php } } ?>
		</div>

	   </div>
	</div>
  </div>


<div style="margin-top:180px;"></div>
<?php include "inc/header/footer.php"; ?>
<!--scripts-->
  <script src="inc/js/jquery.min.js"></script>
  <script src="inc/js/popper.min.js"></script>
  <script src="inc/js/bootstrap.min.js"></script>
  <script src="inc/js/navbar-fixed.js"></script>
  <script src="inc/js/wow.min.js"></script>	
<script>
 new WOW().init();
 </script>
</body>
</html>