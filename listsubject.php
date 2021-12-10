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
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">


</head>




<?php


	include ('connect.php');


	if (isset($_POST['add'])) {



	$sql = "INSERT INTO subject VALUES (:subid , :subname , :subcategory)";
	$stmt = oci_parse($conn, $sql);

	oci_bind_by_name($stmt, ':subid' , $_POST["subid"]);
	oci_bind_by_name($stmt, ':subname', $_POST["subname"] );
	oci_bind_by_name($stmt, ':subcategory', $_POST["subcategory"] );


	oci_execute($stmt);


	echo ("<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Subect Added.')
 window.location.href='listsubject.php';
 </SCRIPT>");


}

?>

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
		<h3 class="heading-agileinfo">List Subjects<span></span></h3>

		<?php
		if(isset($_SESSION['role'])){
		if ( $_SESSION['role'] == 'Admin'){
		 ?>
		<center><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-id="" title="" class="open-AddBookDialog2 btn btn-primary " href="#add">Add Subject</button></center>
		<br />
		<br />
		<?php
	}
} ?>



		<div class="modal fade" id="add" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">


		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h3 class="heading-agileinfo">Add New Subject<span></span></h3>
		      </div>




		        <div class="modal-body">



		          <form id="reg" role="form" method="post" action="">
		            <div class="form-group">

		              <input type="text" class="form-control" id="username" name="subname" placeholder="Subject Name" required>
		            </div>
		            <div class="form-group">

		              <input type="text" class="form-control" id="email" name="subid" placeholder="Subject ID" required>
		            </div>

								<div class="form-group">

		              <input type="text" class="form-control" id="email" name="subcategory" placeholder="Subject Category" required>
		            </div>





		      </div>
		      <div class="modal-footer">
		        <button style="float:right" type="submit" name="add" class="btn btn-success">Add Subject

		        </button>

		      </div>
		      </form>
		    </div>
		  </div>
		</div>



















		<div  class="col-md-12">
			<div class="col-md-4"></div>




			</div>



		<br /><br />

	<div class="container">
		<div class="services-top-grids"><a href="subject.php">


			<?php

			$sql3 = "select * from subject";
		  $stid3 = oci_parse($conn, $sql3);
		  oci_execute($stid3);


			while($row3 = oci_fetch_array($stid3,OCI_ASSOC))
			{

				$sid = $row3["SUBJECTID"];
				$sname = $row3["SUBJECTNAME"];
				$sql4 = "BEGIN subjectdetail(:sid , :question , :panswer , :pcomment , :pview);end;";
				$stid4 = oci_parse($conn, $sql4);
				oci_bind_by_name($stid4, ':sid' , $sid);
				oci_bind_by_name($stid4, ':question' , $question);
				oci_bind_by_name($stid4, ':panswer' , $panswer);
				oci_bind_by_name($stid4, ':pcomment' , $pcomment);
				oci_bind_by_name($stid4, ':pview' , $pview);
				oci_execute($stid4);
 			?>
			<a style="color:black" href="subject.php?sid=<?php echo $sid;?>">
				<div class="col-md-4 hvr-grow-shadow">
					<div class="grid1 ">
						<i class="fa fa-book" aria-hidden="true"></i>
						<h5><?php echo $sid;?></h5><br />
						<h2><?php echo $sname;?></h2>


					</div>

								</a>

					<div style="margin-top:5px">

						<div class="col-sm-3 "><center>
						<span class="fa fa-question fa-2x" aria-hidden="true" ></span>Questions
						<h4><strong> <?php echo $question;?> </strong></h4>
						</div>

						<div class="col-sm-3"><center>
						<span class="fa fa-book fa-2x" aria-hidden="true" ></span>Notes
						<h4><strong> <?php echo $panswer;?> </strong></h4>
						</center>


							</div>
							<div class="col-sm-3"><center>
							<span class="fa fa-comments fa-2x" aria-hidden="true" ></span>Comments
							<h4><strong> <?php echo $pcomment;?> </strong></h4>
							</div>

							<div class="col-sm-3"><center>
							<span class="fa fa-eye fa-2x" aria-hidden="true" ></span>Views
							<h4><strong> <?php echo $pview;?> </strong></h4>
							</div></div>

							<br /><br />

				</div>

			<?php
		} ?>




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
