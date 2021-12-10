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

.pressedup {
	color:blue;
}
.none{
	color:black;
}

#form1 {
    display : none;
}


#commentform {
    display : none;
}

#commentsection {
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
session_start();
include ('connect.php');
if (isset($_POST['comment'])) {

		$userid = $_SESSION['uid'];

$nid = $_POST["nid"];
$sql = "INSERT INTO notescomment VALUES (sysdate , sysdate , :content , :nid , :userid  , 'Show' )";
$stmt = oci_parse($conn, $sql);





oci_bind_by_name($stmt, ':nid', $_POST["nid"] );
oci_bind_by_name($stmt, ':userid', $userid );
oci_bind_by_name($stmt, ':content', $_POST["content"] );
oci_execute($stmt);



echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='notes.php?nid=$nid';
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

	include ('connect.php');
	if(!isset($_SESSION['role'])){
		$uid = '';
	}else{
			$uid = $_SESSION['uid'];
	}


	$nid = $_GET['nid'];

	$sql3 = "select * FROM Notes N , subject S , users U WHERE N.subjectid = S.subjectid and N.notesid = '$nid' AND N.userid = U.userid ";
	$stid3 = oci_parse($conn, $sql3);
	oci_execute($stid3);
	$row3 = oci_fetch_array($stid3);
	$sname = $row3["SUBJECTNAME"];
	$sid = $row3["SUBJECTID"];
	$status = $row3["NOTESSTATUS"];
	$title = $row3["NOTESTITLE"];
	$content = $row3["NOTESCONTENT"];
	$username = $row3["USERNAME"];
	$attach = $row3["NOTESFILE"];
	$nuserid = $row3["USERID"];

	$sql4 = "BEGIN notesdetail ( '$nid' , '$uid' ,  :pdate , :ptime , :pname , :ppic , :pview , :pcomment , :pup , :pups , :pdowns);end;";
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


<div class="services">
		<a href="subjectn.php?sid=<?php echo $sid;?>" style="color:none"><h3 class="heading-agileinfo"><?php echo $sid;?> - <?php echo $sname;?><span></span></h3></a>
	<div class="container">
		<div class="services-top-grids">




			<div class="well">

			 <br />

			 <div style="margin-bottom: 30px" class="row2 " >


				 <a href="profile.php?us=<?php echo $username;?>"><div class="col-sm-2 hvr-float-shadow" >

					 <div class="profile-userpic2 ">
						 <img src="profilepic/<?php echo   $ppic;?>" class="img-responsive" alt="">
						 <center><?php echo $pname;?></center>
					 </div>

				 </div></a>
				 <div class="col-sm-10">
					 <h2></h2>
					 <h4 style=" text-decoration: underline;margin-bottom:2px">
						 <?php echo $title;?>
					 </h4>
						<p style="font-size:13px">
							<?php echo $content;?>
						</p>
							<br /><br />
							<?php if ($attach != ''){
							?>
								<h4>Attachment: <a href="downloadn.php?filename=<?php echo $attach; ?>"><?php echo $attach;?></a></h4>
							<?php
						}?>
						<br />
						<?php
								if(isset($_SESSION['role'])){
						 	?>
							<button id="signup" style="width:30%" type="button" class="btn btn-success btn-sm">Comment</button>
							<?php
	 					 if ( $nuserid == $_SESSION['uid'] || $_SESSION['role'] == 'Admin'){
	 					?>
	 					<a href="deletenotes.php?nid=<?php echo $nid;?>&sid=<?php echo $sid;?>"><button id="signup" style="width:20%" type="button" class="btn btn-danger btn-sm">Delete Notes</button></a>
	 					<br /><br /><br />
	 					<?php
	 					 }
	 					 ?>

							<div class="col-sm-1 hvr-float-shadow"><center>
								<a <?php if ($pups == 'Yes'){?>class="pressedup"  <?php }else{ ?> class="none" <?php } ?>href="votenotes.php?type=Up&nid=<?php echo $nid;?>">
							<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
							<h4 ><strong> <?php echo $pup;?> </strong></h4>
							</div></a>
							<?php
						}else{
							?>
							<div class="col-sm-1 hvr-float-shadow"><center>

							<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
							<h4 ><strong> <?php echo $pup;?> </strong></h4>
							</div>
						<?php
						}
							 ?>

								<div class="col-sm-1 hvr-float-shadow"><center>



								<span class="fa fa-eye fa-2x" aria-hidden="true" ></span>
								<h4 class="counter"><strong> <?php echo $pview;?> </strong></h4>
								</div>





</div>



			 </div>




			</div>

			<form action=""  method="post"  id="form1">


				<div class="well2">
				<center><h3>Your Comment</h3></center>

				<br />
				<br />


				<div class="col-sm-2">

					<div class="profile-userpic2">
						<img src="profilepic/<?php echo   $_SESSION['pic'];?>" class="img-responsive" alt="">
						<center><?php echo $_SESSION['name'];?></center>
					</div>

				</div>
				<div class="col-sm-8">
					<h2></h2>

					<input type="hidden" name="nid" value="<?php echo $_GET['nid'];?>">
					<textarea id="editor"name="content" placeholder="" autofocus></textarea>
				  <div id="preview"></div>


					<br />

					 <br /><br />
					 <button style="float:right" type="submit" name="comment" class="btn btn-success btn-sm">Post Comment</button>
				</div>


						    </form>
				</div>




				<br />
				<?php
				$qid = $_GET['nid'];
				$sql3 = "select  count(*) as count from notescomment where notesid = '$nid'";
				$stid3 = oci_parse($conn, $sql3);
				oci_execute($stid3);
				$row3 = oci_fetch_array($stid3,OCI_ASSOC);
				$count = $row3['COUNT'];

				$sql4 = "UPDATE notes set notesview = notesview+1 where notesid = '$nid'";
				$stid4 = oci_parse($conn, $sql4);
				oci_execute($stid4);

				?>
			<h2 style="margin-top:1%;float:left;"><?php echo $count;?> Comments</h2>
			<br /><br /><br />


<form id="commentsection" >

			<div class="well3">
				<div class="col-sm-2">

					<div class="profile-userpic3">
						<img src="profilepic/<?php echo   $ppic?>" class="img-responsive" alt="">
						<center><?php echo $name;?></center>
					</div>

				</div>
				<div class="col-sm-8">
					<h2></h2>

					 <p style="font-size:13px">


						 <?php
						 echo $content;
						  ?>
					 </p>
</div>
			</div>
		</form>


			<form action="login2.php"  method="post"  id="commentform">


				<div class="well3">
				<center><h3>Your Comment</h3></center>

				<br />
				<br />


				<div class="col-sm-2">

					<div class="profile-userpic2">
						<img src="profilepic/<?php echo   $_SESSION['pic'];?>" class="img-responsive" alt="">
						<center><?php echo   $_SESSION['name'];?></center>
					</div>

				</div>
				<div class="col-sm-8">
					<h2></h2>

					<textarea id="editor2" name="comment" placeholder="" autofocus></textarea>
					<div id="preview"></div>


					<br />

					 <button style="float:right" type="submit" class="btn btn-success btn-sm">Post comment</button>
				</div>


								</form>



							</div>

							<?php
							$sql9 = "select name , NC.userid , picture , notesid , notescommenttime ,  username , notescommentcontent , to_char( notescommentdate , 'DD/MM/YYYY') as cdate, to_char(notescommenttime, 'HH24:MI' ) as ctime from notescomment NC , users U where notesid  = '$nid' and NC.userid = U.userid ORDER BY NC.notescommenttime ASC";
							$stid9 = oci_parse($conn, $sql9);
							oci_execute($stid9);

							$i=0;
							while($row9 = oci_fetch_array($stid9,OCI_ASSOC))
							{
								$i++;
								$name = $row9["NAME"];
								$username = $row9["USERNAME"];
								$content = $row9["NOTESCOMMENTCONTENT"];
								$ctime = $row9["CTIME"];
								$cdate = $row9["CDATE"];
								$ppic = $row9["PICTURE"];
								$nid = $row9["NOTESID"];
								$nct = $row9["NOTESCOMMENTTIME"];
								$puid = $row9["USERID"];

							 ?>
			<div class="well2">


				<a href="profile.php?us=<?php echo $username;?>">
				<div class="col-sm-2 hvr-float-shadow">

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

					 </p><br />

					 <br /><br />
					 <?php

					 if ( $puid == $_SESSION['uid'] || $_SESSION['role'] == 'Admin'){
					?>
					<a href="deletenc.php?nct=<?php echo $nct;?>&nid=<?php echo $nid;?>"><button id="signup" style="float:left;width:20%" type="button" class="btn btn-danger btn-sm">Delete Comment</button></a>

					<?php
					 }
					 ?>

	</div>


			</div>

			<?php
		}
		?>










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
