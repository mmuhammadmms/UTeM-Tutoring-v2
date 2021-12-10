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


.hvrClosed:hover{
  box-shadow: 0 0 8px #E38500;
  color:#E38500;
}

.hvrOpen:hover{
  box-shadow: 0 0 8px green;
  color:green;
}

.lock{
	color:#E38500;
}

.open{
	color:#56C448;
}

#Closed{
	background-color:#E38500;
	color:white;

}

#Open{
background-color:#56C448;
color:white;
}


</style>














<?php

if(!isset($_SESSION['role'])){
  			$uid = '';
}

else{

	$uid = $_SESSION['uid'];
}
 ?>





</head>

<?php


	include ('connect.php');
	session_start();
	if (isset($_POST['post'])) {

			$userid = $_SESSION['uid'];


			if ($_FILES['uploadfile']['name'] == ''){
				$pathname = '';
			}else{
				$path  = $_FILES['uploadfile']['tmp_name'];
				$pathname =  $_FILES['uploadfile']['name'];
				move_uploaded_file($path,"question/$pathname");
			}



	$sql = "INSERT INTO question VALUES (DEFAULT , sysdate , sysdate , :title , :content , 'Open' , :fileupload , 0 , :sid , :userid )";
	$stmt = oci_parse($conn, $sql);



	$sid = $_POST["sid"];

	oci_bind_by_name($stmt, ':title' , $_POST["title"]);
	oci_bind_by_name($stmt, ':content', $_POST["content"] );
		oci_bind_by_name($stmt, ':fileupload', $pathname );
	oci_bind_by_name($stmt, ':sid', $_POST["sid"] );
	oci_bind_by_name($stmt, ':userid', $userid );
	oci_execute($stmt);


	echo ("<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Question posted.')
 window.location.href='subjectq.php?sid=$sid';
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
<div class="services">
		<a href="subject.php?sid=<?php echo $sid;?>"><h3 class="heading-agileinfo"><?php echo $sid;?> - <?php echo $sname;?><span></span></h3></a>
	<div class="container">
		<div class="services-top-grids">

			<div  class="col-md-12">
				<div class="col-md-4"></div>


				</div>
<br /><br />


<?php
	if(isset($_SESSION['role'])){
 ?>
<center><button type="submit" id="question" class="btn  heading-agileinfo hvr-pulse-grow">Ask Question</button></center>
<?php }
?>




<form action=""  method="post"  id="qform" enctype="multipart/form-data">


	<div class="well2">
	<center><h3>Your Question</h3></center>

	<br />
	<br />

	<div class="col-sm-2">

		<div class="profile-userpic2">
			<img src="profilepic/<?php echo   $_SESSION['pic'];?>" class="img-responsive" alt="">
			<center><?php echo $_SESSION['name'] ;?></center>
		</div>

	</div>
	<div class="col-sm-8">
		<h2></h2>

			<input type="text" name="title" class="form-control" placeholder="Question Title" required/>
			<br />
			<input type="hidden" name="sid" value="<?php echo $_GET['sid'];?>">
		<textarea id="qeditor" name="content" placeholder="Question Description" autofocus required></textarea>
		<div id="preview"></div>


		<br />
		<input type="file" name="uploadfile" />
		 <br /><br />
		 <button style="float:right" type="submit" name="post" class="btn btn-success btn-sm">Post Question</button>
	</div>

</div>
					</form>


















			<div class="profile-content">


				<?php

			$sid = $_GET['sid'];
			$sql3 = "select * from question where subjectid = '$sid' and questionstatus != 'Delete' ORDER BY QUESTIONTIME DESC";
			$stid3 = oci_parse($conn, $sql3);
			oci_execute($stid3);


			while($row3 = oci_fetch_array($stid3,OCI_ASSOC))
			{
				$title = $row3["QUESTIONTITLE"];
				$content = $row3["QUESTIONCONTENT"];
				$status = $row3["QUESTIONSTATUS"];
				$view = $row3["QUESTIONVIEW"];
				$date = $row3["QUESTIONDATE"];
				$time = $row3["QUESTIONTIME"];
				$qid = $row3['QUESTIONID'];



				$sql4 = "BEGIN questiondetail ( '$qid' , :uname , :pic , :pview , :answer , :comment , :pdate , :ptime);end;";
				$stid4 = oci_parse($conn, $sql4);

				oci_bind_by_name($stid4, ':uname' , $pname , 10);
				oci_bind_by_name($stid4, ':pic' , $ppic , 50);
				oci_bind_by_name($stid4, ':pview' , $pview , 10);
				oci_bind_by_name($stid4, ':answer' , $panswer , 10);
				oci_bind_by_name($stid4, ':comment' , $pcomment, 10);
				oci_bind_by_name($stid4, ':pdate' , $pdate , 15);
				oci_bind_by_name($stid4, ':ptime' , $ptime, 15);
				oci_execute($stid4);




			?>





	<a href="question.php?qid=<?php echo $qid;?>">
			 <div style="margin-bottom: 30px" class="row hvr-float-shadow hvr-glow hvr-icon-pulse hvr<?php echo $status;?>" data-toggle="tooltip" data-placement="top" title="2 hours ago">
				 <center><h3 id="<?php echo $status;?>"><?php echo $status;?></h3></center>
			<div class="col-sm-1 ">
				<center >	<span class="fa fa-clock fa-2x" aria-hidden="true" ></span>
 <?php echo $ptime;?><br /><?php echo $pdate;?>
 </center>
				 </div>

				 <div class="col-sm-2">

					 <div class="profile-userpic2">
						 <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
						 <center><?php echo $pname;?></center>
					 </div>

				 </div>
				 <div class="col-sm-6">
					 <h2></h2>
					 <h4 style=" text-decoration: underline;margin-bottom:2px">
						 <?php echo $title;?>
					 </h4>
						<p style="font-size:13px">
							<?php echo $content;?>
						</p>
</div>
	<div class="col-sm-1"><center>
	<span class="fa fa-eye fa-2x" aria-hidden="true" ></span>
	<h4><strong> <?php echo $pview;?> </strong></h4>
	</center>
	</div>
	<div class="col-sm-1"><center>
	<span class="fa fa-check fa-2x" aria-hidden="true" ></span>
	<h4 ><strong> <?php echo $panswer;?> </strong></h4>
	</center>
	</div>
	<div class="col-sm-1"><center>
	<span class="fa fa-comments fa-2x" aria-hidden="true" ></span>
	<h4><strong> <?php echo $pcomment;?> </strong></h4>
	</center>
	</div>


			 </div>
	</a>

<?php
} ?>



			</div>












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
