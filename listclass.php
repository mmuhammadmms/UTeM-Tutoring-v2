<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<?php
if(!isset($_SESSION['role'])){
  			$uid = '';
}
else{
	$uid = $_SESSION['uid'];
}
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

	<!-- //stats -->
	<!-- services -->
<div class="services">
		<h3 class="heading-agileinfo">Classes<span></span></h3>
		<div  class="col-md-12">
			<div class="col-md-4"></div>


			</div>
<br /><br />
	<div class="container">
		<div class="services-top-grids">



			<?php
			include ('connect.php');
if (!isset($_SESSION)) session_start();
			$sql3 = "select * from class where classstatus NOT IN ('Cancel' , 'Delete')";
			$stid3 = oci_parse($conn, $sql3);
			oci_execute($stid3);

			while($row3 = oci_fetch_array($stid3,OCI_ASSOC))
			{

				$cid = $row3["CLASSID"];
				$title = $row3["CLASSTITLE"];
        $classpic = $row3["CLASSFILE"];
				$sql4 = "BEGIN classdetail(:cid ,  '$uid' , :pup  , :pcomment , :pusers ,  :pview , :pups , :pdowns , :pattend );end;";
				$stid4 = oci_parse($conn, $sql4);
				oci_bind_by_name($stid4, ':cid' , $cid);
				oci_bind_by_name($stid4, ':pup' , $pup);
				oci_bind_by_name($stid4, ':pcomment' , $pcomment);
				oci_bind_by_name($stid4, ':pusers' , $pusers);
				oci_bind_by_name($stid4, ':pview' , $pview);
				oci_bind_by_name($stid4, ':pups' , $pups , 15);
				oci_bind_by_name($stid4, ':pdowns' , $pdowns, 15);
				oci_bind_by_name($stid4, ':pattend' , $pattend);
				oci_execute($stid4);
			?>

			<a href="class.php?cid=<?php echo $cid;?>">
			<div class="col-md-4 hvr-grow-shadow">
				<div class="grid1 ">
								<img src="class/<?php echo $classpic;?>" width="200px" height="200px" />

					<br /><br />
					<h2><?php echo $title;?></h2>

					<br />






				</div></a><br />

				<div class="col-sm-3 "><center>
				<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
				<h4 ><strong> <?php echo $pup;?></strong></h4>
				</div>

				<div class="col-sm-3"><center>
				<span class="fa fa-comments fa-2x" aria-hidden="true" ></span>
				<h4 ><strong> <?php echo $pcomment;?> </strong></h4>
				</center>


					</div>
					<div class="col-sm-3"><center>
					<span class="fa fa-users fa-2x" aria-hidden="true" ></span>
					<h4 ><strong> <?php echo $pusers;?> </strong></h4>
					</div>

					<div class="col-sm-3"><center>
					<span class="fa fa-eye fa-2x" aria-hidden="true" ></span>
					<h4 ><strong> <?php echo $pview;?> </strong></h4>
					</div>


			</div>

		<?php } ?>


















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
	</script>
	<!-- //owl carousel -->


</body>

</html>
