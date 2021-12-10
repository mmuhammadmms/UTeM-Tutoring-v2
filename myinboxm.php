<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<?php
	include ('connect.php');
	session_start();
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
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">


		<link rel="stylesheet" type="text/css" href="assets/styles/simditor.css" />
		<script type="text/javascript" src="assets/scripts/jquery.min.js"></script>
		<script type="text/javascript" src="assets/scripts/module.js"></script>
		<script type="text/javascript" src="assets/scripts/uploader.js"></script>
		<script type="text/javascript" src="assets/scripts/hotkeys.js"></script>
		<script type="text/javascript" src="assets/scripts/simditor.js"></script>
		<script type="text/javascript" src="assets/scripts/page-demo.js"></script>

</head>
<?php

if (isset($_POST['send'])) {

		$userid = $_SESSION['uid'];

							$sql3 = "select * from users where username = :us";
							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':us', $_POST['username']);
							oci_execute($stid3);
							$row3 = oci_fetch_row($stid3);
							$us = $_POST['username'];
							$uid = $row3[0];


$sql = "INSERT INTO messages VALUES (DEFAULT, :toid , :content , sysdate , sysdate , 'No' , :userid )";
$stmt = oci_parse($conn, $sql);

$desc =  $_POST['content'] ;

oci_bind_by_name($stmt, ':toid' , $uid);
oci_bind_by_name($stmt, ':content', $desc  );
oci_bind_by_name($stmt, ':userid', $userid );
oci_execute($stmt);

/*
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Message sended.')
window.location.href='myinboxm.php?us=$us';
</SCRIPT>");
*/

}?>
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

.profile-userpic2 img {
  float: none;
  margin: 0 auto;
  width: 100%;
  height: 100%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}


.profile-userpic3 img {
  float: none;
  margin: 0 auto;
  width: 10%;
  height: 20%;
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
	 height:450px;
	 overflow-y:scroll
}




.chatleft{
	border: 2px solid #dedede;
	background-color: #f1f1f1;
	border-radius: 5px;

}


.chat{

	border: 2px solid #dedede;

	border-radius: 5px;
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

					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->

					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->

					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<?php



					include ("profilebar.php");
					 ?>
					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-9">
	            <div class="profile-content">
								<center><h3> My Inbox<br /><br />Messages</h3></center>
								<?php


													$sql3 = "select * from users where username = :us";
													$stid3 = oci_parse($conn, $sql3);
													oci_bind_by_name($stid3, ':us', $_GET['us']);
													oci_execute($stid3);
													$row3 = oci_fetch_row($stid3);
													$name = $row3[1];

													$type = $row3[4];
													$uid = $row3[0];
													$us = $row3[9];
													$ppic = $row3[7];





								?>

								<a href="profile.php?us=<?php echo $us;?>">

								<div class="profile-userpic3" >
									<img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="" >
									<center><?php echo $name;?></center>
								</div>
								</a>
			 				 <br />


							 <div>





								 <?php
								 $userid = $_SESSION['uid'];

						 		$sql4 = " select * from messages where toid IN ( '$userid' , '$uid' ) AND userid IN ( '$userid' , '$uid' ) ORDER BY messagetime ASC";
						 		$stid4 = oci_parse($conn, $sql4);
						 		oci_execute($stid4);

						 		while($row4 = oci_fetch_array($stid4,OCI_ASSOC))
						 		{

						 			$content = $row4["MESSAGEDESC"];
									$mid = $row4['MESSAGEID'];

												$sql5 = "BEGIN messagedetail ( :mid , :userid , :ptoid , :pdesc , :pdate  , :ptime , :pname , :ppic , :pusername , :ptype);end;";
												$stid5 = oci_parse($conn, $sql5);

												oci_bind_by_name($stid5, ':mid' , $mid , 15);
												oci_bind_by_name($stid5, ':userid' , $userid , 15);
												oci_bind_by_name($stid5, ':ptoid' , $ptoid , 15);
												oci_bind_by_name($stid5, ':pdesc' , $pdesc , 1000);
												oci_bind_by_name($stid5, ':pdate' , $pdate , 15);
												oci_bind_by_name($stid5, ':ptime' , $ptime, 15);
												oci_bind_by_name($stid5, ':pname' , $pname, 30);
												oci_bind_by_name($stid5, ':ppic' , $ppic , 30);
												oci_bind_by_name($stid5, ':pusername' , $pusername , 30);
												oci_bind_by_name($stid5, ':ptype' , $ptype, 10);
												oci_execute($stid5);


												if ($ptype == 'left'){

												?>

												<div style="margin-bottom: 20px;width:70%;margin-top:5px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse chat" >


												<div class="col-sm-2">


													<div class="profile-userpic2">
														<img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
														<center></center>
													</div>

												</div>
												<div class="col-sm-10">
													<?php echo $pdesc;?>

								 <p style="float:right;margin-top:23px"><strong><?php echo $ptime;?> - <?php echo $pdate;?></strong></p>
							 </div>


											</div>
											<?php
												}else{
													?>


																			 <div style="float:right;margin-bottom: 20px;width:70%" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse chatleft" >



																				 <div style="text-align:left;margin-top:5px;" class="col-sm-10">
																					 <?php echo $pdesc;?>

																			<p style="text-align: left;margin-top:23px"><strong><?php echo $ptime;?> - <?php echo $pdate;?></strong></p>
																			</div>
																			<div class="col-sm-2">


																				<div class="profile-userpic2">
																					<img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
																					<center></center>
																				</div>

																			</div>


																			 </div>

																			 <?php

												}
									 } ?>

































	            </div>










			</div>

			<div style="margin-top: 28px;" class="row2  chatleft" >
		 <div class="col-sm-2">



		 </div>
		 <div class="col-sm-10">
			 <form action="" method="post">
			 <h2></h2>
			 <input type="hidden" name="username" value="<?php echo $_GET['us'];?>">
			 <textarea id="editor2" name="content" placeholder="" autofocus required></textarea>
			 <div id="preview"></div>


			 <br />

				<button style="float:right" type="submit" name="send" class="btn btn-success btn-sm">Send message</button>
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
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
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

		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
});



		var editor2 = new Simditor({
		  textarea: $('#editor2')
		  //optional options
		});


	</script>
	<!-- //owl carousel -->


</body>

</html>
