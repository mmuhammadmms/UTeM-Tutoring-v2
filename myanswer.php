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
$_SESSION['page'] = 'MyA';
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
<script defer src="js/fontawesome-all.js"></script>
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">


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

.profile-userpic2 img {
  float: none;
  margin: 0 auto;
  width: 30%;
  height: 50%;
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

height:750px;
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
	    <div class="row22 profile">
				<div class="col-md-3">
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->

						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->

						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->



						<?php include ('profilebar.php');?>















						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->

						<!-- END MENU -->
					</div>
				</div>
			<div class="col-md-9">
	            <div class="profile-content">
								<center><h3> My Answer</h3></center>
			 				 <br />





							 							 								<?php
							 							 								$uid = $_SESSION['uid'];
							 							 								$sql4 = "SELECT * FROM ANSWER A , QUESTION Q , SUBJECT S WHERE A.questionid = Q.questionid AND  Q.subjectid = S.subjectid AND A.userid = '$uid' ";
							 							 							  $stid4 = oci_parse($conn, $sql4);
							 							 							  oci_execute($stid4);


							 							 								while($row4 = oci_fetch_array($stid4,OCI_ASSOC))
							 							 								{


																							$content = $row4["ANSWERCONTENT"];
																							$status = $row4["ANSWERSTATUS"];
																							$aid = $row4['ANSWERID'];
																							$sid = $row4['SUBJECTID'];
																							$sname = $row4['SUBJECTNAME'];
																							$qid = $row4['QUESTIONID'];



																										$sql5 = "BEGIN answerdetail ( '$aid' , '$uid' , :pup , :pdown , :pcomment , :pname , :ppic , :pdate , :ptime , :pups , :pdowns);end;";
																										$stid5 = oci_parse($conn, $sql5);


																										oci_bind_by_name($stid5, ':pup' , $pup , 10);
																										oci_bind_by_name($stid5, ':pdown' , $pdown , 50);
																										oci_bind_by_name($stid5, ':pcomment' , $pcomment , 10);
																										oci_bind_by_name($stid5, ':pname' , $pname , 10);
																										oci_bind_by_name($stid5, ':ppic' , $ppic, 50);
																										oci_bind_by_name($stid5, ':pdate' , $pdate , 15);
																										oci_bind_by_name($stid5, ':ptime' , $ptime, 15);
																										oci_bind_by_name($stid5, ':pups' , $pups , 15);
																										oci_bind_by_name($stid5, ':pdowns' , $pdowns, 15);
																										oci_execute($stid5);
							 																?>

<a href="question.php?qid=<?php echo $qid;?>" style="color:black" target="_blank">
			 				 <div style="margin-bottom: 20px;width:100%" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="1 April 2018">
								 <div class="col-sm-2"><center>
								 <span class="fa fa-clock fa-2x" aria-hidden="true" ></span>
								 <h5> <?php echo $ptime;?> <br /><?php echo $pdate;?> </h5>
								 </center>
								 </div>

								 <div class="col-sm-2"><?php echo $sid;?> - <?php echo $sname;?></div>
			 					 <div class="col-sm-6">
									 <?php echo $content;?>
								 </div>
					<div class="col-sm-1"><center>
<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
<h4 class="counter"><strong> <?php echo $pup;?></strong></h4>
</center>
					</div>
					<div class="col-sm-1"><center>
<span class="fa fa-comments fa-2x" aria-hidden="true" ></span>
<h4 class="counter"><strong><?php echo $pcomment;?></strong></h4>
</center>
					</div>
			 				 </div>
</a>
<?php } ?>



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
	</script>
	<!-- //owl carousel -->


</body>

</html>
