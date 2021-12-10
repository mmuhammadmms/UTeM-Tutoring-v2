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
	<link rel="stylesheet" href="css/lightbox.css">




	<link rel="stylesheet" type="text/css" href="assets/styles/simditor.css" />
	<script type="text/javascript" src="assets/scripts/jquery.min.js"></script>
	<script type="text/javascript" src="assets/scripts/module.js"></script>
	<script type="text/javascript" src="assets/scripts/uploader.js"></script>
	<script type="text/javascript" src="assets/scripts/hotkeys.js"></script>
	<script type="text/javascript" src="assets/scripts/simditor.js"></script>
	<script type="text/javascript" src="assets/scripts/page-demo.js"></script>













<style>


#form1 {
    display : none;
}


#commentform {
    display : none;
}


.pressedup {
	color:blue;
}

.presseddown{
	color:red;
}

.none{
	color:black;
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


.profile-userpic3 img {
    float: none;
    margin: 0 auto;
    width: 30px;
    height: 35px;
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
<?php
if (isset($_POST['comment'])) {

		$userid = $_SESSION['uid'];


$sql = "INSERT INTO classcomment VALUES (sysdate , sysdate , :content , 'Show' , :cid , :userid   )";
$stmt = oci_parse($conn, $sql);

$cid = $_POST["cid"];





oci_bind_by_name($stmt, ':cid', $_POST["cid"] );
oci_bind_by_name($stmt, ':userid', $userid );
oci_bind_by_name($stmt, ':content', $_POST["content"] );
oci_execute($stmt);


/*
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Comment posted.')
window.location.href='class.php?cid=$cid';
</SCRIPT>");
*/

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

	$cid = $_GET['cid'];
	include ('connect.php');
	$sql3 = "select * FROM class C , users U where classid = '$cid' AND C.userid = U.userid";
	$stid3 = oci_parse($conn, $sql3);
	oci_execute($stid3);
	$row3 = oci_fetch_array($stid3);
	$cid = $row3["CLASSID"];
	$title = $row3["CLASSTITLE"];
	$content = $row3["CLASSCONTENT"];
	$cdate = $row3["DATESCHEDULE"];
	$ctime = $row3["TIMESCHEDULE"];
	$ownername = $row3["NAME"];
	$ppic = $row3["PICTURE"];
  $classpic = $row3["CLASSFILE"];
	$venue = $row3["VENUE"];
	$fees = $row3["FEES"];
	$capacity = $row3["CAPACITY"];
	$us = $row3["USERNAME"];
  $cuid = $row3["USERID"];
  $status = $row3["CLASSSTATUS"];
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


<div class="services">
		<a href="listclass.php" style="color:none"><h3 class="heading-agileinfo"><?php echo $title; ?> <span></span></h3></a>
<br />













		<script src="js/lightbox-plus-jquery.min.js"> </script>

	<div class="container">
		<div class="services-top-grids">









			<div class="modal fade" id="add" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">


							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="heading-agileinfo">Class Attendant List<span></span></h3>
						</div>




							<div class="modal-body">
								<table class="table table-striped table-hover table-bordered" >
									<th>

										<td>
											Name
										</td>
										<td>
											Username
										</td>
									</th>

									<?php
									$sql3 = "select * from attendance A , users U where A.userid = U.userid AND A.classid = '$cid'";
									$stid3 = oci_parse($conn, $sql3);
									oci_execute($stid3);

                  $i=1;
									while($row3 = oci_fetch_array($stid3,OCI_ASSOC))
									{

											$name = $row3['NAME'];
											$username = $row3['USERNAME'];
									 ?>


									<tr>
										<td>
										<center><?php echo $i;?></center>
										</td>
										<td>
											<?php echo $name;?>
										</td>
										<td>
											<a href=profile.php?us=<?php echo $username;?>><?php echo $username;?></a>
										</td>
									</tr>

								<?php $i++; } ?>

								</table>


						</div>

					</div>
				</div>
			</div>


















			<div class="well">

			 <br />

			 <div style="margin-bottom: 30px" class="row2 " >


				 <a href="profile.php?us=<?php echo $us;?>"><div class="col-sm-2 hvr-float-shadow" >

					 <div class="profile-userpic2 ">
						 <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
						 <center><?php echo $ownername;?></center>
					 </div>

				 </div></a>
				 <div class="col-sm-10">
					 <h2></h2>


<div class="col-sm-4 col-xs-6 gallery-grid">
	<div class="grid effect-apollo">
    <a class="example-image-link" href="class/<?php echo $classpic; ?>" data-lightbox="example-set" data-title="">
    <center><img src="class/<?php echo $classpic; ?>" width="180px" height="280px" /></center>


			<div class="figcaption">
				<p><?php echo $title;?></p>
			</div>
		</a>
	</div>
</div>



					 <h4 style=" text-decoration: underline;margin-bottom:2px">			Venue: <?php echo $venue;?></h4>
					 <h4 style=" text-decoration: underline;margin-bottom:2px">			Date: <?php echo $cdate;?></h4>
					 <h4 style=" text-decoration: underline;margin-bottom:2px">			Time: <?php echo $ctime;?></h4>
					 <h4 style=" text-decoration: underline;margin-bottom:2px">	<a data-toggle="modal" data-id="" title="" class="open-AddBookDialog2 " href="#add">		Capacity: <?php echo $pusers;?> / <?php echo $capacity;?></h4></a><br />
					 <h4 style=" text-decoration: underline;margin-bottom:2px">			Fees: <strong>RM <?php echo $fees;?></strong></h4><br /><br />

           <h4 style=" text-decoration: underline;margin-bottom:2px">			Status: <strong><?php echo $status;?></strong></h4><br /><br />
						<p style="font-size:13px">
							<?php echo $content;?>



						</p>
							<br /><br />



							<?php
							if(isset($_SESSION['role'])){
							 ?>
							<div class="col-sm-1 hvr-float-shadow"><center>


<a <?php if ($pups == 'Yes'){?>class="pressedup"  <?php }else{ ?> class="none" <?php } ?>href="voteclass.php?type=Up&cid=<?php echo $cid;?>">
							<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
							<h4><strong> <?php echo $pup;?></strong></h4>
						</div></a>

					<?php }else{
						?>

			<div class="col-sm-1 hvr-float-shadow"><center>
													<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
													<h4><strong> <?php echo $pup;?></strong></h4>
												</div>
						<?php
					}
					?>
							<div class="col-sm-1 hvr-float-shadow"><center>
							<span class="fa fa-comments fa-2x" aria-hidden="true" ></span>
							<h4><strong> <?php echo $pcomment;?></strong></h4>
							</center>


								</div>
								<div class="col-sm-1 hvr-float-shadow"><center>				<button type="button"   class="fa fa-users fa-2x" data-toggle="modal" data-id="" title="" class="open-AddBookDialog2 btn btn-primary " href="#add">
								<span class="" aria-hidden="true" ></span> </button>
								<h4><strong> <?php echo $pusers;?></strong></h4>
								</div>

								<div class="col-sm-1 hvr-float-shadow"><center>
								<span class="fa fa-eye fa-2x" aria-hidden="true" ></span>
								<h4><strong> <?php echo $pview;?></strong></h4>
								</div>

<br /><br /><Br /><br /><br /><br /><br />

<?php
if(isset($_SESSION['role'])){
?>

  <button id="signup" style="width:25%;margin-left:20px;" type="button" class="btn btn-success btn-sm">Comment</button>

<?php
  if( $pusers == $capacity){
    ?>
    	<button type="button"  style="float:left;width:35%" class="btn btn-warning btn-sm"  class=" btn btn-warning " >Class Full</button>
<?php

  }else{
  ?>

  <?php if ($pattend == 'Yes'){
  ?>
  <a href="attendclass.php?cid=<?php echo $cid;?>">	<button type="button"  style="float:left;width:35%" class="btn btn-warning btn-sm"  class=" btn btn-warning " >Cancel Attendance</button></a>

  <?php
}else {
?>
<a href="attendclass.php?cid=<?php echo $cid;?>">	<button type="button"  style="float:left;width:25%" class="btn btn-success btn-sm"  class=" btn btn-primary " >Attend Class</button></a>

<?php
}
  }



	}
if(isset($_SESSION['role'])){
  if ( $cuid == $_SESSION['uid'] || $_SESSION['role'] == 'Admin'){
 ?>
 <a href="deleteclass.php?cid=<?php echo $cid;?>"><button id="signup" style="margin-left: 20px;width:20%" type="button" class="btn btn-danger btn-sm">Delete Class</button></a>

 <?php
  }
}
  ?>




</div>



			 </div>




			</div>

			<form action=""  method="post"  id="form1">


				<div class="well2">
				<center><h3>Your Comment</h3></center>

				<br />
				<br />


				<div class="col-sm-2  hvr-float-shadow">

					<div class="profile-userpic2 ">
						<img src="profilepic/<?php echo   $_SESSION['pic'];?>" class="img-responsive" alt="">
						<center><?php echo $_SESSION['name'];?></center>
					</div>

				</div>
				<div class="col-sm-8">
					<h2></h2>
					<input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>">
					<textarea id="editor"name="content" placeholder="" autofocus></textarea>
				  <div id="preview"></div>


					<br />

					 <br /><br />
					 <button style="float:right" type="submit" name="comment" class="btn btn-success btn-sm">Post Comment</button>
				</div>


						    </form>
				</div>

<?php
$cid = $_GET['cid'];
$sql3 = "select  count(*) as count from classcomment where classid = '$cid'";
$stid3 = oci_parse($conn, $sql3);
oci_execute($stid3);
$row3 = oci_fetch_array($stid3,OCI_ASSOC);
$count = $row3['COUNT'];

$sql3 = "UPDATE class set classview = classview+1 where classid = '$cid'";
$stid3 = oci_parse($conn, $sql3);
oci_execute($stid3);

 ?>


				<br />
				<h2 style="margin-top:1%;float:left;"><?php echo $count;?> Comments</h2>
			<br /><br /><br />


<form id="commentsection" >

	<?php
	$sql9 = "select CC.userid , name , classcommenttime , username , picture , classcommentcontent , to_char( classcommentdate , 'DD/MM/YYYY') as cdate, to_char(classcommenttime, 'HH24:MI' ) as ctime from classcomment CC , users U where classid  = '$cid' and CC.userid = U.userid ORDER BY CC.classcommenttime ASC";
	$stid9 = oci_parse($conn, $sql9);
	oci_execute($stid9);

	$i=0;
	while($row9 = oci_fetch_array($stid9,OCI_ASSOC))
	{
		$i++;
		$name = $row9["NAME"];
    $causerid = $row9["USERID"];
		$content = $row9["CLASSCOMMENTCONTENT"];
		$ctime = $row9["CTIME"];
		$cdate = $row9["CDATE"];
    $ppic = $row9["PICTURE"];
    $username = $row9["USERNAME"];
    $cct = $row9["CLASSCOMMENTTIME"];
	 ?>

	 <div class="well2">


     <a href="profile.php?us=<?php echo $username;?>">
		 <div class="col-sm-2">

			 <div class="profile-userpic2">
				 <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
				 <center><?php echo $name;?></center>
			 </div>

		 </div>
   </a>
		 <div class="col-sm-8">
			 <h2></h2>

				<p style="font-size:13px">

					<?php echo $content;?>

				</p>
        <?php
        if ( $causerid == $_SESSION['uid'] || $_SESSION['role'] == 'Admin'){
       ?>
       <a href="deletecc.php?cid=<?php echo $cid;?>&cct=<?php echo $cct;?>"><button id="signup" style="width:20%" type="button" class="btn btn-danger btn-sm">Delete Comment</button></a>
       <br /><br /><br />
       <?php
        }


        ?>
				<br /><br />

</div>



	 </div>

	<?php } ?>
		</form>






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
	    $( "#signup" ).click( function() {
	        $( "#form1" ).toggle( 'fast' );
	    });
	});

	$( document ).ready( function() {
	    $( "#comment" ).click( function() {
	        $( "#commentform" ).toggle( 'fast' );
	    });
	});

	$( document ).ready( function() {
	    $( "#viewcomment" ).click( function() {
	        $( "#commentsection" ).toggle( 'fast' );
	    });
	});


	var editor = new Simditor({
	  textarea: $('#editor')
	  //optional options
	});


		var editor2 = new Simditor({
		  textarea: $('#editor2')
		  //optional options
		});

	</script>
	<!-- //owl carousel -->


</body>

</html>
