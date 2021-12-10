<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

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



		<link rel="stylesheet" type="text/css" href="assets/styles/simditor.css" />
		<script type="text/javascript" src="assets/scripts/jquery.min.js"></script>
		<script type="text/javascript" src="assets/scripts/module.js"></script>
		<script type="text/javascript" src="assets/scripts/uploader.js"></script>
		<script type="text/javascript" src="assets/scripts/hotkeys.js"></script>
		<script type="text/javascript" src="assets/scripts/simditor.js"></script>
		<script type="text/javascript" src="assets/scripts/page-demo.js"></script>



<style>


#qform {
    display : none;
}









.profile-userpic2 img {
    float: none;
    margin: 0 auto;
    width: 60px;
    height: 70px;
    -webkit-border-radius: 50% !important;
    -moz-border-radius: 50% !important;
    border-radius: 50% !important;
}


.hvrclose:hover{
  box-shadow: 0 0 8px #E38500;
  color:#E38500;
}

.hvropen:hover{
  box-shadow: 0 0 8px green;
  color:green;
}

.lock{
	color:#E38500;
}

.open{
	color:#56C448;
}





</style>
















</head>

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

	<!--//banner -->
		<!-- about -->

	<!-- //about -->
	<!-- about-bottom -->

	<!-- //about-bottom -->
<!-- stats -->
<?php

$sid = $_GET['sid'];
include ('connect.php');
$sql3 = "select * FROM subject where subjectid = '$sid'";
$stid3 = oci_parse($conn, $sql3);
oci_execute($stid3);
$row3 = oci_fetch_row($stid3);
$sname = $row3[1];
$sid = $row3[0];






 ?>
	<!-- //stats -->
	<!-- services -->
<div class="services">
		<h3 class="heading-agileinfo"><?php echo $sid;?> - <?php echo $sname;?><span></span></h3>
	<div class="container">
		<div class="services-top-grids">

	<div class="col-md-6">
<center><a href="subjectq.php?sid=<?php echo $sid;?>"><button class="btn  heading-agileinfo hvr-rectangle-out" style="width:50%;">		<span  class="fas fa-question fa-3x" aria-hidden="true" ></span><br />Questions</button></a></center>
	</div>

		<div class="col-md-6">
<center><a href="subjectn.php?sid=<?php echo $sid;?>"><button class="btn  heading-agileinfo hvr-rectangle-out" style="width:50%;">		<span  class="fas fa-book fa-3x" aria-hidden="true" ></span><br />Notes</button></a></center>

		</div>
<br /><br />











			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //services -->

	<!-- feedback -->

	<!-- //feedback -->
<!-- news -->

	<!-- //news -->

	<!-- footer -->

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

	$( document ).ready( function() {
	    $( "#question" ).click( function() {
	        $( "#qform" ).toggle( 'fast' );
	    });
	});


		var editor = new Simditor({
		  textarea: $('#qeditor')
		  //optional options
		});

	</script>
	<!-- //owl carousel -->


</body>

</html>
