<?php 
include "lib/user.php";
include_once "lib/user_session.php";
user_session::init();
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
	        
	        
	        <?php 
	        $log=user_session::get('login');
	        if ($log==true) { 
	        	?>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="?action=logout">LOGOUT</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link text-light" href="student_profile.php">PROFILE</a>
	        </li>
	      <?php }else{ 
	       ?> 
	      <li class='nav-item'>
	          <a class='nav-link text-light' href='login.php'>LOGIN</a>
	       </li> 
			<?php } ?>

	        
       </ul>
    </div>
  </div>
</nav>
	</section>
<!--end menubar-->
<?php 
$getnews=$user->getNewsUpdate();
?>
<!--categories-->
<section >
	<div class="container">
	<div><h2 id="tcno">welcome to technocrats polytechnic institute</h2></div>
	<div class="row">
		<div class="col-2">
			<h4>News Update:</h4>
		</div>
		<div class="col-10">

			<marquee behavior="scroll" direction="left"><span class="text-danger h3"> <span>
			<?php 
			if ($getnews) {
				echo $getnews->news;
			}
			?></marquee>
				
			</div>
		</div>


	<div class="row">
	<div class="col-12 col-md-2 wow bounceIn">
		
			<h3 id="updt">categories</h3>
			<div class="ctgr">
			<a href="#students.php"><h5>programs</h5></a>
			<a href="student.php"><h5>student info</h5></a>
			<a href="#students.php"><h5>teachers</h5><a>
			<a href="#students.php"><h5>descriptions</h5></a>
			<a href="#students.php"><h5>basic information</h5>
			</a>
			<a href="#students.php"><h5>our mission</h5>
			</a>
		</div>
	</div>

           
          <div id="fs1" class="col-12 col-md-10 wow bounceInRight">
               <div id="slider" class="carousel slide mt-4 mb-2" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="inc/img/student1.jpg" class="img-fluid max-width rounded" alt="First Slide">   
                    </div>
                    <div class="carousel-item">
                        <img src="inc/img/student2.jpg" class="img-fluid max-width d-block rounded" alt="Second Slide">   
                    </div>
                    <div class="carousel-item">
                        <img src="inc/img/student3.png" class="img-fluid max-width d-block rounded" alt="Third Slide">   
                    </div>

                </div>
                <a class="carousel-control-prev" href="#slider" data-slide="prev">
                    <span class="carousel-control-prev-icon carousel-control-prev-success"></span>
                </a>
                 <a class="carousel-control-next" href="#slider" data-slide="next">
                    <span class="carousel-control-next-icon carousel-control-prev-success"></span>
                </a>
            </div>
			</div>
            </div>
       </div>
</section>

	<?php include "inc/header/footer.php"; ?>
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