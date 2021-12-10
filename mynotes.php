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
$_SESSION['page'] = 'MyN';
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
 	<script type="text/javascript" src="assets/scripts/jquery.min.js"></script>
	<script type="text/javascript" src="assets/scripts/module.js"></script>
	<script type="text/javascript" src="assets/scripts/uploader.js"></script>
	<script type="text/javascript" src="assets/scripts/hotkeys.js"></script>
	<script type="text/javascript" src="assets/scripts/simditor.js"></script>
	<script type="text/javascript" src="assets/scripts/page-demo.js"></script>

	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">


</head>
<script>


$(document).on("click", ".notesdialog", function () {

				 var nID = $(this).data('id');




							$.ajax
							({
								url: 'notesdetail.php',
								data : "&nid=" + nID ,
								cache: false,
								method:'POST',
								success: function(r)
								{
									$("#ndetail").html(r);
								}
							});




});


$(document).on("click", ".editnotesdialog", function () {

				 var nID = $(this).data('id');




							$.ajax
							({
								url: 'editnotes.php',
								data : "&nid=" + nID ,
								cache: false,
								method:'POST',
								success: function(r)
								{
									$("#editdetail").html(r);
								}
							});




});




</script>
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

height:750px;
overflow-y: scroll;
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
	            <div class="profile-content">
								<center><h2>My Notes</h2></center>
				   <br /><br />





					 					<div class="modal fade" id="notesdetail" role="dialog">
					 						<div class="modal-dialog modal-lg">

					 							<!-- Modal content-->
					 							<div class="modal-content">


					 									<div class="modal-header">
					 										<button type="button" class="close" data-dismiss="modal">&times;</button>
					 										<h3 class="heading-agileinfo">Notes Detail<span></span></h3>
					 								</div>

					 									<div class="modal-body">

					 										<div class="" id="ndetail">
					 											 <!-- Records will be displayed here -->
					 										</div>










					 								</div>
					 								<div class="modal-footer">


					 								</div>

					 							</div>
					 						</div>
					 					</div>


										<div class="modal fade" id="editnotes" role="dialog">
										  <div class="modal-dialog modal-lg">

										    <!-- Modal content-->
										    <div class="modal-content">


										        <div class="modal-header">
										          <button type="button" class="close" data-dismiss="modal">&times;</button>
										          <h3 class="heading-agileinfo">Edit Notes<span></span></h3>
										      </div>

										        <div class="modal-body">

										          <div class="" id="editdetail">
										             <!-- Records will be displayed here -->
										          </div>










										      </div>
										      <div class="modal-footer">


										      </div>

										    </div>
										  </div>
										</div>








					 <?php
					 $uid = $_SESSION['uid'];

				 							$sql3 = "select * from notes N , subject S where userid = '$uid' AND N.subjectid = S.subjectid AND N.notesstatus != 'Delete'";
				 							$stid3 = oci_parse($conn, $sql3);
				 							oci_execute($stid3);


				 							while($row3 = oci_fetch_array($stid3,OCI_ASSOC))
				 							{
				 								$title = $row3["NOTESTITLE"];
				 								$content = $row3["NOTESCONTENT"];
				 								$status = $row3["NOTESSTATUS"];
				 								$view = $row3["NOTESVIEW"];
				 								$date = $row3["NOTESDATE"];
				 								$time = $row3["NOTESTIME"];
				 								$nid = $row3['NOTESID'];
												$sid = $row3['SUBJECTID'];
												$sname = $row3['SUBJECTNAME'];


				 								$sql4 = "BEGIN notesdetail ( '$nid' , '$uid' , :pdate , :ptime , :pname , :ppic , :pview , :pcomment , :pup , :pups , :pdowns);end;";
				 								$stid4 = oci_parse($conn, $sql4);

				 								oci_bind_by_name($stid4, ':pdate' , $pdate , 15);
				 								oci_bind_by_name($stid4, ':ptime' , $ptime, 15);
				 								oci_bind_by_name($stid4, ':pname' , $pname , 10);
				 								oci_bind_by_name($stid4, ':ppic' , $ppic , 50);
				 								oci_bind_by_name($stid4, ':pview' , $pview , 10);
				 								oci_bind_by_name($stid4, ':pcomment' , $pcomment, 10);
				 								oci_bind_by_name($stid4, ':pup' , $pup , 10);
												oci_bind_by_name($stid4, ':pups' , $pups, 15);
												oci_bind_by_name($stid4, ':pdowns' , $pdowns, 15);
				 								oci_execute($stid4);


					 	?>



 										 <a style="color:black" data-toggle="modal" data-id="<?php echo $nid;?>" class="notesdialog" href="#notesdetail">
 																		<div style="margin-bottom: 30px;width:100%" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="1 April 2018">

 																			<div class="col-sm-2"><center>
 																			<span class="fa fa-clock fa-2x" aria-hidden="true" ></span>
 																			<h5><?php echo $ptime;?><br /><?php echo $pdate;?></h5>
 																			</center>
 																			</div>

 																			<div class="col-sm-2"><center><?php echo $sid;?> - <?php echo $sname;?></center></div>
 																			<div class="col-sm-5">




 																				<h4 style=" text-decoration: underline;margin-bottom:2px"><?php echo $title;?> </h4>
 																				 <p style="font-size:13px">
																					 <?php echo $content;?>
																				 </p>


 														 </div>






 																		</div>
 										 </a>

									 <?php }
									 ?>
































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

		var editor2 = new Simditor({
			textarea: $('#editor2')
			//optional options
		});
	</script>
	<!-- //owl carousel -->


</body>

</html>
