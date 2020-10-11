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
<!--end menubar-->
<div style="padding-top:55px;" class="row ">
	<div class="col-12 col-md-2 ad-buttons">
		<?php include "inc/header/st_buttons.php"; ?>
	</div>
		
    <div class="col-12 col-md-10">
<h2 class="text-capitalize text-center">payment record</h2>

<div class="table-responsive">
<table style="width:100%;margin:0 auto; margin-top:15px;" class="table table-striped text-center table-bordered w-100">
	<thead class="table-info">
		<tr>
			<th scope="col">No</th>
			<th scope="col">Date</th>
			<th scope="col">Semister</th>
			<th scope="col">Roll</th>
			<th scope="col">Fees Type</th>
			<th scope="col">Ammount</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
<?php
$result=$user->getpaymentrecord();
if ($result) {
	$i=0;
	foreach ($result as $data) {
		$i++;
?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data['dates']; ?></td>
			<td><?php echo $data['semister']; ?></td>
			<td><?php echo $data['roll']; ?></td>
			<td><?php echo $data['fees']; ?></td>
			<td><?php echo $data['ammount']; ?></td>
			<td>
				<a class="btn btn-success" href="#">view</a>
			</td>
		</tr>

	<?php } }else{ echo "<div class='alert alert-danger'><strong>Notice !</strong>data not found</div>"; } ?>
	</tbody>
</table>
</div>
</div>
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