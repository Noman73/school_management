<?php 
include "lib/user.php";
include_once "lib/user_session.php";
user_session::init();
user_session::checkSession();
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
	
<?php 
if (isset($_GET['action']) and $_GET['action']=="logout") {
	user_session::logout();
}
?>	
	
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
<!--categories-->
<div class="row">
	<!--navigation-->
	<div style="margin-top:56px;" class="col-12 col-md-2 ad-buttons">
		<?php include "inc/header/st_buttons.php"; ?>
    </div>


	
	<div class=" col-12 col-md-10">
		<div class="container">
<section>
	<div><h2>Messager</h2></div>
	<div class="alert alert-sucess text-right">hello :<strong><?php echo user_session::get('username'); ?><strong></div>
	<div class="row">
		<div class="user col-12">
			<table class="table" style="width:60%;margin:0 auto;">

				<?php
					$sql="select id,name,image from addstudents order by id desc";
					$data=$user->select($sql);
					if($data){
					foreach ($data as $value) {
						
					
				?>
				
				<tr>
					<td><img style="width:30px;height:30px;border:2px solid blue;" class="rounded-circle" src="uploads/<?php echo $value['image']; ?>" alt=""></td>
					<td><?php echo $value['name']; ?></td>
					<td><a class="btn-sm btn-primary" href="message2.php?id=<?php echo $value['id']; ?>">message</a></td>
				</tr>
				

			<?php } } ?>
			</table>
		</div>
		
	</div>
</section>
			
	</div>
   </div>
  </div>













	
<!--all scripts-->

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