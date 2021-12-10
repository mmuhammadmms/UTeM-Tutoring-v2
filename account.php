<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<?php
include('connect.php');
session_start();
$_SESSION['page'] = 'Myaccount';
?>
<head>
	<title>UTeM-Tutoring</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="UTeM-Tutoring" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
	<link href="css/hover.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->


	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<style>




.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 60%;
  height: 80%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}














</style>

<body>
	<!-- header -->
	<div class="header">

		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.php">
							<h1><span class="fa fa-book" aria-hidden="true"></span>  UTeM-Tutoring<label>2018</label></h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<?php

					include ('navbar.php');
					 ?>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<!-- banner -->
	<div class="container" style="background:   #2f86ca ;">
	    <div class="row2 profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->

					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<?php



					include ("profilebar.php");
					 ?>
					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-9">

				<?php
				$uid = $_SESSION['uid'];
				include ('connect.php');
				$sql3 = "select * FROM users where userid = '$uid'";
				$stid3 = oci_parse($conn, $sql3);
				oci_execute($stid3);
				$row3 = oci_fetch_array($stid3);
				$name = $row3["NAME"];
				$email =  $row3["EMAIL"];
				$username = $row3["USERNAME"];
				$type = $row3["TYPE"];
				$password = $row3["PASSWORD"];











				 ?>
	            <div class="profile-content">
								<center><h2>My Account</h2></center>
								<form class="login100-form validate-form" action="updateprofile.php" method="post" enctype="multipart/form-data">


		 	 					<div class="wrap-input100 validate-input" data-validate="Name is required">
		 	 						<span class="label-input100">Full Name</span>
		 	 						<input class="input100" type="text" name="fname" placeholder="Name..." value="<?php echo $name;?>">
		 	 						<span class="focus-input100"></span>
		 	 					</div>

		 	 					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" >
		 	 						<span class="label-input100">Email</span>
		 	 						<input class="input100" type="text" name="femail" placeholder="Email addess..." value="<?php echo $email;?>" disabled>
		 	 						<span class="focus-input100"></span>
		 	 					</div>

		 	 					<div class="wrap-input100 validate-input" data-validate="Username is required" >
		 	 						<span class="label-input100">Username</span>
		 	 						<input class="input100" type="text" name="username" placeholder="Username..." value="<?php echo $username;?>" disabled>
		 	 						<span class="focus-input100"></span>
		 	 					</div>

								<div class="wrap-input100 " data-validate="Username is required">
									<span class="label-input100">About</span>
									<input class="input100" type="text" name="ftype" placeholder="Type..." value="<?php echo $type;?>">
									<span class="focus-input100"></span>
								</div>


		 	 					<div class="wrap-input100 validate-input" data-validate = "Password is required">
		 	 						<span class="label-input100">Password</span>
		 	 						<input class="input100" type="password" name="fpass" placeholder="*************" value="<?php echo $password;?>">
		 	 						<span class="focus-input100"></span>
		 	 					</div>


								<div class="form-group">
																	<span class="label-input100">Profile Picture</span>
									<input type="file"   name="uploadfile" placeholder="attach">
								</div>
		 	 					<div class="flex-m w-full p-b-33">



		 	 					</div>

		 	 					<div class="container-login100-form-btn">
		 	 						<div class="wrap-login100-form-btn">
		 	 							<div class="login100-form-bgbtn"></div>
		 	 							<button >
		 	 								Update
		 	 							</button>
		 	 						</div>

		 	 					</div>
		 	 				</form>

	            </div>
			</div>
		</div>
	</div>
<!-- //services -->

	<!-- feedback -->

	<!-- //feedback -->
<!-- news -->

	<!-- //news -->

	<!-- footer -->

	<div class="footer_w3ls">
		<div class="container">
					<div class="footer_bottom1">
						<p>© 2018 Instruction. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
					</div>
		</div>
	</div>
	<!-- //footer -->
<!-- modal -->
	<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Instruction</h4>
				</div>
				<div class="modal-body">
					<div class="agileits-w3layouts-info">
						<img src="images/g12.jpg" class="img-responsive" alt="" />
						<p>Duis venenatis, turpis eu bibendum porttitor, sapien quam ultricies tellus, ac rhoncus risus odio eget nunc. Pellentesque ac fermentum diam. Integer eu facilisis nunc, a iaculis felis. Pellentesque pellentesque tempor enim, in dapibus turpis porttitor quis. Suspendisse ultrices hendrerit massa. Nam id metus id tellus ultrices ullamcorper.  Cras tempor massa luctus, varius lacus sit amet, blandit lorem. Duis auctor in tortor sed tristique. Proin sed finibus sem</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script src="js/main.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- owl carousel -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({

				autoPlay: 3000, //Set AutoPlay to 3 seconds
				autoPlay: true,
				items: 3,
				itemsDesktop: [991, 2],
				itemsDesktopSmall: [414, 4]

			});
		});
	</script>
	<!-- //owl carousel -->


</body>

</html>
