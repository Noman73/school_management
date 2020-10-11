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

<!--end menubar-->


<!--categories-->

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
<!--/menu-->

<div class="row">
	<!--navigation-->
	<div style="margin-top:57px;" class="col-12 col-md-2 ad-buttons">
		<?php include "inc/header/st_buttons.php"; ?>
    </div>
	<div style="margin-top:100px;" class=" col-12 col-md-10">
		<div class="container">
			<div class="">
			<?php
			if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['submit'])) {
				$send=$user->insertMsg($_POST);
			}

			if (isset($send)) {
				echo $send;
			}
			?>

	<!--start message show-->
	  <?php
		if (isset($_GET['id'])) {
			$reqid=$_GET['id'];
			$ownid=user_session::get('id');
			$sql="
				SELECT * from messaging 
				where senderid=:ownid
				and   reqid=:reqid 
				UNION
				SELECT * from messaging
				where   senderid=:reqid
				and     reqid=:ownid 
				order by id desc limit 10 ";
				$query=$user->selectMsg($sql,$reqid,$ownid);
				$get_query="select username,image from addstudents where id=$reqid";
				$get_username=$user->objSelect($get_query);
			?>
				
				<form class="w-50" style="margin:0 auto;" action="" method="POST">
					<p class="font-weight-bold text-center">
						<?php
							if (isset($get_username->username)) {
								echo $get_username->username;
							}
						?>
						<span><img style="width:40px;height:40px;" class="rounded-circle" src="uploads/<?php echo $get_username->image; ?>" alt=""></span>
					</p>
				<?php	if ($query) {
				foreach ($query as $data){
					if ($data['senderid']==$reqid and $data['reqid']==$ownid) {
						?>
						<p class="w-75"><?php echo $data['message']; ?></p>
				<?php }else {  ?>
						<p class="text-right user2"><?php echo $data['message']; ?></p>
					<?php } ?>
			
			<?php 	} } ?>

			<?php } ?> <!--end if condition-->


						<div class="form-group">
						<input type="hidden" name="req_id" value="<?php echo $reqid; ?>">
						<label for="messege"></label>
						<textarea class="form-control mt-0" name="msg" rows="2"></textarea>
					</div>
					<button class="btn btn-primary" type="submit" name="submit">send</button>
				</form>
			</div>
			
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


























		