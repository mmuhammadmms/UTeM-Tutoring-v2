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

$sus = $_SESSION['username'];
$_SESSION['page'] = 'Overview';


$sql3 = "select * from users where username = :us";
$stid3 = oci_parse($conn, $sql3);
oci_bind_by_name($stid3, ':us', $sus);
oci_execute($stid3);
$row3 = oci_fetch_row($stid3);
$name = $row3[1];
$type = $row3[4];
$uid = $row3[0];





					$sql4 = "BEGIN profiledetail ( '$uid' , :pname , :ptype , :pfollower , :pappointment , :panswer , :pnotes);end;";
	         $stid4 = oci_parse($conn, $sql4);
	          oci_bind_by_name($stid4, ':pname' , $pname , 15);
            oci_bind_by_name($stid4, ':ptype' , $ptime, 15);
					oci_bind_by_name($stid4, ':pfollower' , $pfollower , 10);
						oci_bind_by_name($stid4, ':pappointment' , $pappointment , 50);
						oci_bind_by_name($stid4, ':panswer' , $panswer , 10);
					oci_bind_by_name($stid4, ':pnotes' , $pnotes, 10);
					oci_execute($stid4);
















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
	<script src="js/bootstrap.min.js"></script>
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



					<?php include ('profilebar.php');?>















					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->

					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-9">
	            <div class="profile-content">

								<div class="col-xs-12 divider text-center ">

                <div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
									<span class="fa fa-users fa-2x" aria-hidden="true"></span>
                    <h2 class="counter"><strong><?php echo $pfollower;?></strong></h2>
                    <p><small>Followers</small></p>

                </div>
                <div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
									<i class="fas fa-handshake fa-2x"></i>
                    <h2 class="counter"><strong><?php echo $pappointment;?></strong></h2>
                    <p><small>Appointment Completed</small></p>

                </div>
                <div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
																	<i class="fas fa-check-square fa-2x"></i>
                    <h2 class="counter"><strong><?php echo $panswer;?></strong></h2>

                    <p><small>Question Answered</small></p>

                </div>
								<div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
									<i class="fas fa-book fa-2x"></i>
										<h2 class="counter"><strong><?php echo $pnotes;?></strong></h2>
										<p><small>Notes Shared</small></p>

								</div>




								<div style="margin-top: 100px" class="btn-pref btn-group btn-group-justified btn-group-lg " role="group" aria-label="...">
         <div class="btn-group" role="group">
             <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
                <span class="fa fa-question" aria-hidden="true"></span> <div class="hidden-xs">Question</div>
             </button>
         </div>
         <div class="btn-group" role="group">
             <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
                 <span class="fa fa-check-square" aria-hidden="true"></span><div class="hidden-xs">Answers</div>
             </button>
         </div>
         <div class="btn-group" role="group">
             <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
                <span class="fa fa-book" aria-hidden="true"></span> <div class="hidden-xs">Notes</div>
             </button>
         </div>
     </div>

         <div class="well">
       <div class="tab-content">
         <div class="tab-pane fade in active" id="tab1">
           <center><h3>Question</h3></center>
					 <br />

					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="1 April 2018">
					   <div class="col-sm-3">BITP 3233 - Database Programming</div>
					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
			bill, 2016 is incorrect ?
			a. It allows only Indian citizens for Surrogacy
			in India</div>
					 </div>

					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					   <div class="col-sm-3">BITP 2213 - Data Structure</div>
					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
			bill, 2016 is incorrect ?
			a. It allows only Indian citizens for Surrogacy
			in India</div>
					 </div>

					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					   <div class="col-sm-3">BITP 1332 - Programming II</div>
					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
			bill, 2016 is incorrect ?
			a. It allows only Indian citizens for Surrogacy
			in India</div>
					 </div>

					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
						 <div class="col-sm-3">BITP 1233 - Strategic System Planning</div>
						 <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
			bill, 2016 is incorrect ?
			a. It allows only Indian citizens for Surrogacy
			in India</div>
					 </div>





         </div>
         <div class="tab-pane fade in" id="tab2">
           <center><h3>Answer</h3></center>

					 <br />




					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="1 April 2018">
					 					   <div class="col-sm-3">BITP 3233 - Database Programming</div>
					 					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>

					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					 					   <div class="col-sm-3">BITP 2213 - Data Structure</div>
					 					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>

					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					 					   <div class="col-sm-3">BITP 1332 - Programming II</div>
					 					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>

					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					 						 <div class="col-sm-3">BITP 1233 - Strategic System Planning</div>
					 						 <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>

















         </div>
         <div class="tab-pane fade in" id="tab3">
           <center><h3>Notes</h3></center>

					 <br />

					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="1 April 2018">
					 					   <div class="col-sm-3">BITP 3233 - Database Programming</div>
					 					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>

					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					 					   <div class="col-sm-3">BITP 2213 - Data Structure</div>
					 					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>

					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					 					   <div class="col-sm-3">BITP 1332 - Programming II</div>
					 					   <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>

					 					 <div style="margin-bottom: 20px;" class="row2 hvr-float-shadow hvr-glow hvr-icon-pulse" data-toggle="tooltip" data-placement="top" title="25 March 2018">
					 						 <div class="col-sm-3">BITP 1233 - Strategic System Planning</div>
					 						 <div class="col-sm-9">Which among the following statements regarding the Surrogacy (Regulation)
					 			bill, 2016 is incorrect ?
					 			a. It allows only Indian citizens for Surrogacy
					 			in India</div>
					 					 </div>












         </div>
       </div>
     </div>
















            </div>

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

	<!-- //modal -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>



	$(document).ready(function() {
	$(".btn-pref .btn").click(function () {
	    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
	    // $(".tab").addClass("active"); // instead of this do the below
	    $(this).removeClass("btn-default").addClass("btn-primary");
	});
	});






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




$(document).on("click", ".open-AddBookDialog2", function () {
				 var rID = $(this).data('id');


							$.ajax
							({
								url: 'taskview.php',
								data : "&rid=" + rID ,
								cache: false,
								method:'POST',
								success: function(r)
								{
									$("#rdetail1").html(r);
								}
							});




});








	</script>
	<!-- //owl carousel -->


</body>

</html>
