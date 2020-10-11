<?php 
include "lib/user.php";
$user=new user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>technocrats</title>
<link rel="stylesheet" href="inc/css/bootstrap.css">
<link rel="stylesheet" href="inc/css/animate.css">
<link rel="stylesheet" href="inc/css/font-awesome.min.css">
<link rel="stylesheet" href="inc/css/navbar-fixed.css">
<link rel="stylesheet" href="inc/css/style.css">
</head>
<body>
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
	        
	        
       </ul>
    </div>
  </div>
</nav>
	</section>
<!--end menubar-->

<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'  AND isset($_POST['login'])){
	$loginusr=$user->loginUser($_POST);
}
?>
<h2 class="text-capitalize text-center log-head">Student Login</h2>
<div id="add-student">

<form style="margin: 0 auto; width:40%;" action="" method="POST">
	<?php 
if (isset($loginusr)) {
	echo $loginusr;
}
?>

	<div class="form-group">
		<label for="username">username:</label>
		<input class="form-control" type="text" name="username">
	</div>
	<div class="form-group">
		<label for="roll">Student Roll:</label>
		<input class="form-control" type="password" name="roll">
	</div>
	
	
	<button class="btn btn-primary" type="submit" name="login">Login</button>
	<a href="index.php" class="btn btn-info">Go Back</a>
  </form>
</div>







<!-----scripts----->
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