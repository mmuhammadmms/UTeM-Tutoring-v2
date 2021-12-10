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
$sus = $_GET['us'];


$sql3 = "select * from users where username = :us";
$stid3 = oci_parse($conn, $sql3);
oci_bind_by_name($stid3, ':us', $sus);
oci_execute($stid3);
$row3 = oci_fetch_row($stid3);
$name = $row3[1];
$type = $row3[4];
$uid = $row3[0];
$pic = $row3[7];





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
  width: 100px;
	margin-left: 50px;
  height: 130px;
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
					<?php
					include('connect.php');


					$sus = $_GET['us'];


					$sql3 = "select * from users where username = :us";
					$stid3 = oci_parse($conn, $sql3);
					oci_bind_by_name($stid3, ':us', $sus);
					oci_execute($stid3);
					$row3 = oci_fetch_row($stid3);
					$name = $row3[1];
					$type = $row3[4];
					$uid = $row3[0];
					$us = $row3[9];
					$ppic = $row3[7];
					$role = $row3[10];

					  ?>


					<div class="profile-sidebar">
					  <!-- SIDEBAR USERPIC -->
					  <div class="profile-userpic">
					    <img src="profilepic/<?php echo $pic;?>" class="img-responsive" alt="">
					  </div>
					  <!-- END SIDEBAR USERPIC -->
					  <!-- SIDEBAR USER TITLE -->
					  <div class="profile-usertitle">
					    <div class="profile-usertitle-name">
					      <?php echo $name;
									if ( $role == 'Admin'){
										echo " <br /> ( Admin )";
									}

								?>
					    </div>
					    <div class="profile-usertitle-job">
					      <?php echo $type;?>
					    </div>


					  </div>
					  <!-- END SIDEBAR USER TITLE -->
					  <!-- SIDEBAR BUTTONS -->
					  <div class="profile-userbuttons">
							<?php
							$userid = $_SESSION['uid'];

							$sql9 = "select count(userid) as count from follower where followerid = '$userid' AND userid = '$uid' " ;
							$stid9 = oci_parse($conn, $sql9);
							oci_execute($stid9);
							$row9 = oci_fetch_array($stid9,OCI_ASSOC);

							$count = $row9["COUNT"];

							if ( $count == 1){
							?>
							  	<a href="followp.php?fid=<?php echo $uid;?>&type=Unfollow&us=<?php echo $us;?>"><button type="button" class="btn btn-success btn-sm">Following</button></a>
							<?php
							}else{
							?>
							  	<a href="followp.php?fid=<?php echo $uid;?>&type=Follow&us=<?php echo $us;?>"><button type="button" class="btn btn-success btn-sm">Follow</button></a>
							<?php
							}
							?>

					    <a href=myinboxm.php?us=<?php echo $us;?>><button type="button" class="btn btn-success btn-sm">Message</button></a><br /><br />

					  </div>


						<?php
						if (  $_SESSION['role'] == 'Admin' && $role == 'Member'){
					 ?>
					 <center><a href="addadmin.php?uid=<?php echo $uid;?>&us=<?php echo $us;?>&set=Admin"><button id="signup" style="width:60%" type="button" class="btn btn-success btn-sm">Set as Admin</button></a></center>
					 <br />
					 <?php
				 }else if (  $_SESSION['role'] == 'Admin' && $role == 'Admin'){
					 ?>
					 <center><a href="addadmin.php?uid=<?php echo $uid;?>&us=<?php echo $us;?>&set=Member"><button id="signup" style="width:60%" type="button" class="btn btn-danger btn-sm">Remove as Admin</button></a></center>
					 <br />
				 <?php }
						?>

					  <center><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-id="" title="Add this item" class="open-AddBookDialog2 btn btn-primary " href="#register">REQUEST MEET-UP</button></center>



















					  <!-- END SIDEBAR BUTTONS -->
					  <!-- SIDEBAR MENU -->

					  <!-- END MENU -->
					</div>

					<div class="modal fade" id="register" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">


					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <h3 class="heading-agileinfo">REQUEST MEET-UP<span></span></h3>
					      </div>




					        <div class="modal-body">

					          <div style="margin-top: -80px;margin-bottom:100px" class="profile-content2">
					          <div class="col-sm-5">

					            <a href="profile.php?us=<?php echo $_SESSION['username'];?>" target="_blank">
					            <div class="profile-userpic2 hvr-float-shadow">
					              <center><img src="profilepic/<?php echo $_SESSION['pic'];?>" class="img-responsive" alt="">
					              <?php echo $_SESSION['name'];?></center>
					            </div>
					          </a>
					          </div>

					          <div class="col-sm-1">
					            <center>
					            <span class="fas fa-caret-right fa-4x" aria-hidden="true" ></span>
					            <h4 ><strong> Meet </strong></h4>
					            </center>

					         </div>
					          <div class="col-sm-5 open">

					            <a href="profile.php?us=<?php echo $sus;?>" target="_blank">
					            <div class="profile-userpic2 hvr-float-shadow">
					              <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
					              <center><?php echo $name;?></center>
					            </div>
					          </a>
					          </div>



					        </div>
















					<br /><br />
					          <form id="reg" role="form" method="post" action="appprocess.php">
					            <div class="form-group">
					              <input type="hidden" name="appuid" value="<?php echo $uid;?>">
					              <input type="text" class="form-control"  name="title" placeholder="Title" required>
					            </div>
					            <div class="form-group">

					              <input type="text" class="form-control"  name="content" placeholder="Description" required>
					            </div>



					            <div class="row2">
					              <div class="col-sm-3 col-md-6">
					                <div class="form-group">
					                  <center><label for="psw"><span class=""></span>Time</label></center>
					                  <input type="time" class="form-control" name="atime" required>
					                </div>
					              </div>
					              <div class="col-sm-9 col-md-6">
					                <div class="form-group">
					                  <center><label for="psw"><span class=""></span>Date</label></center>
					                  <input type="date" class="form-control" name="adate" min="<?php echo date('Y-m-d');?>" required>
					                </div>
					              </div>
					            </div>









					              <div class="form-group">

					                <input type="text" class="form-control"  name="venue" placeholder="Venue" required>
					              </div>



					      </div>
					      <div class="modal-footer">
					        <button style="float:right" type="submit"  class="btn btn-success">Request Meet-up

					        </button>

					      </div>
					      </form>
					    </div>
					  </div>
					</div>








					<div class="profile-usermenu">
					  <ul class="nav">
					    <li class="active">
					      <a href="profile.php?us=<?php echo $_GET['us'];?>">
					      <i class="glyphicon glyphicon-home"></i>
					      Overview </a>
					    </li>



					  </ul>
					</div>













					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->

					<!-- END MENU -->
				</div>
			</div>
			<div class="col-md-9">
	            <div class="profile-content">

								<div class="col-xs-12 divider text-center " style="margin-top:50px">

                <div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
									<span class="fa fa-users fa-4x" aria-hidden="true"></span>
                    <h2 ><strong><?php echo $pfollower;?></strong></h2>
                    <p><small>Followers</small></p>

                </div>
                <div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
									<i class="fas fa-handshake fa-4x"></i>
                    <h2 ><strong><?php echo $pappointment;?></strong></h2>
                    <p><small>Appointment Completed</small></p>

                </div>
                <div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
																	<i class="fas fa-check-square fa-4x"></i>
                    <h2 ><strong><?php echo $panswer;?></strong></h2>

                    <p><small>Question Answered</small></p>

                </div>
								<div class="col-xs-12 col-sm-3 emphasis hvr-pulse">
									<i class="fas fa-book fa-4x"></i>
										<h2 ><strong><?php echo $pnotes;?></strong></h2>
										<p><small>Notes Shared</small></p>

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
