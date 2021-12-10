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

	<script src="js/jquery.js"></script>
	<script src="js/js.js"></script>



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

.Closed{
	background-color:#E38500;
}

.Open{
	background-color:#56C448
}



.comments{
	width: 100%;
	height:400px;
	overflow-y:auto;
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

</style>
















</head>
<?php


	include ('connect.php');
	session_start();

	if(!isset($_SESSION['uid'])){
	  			$userid = '';

	}else{

		$userid = $_SESSION['uid'];

	}




	if (isset($_POST['answer'])) {

			$userid = $_SESSION['uid'];

			if ($_FILES['uploadfile']['name'] == ''){
				$pathname = ' ';
			}else{
				$path  = $_FILES['uploadfile']['tmp_name'];
				$pathname =  $_FILES['uploadfile']['name'];
				move_uploaded_file($path,"answer/$pathname");
			}

	$sql = "INSERT INTO answer VALUES (DEFAULT , sysdate , sysdate , :content , 'No' , '$pathname' , :qid , :userid )";
	$stmt = oci_parse($conn, $sql);

	$qid = $_POST["qid"];


	oci_bind_by_name($stmt, ':content', $_POST["content"] );
	oci_bind_by_name($stmt, ':qid', $_POST["qid"] );
	oci_bind_by_name($stmt, ':userid', $userid );
	oci_execute($stmt);



/*
	echo ("<SCRIPT LANGUAGE='JavaScript'>
 window.alert('Answer Posted.')
 window.location.href='question.php?qid=$qid';
 </SCRIPT>");
*/

}

if (isset($_POST['comment'])) {

		$userid = $_SESSION['uid'];


$sql = "INSERT INTO answercomment VALUES (sysdate , sysdate , :content , :aid , :userid  , 'Show' )";
$stmt = oci_parse($conn, $sql);

$aid = $_POST["aid"];
$qid = $_POST["qid"];




oci_bind_by_name($stmt, ':aid', $_POST["aid"] );
oci_bind_by_name($stmt, ':userid', $userid );
oci_bind_by_name($stmt, ':content', $_POST["content"] );
oci_execute($stmt);


/*
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Comment posted.')
window.location.href='question.php?qid=$qid';
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
<?php

$qid = $_GET['qid'];
include ('connect.php');
$sql3 = "select * FROM question Q , subject S , users U WHERE Q.subjectid = S.subjectid and Q.questionid = '$qid' AND Q.userid = U.userid";
$stid3 = oci_parse($conn, $sql3);
oci_execute($stid3);
$row3 = oci_fetch_array($stid3);
$sname = $row3["SUBJECTNAME"];
$sid = $row3["SUBJECTID"];
$status = $row3["QUESTIONSTATUS"];
$title = $row3["QUESTIONTITLE"];
$content = $row3["QUESTIONCONTENT"];
$us = $row3["USERNAME"];
$quserid = $row3["USERID"];
$attach = $row3["QUESTIONATTACH"];


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
	<!-- //stats -->
	<!-- services -->
<div class="services">
		<a href="subjectq.php?sid=<?php echo $sid;?>" style="color:none"><h3 class="heading-agileinfo"><?php echo $sid;?> - <?php echo $sname;?><span></span></h3></a>
	<div class="container">
		<div class="services-top-grids">




			<div class="well">

			 <br />

			 <div style="margin-bottom: 30px" class="row2 " >
					<center><h3 class="<?php echo $status;?>" style="color:white;margin-top:-40px"><?php echo $status;?></h3></center>

				 <a href="profile.php?us=<?php echo $us;?>"><div class="col-sm-2 hvr-float-shadow" >

					 <div class="profile-userpic2 ">
						 <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
 	<center><?php echo $pname;?><h5 style="margin-top:10px">Posted On : <br /><strong><?php echo $ptime;?> <br /><?php echo $pdate;?></strong></h5></center>
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
								<h4>Attachment: <a href="download.php?filename=<?php echo $attach; ?>"><?php echo $attach;?></a></h4>
							<?php
						}?>


							<?php

								if(isset($_SESSION['role'])){

							if ($status == 'Open'){
							?>
								<button id="signup" type="button" class="btn btn-success btn-sm">Answer</button>
							<?php
							}
						}
							?>

							<?php

						if ($quserid == $userid){
							if ($status == 'Open'){
							?>
							<a href="closequestion.php?qid=<?php echo $qid;?>"><button  type="button" class="btn btn-warning btn-sm">Close Question</button></a>
							<?php
						}else{
						?>
						<a href="closequestion.php?qid=<?php echo $qid;?>"><button type="button" class="btn btn-success btn-sm">Open Question</button></a>
						<?php
						}
					}
							?>

							<?php
							if(isset($_SESSION['role'])){
							if ( $quserid == $_SESSION['uid'] || $_SESSION['role'] == 'Admin'){
						 ?>
						 <a href="deleteque.php?qid=<?php echo $qid;?>&sid=<?php echo $sid;?>"><button id="signup" style="width:20%" type="button" class="btn btn-danger btn-sm">Delete Question</button></a>
						 <br /><br /><br />
						 <?php
							}
						}
							?>

</div>



			 </div>




			</div>

			<form action=""  method="post"  id="form1" enctype="multipart/form-data">


				<div class="well2">
				<center><h3>Your Answer</h3></center>

				<br />
				<br />


				<div class="col-sm-2">

					<div class="profile-userpic2">
						<img src="profilepic/<?php echo   $_SESSION['pic'];?>" class="img-responsive" alt="">
						<center><?php echo   $_SESSION['name'];?><h5 style="margin-top:10px"></h5></center>
					</div>

				</div>
				<div class="col-sm-8">
					<h2></h2>
					<input type="hidden" name="qid" value="<?php echo $_GET['qid'];?>">
					<textarea id="editor"name="content" placeholder=""  required></textarea>
				  <div id="preview"></div>


					<br />
					<input type="file" name="uploadfile"/>
					 <br /><br />
					 <button style="float:right" type="submit"  name="answer" class="btn btn-success btn-sm">Post Answer</button>
				</div>


						    </form>
				</div>




				<br />

				<?php
				$qid = $_GET['qid'];
				$sql3 = "select  count(*) as count from answer where questionid = '$qid'";
				$stid3 = oci_parse($conn, $sql3);
				oci_execute($stid3);
				$row3 = oci_fetch_array($stid3,OCI_ASSOC);
				$count = $row3['COUNT'];

				$sql3 = "UPDATE question set questionview = questionview+1 where questionid = '$qid'";
				$stid3 = oci_parse($conn, $sql3);
				oci_execute($stid3);


				?>
			<h2 style="margin-top:1%;float:left;"><?php echo $count;?> Answers</h2><br />
			<br /><br />




		<?php
		$sql4 = "select * from answer A  , users U where questionid = '$qid' AND A.userid = U.userid order by answertime DESC";
		$stid4 = oci_parse($conn, $sql4);
		oci_execute($stid4);

		$n = 0;
		while($row4 = oci_fetch_array($stid4,OCI_ASSOC))
		{
			$n++;
			$content = $row4["ANSWERCONTENT"];
			$status = $row4["ANSWERSTATUS"];
			$aid = $row4['ANSWERID'];
			$username = $row4['USERNAME'];
			$ansattach = $row4['ANSWERATTACH'];
			$auserid = $row4['USERID'];




			$sql5 = "BEGIN answerdetail ( '$aid' , '$userid' , :pup , :pdown , :pcomment , :pname , :ppic , :pdate , :ptime , :pups , :pdowns);end;";
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










			<div class="well2">
				<center>
					<?php
					if ($status == 'Yes'){
					?>
		<h3 style="background-color:#56C448;color:white;margin-top:-20px;margin-bottom:10px">Choosen Answer</h3>
					<?php
				}
					?>

				</center>

				<div class="col-sm-2">
					<a href="profile.php?us=<?php echo $username;?>">
					<div class="profile-userpic2 hvr-float-shadow" >
						<img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
						<center><?php echo $pname;?><h5 style="margin-top:10px">Posted On : <br /><strong><?php echo $ptime;?> <br /><?php echo $pdate;?></strong></h5></center>
					</div>

				</div>
			</a>
				<div class="col-sm-8">
					<h2></h2>

					 <p style="font-size:13px">

						 <?php echo $content;?>
						 <?php if ($ansattach != ' '){
						 ?>
							 <h4>Attachment: <a href="downloada.php?filename=<?php echo $ansattach; ?>"><?php echo $ansattach;?></a></h4>
						 <?php
					 }?>
					 </p>
					 <br /><br />
					 <?php

					 if(isset($_SESSION['role'])){


					 if ($pcomment != 0){
					 ?>
					 	 <button  type="button" id="viewcomment<?php echo $n;?>" class="btn btn-success btn-sm">View all <?php echo $pcomment;?> comment</button>
						 <?php
					 }

						  ?>
					 <button  type="button" id="comment<?php echo $n;?>" class="btn btn-success btn-sm">Comment</button>
					 <?php
					 if ( $auserid == $_SESSION['uid'] || $_SESSION['role'] == 'Admin'){
					?>
					<a href="deleteans.php?aid=<?php echo $aid;?>&qid=<?php echo $qid;?>"><button id="signup" style="width:20%" type="button" class="btn btn-danger btn-sm">Delete Answer</button></a>
					<br /><br /><br />
					<?php
					 }
					 ?>


					 <?php

					 if ($quserid == $userid && $status == 'Yes'){
						 ?>
						 <a href="chooseanswer.php?aid=<?php echo $aid;?>"><button  type="button"  class="btn btn-success btn-sm">Choose as incorect answers</button></a>

					<?php
				}else if ($quserid == $userid){

				?>
<a href="chooseanswer.php?aid=<?php echo $aid;?>"><button  type="button"  class="btn btn-success btn-sm">Choose as correct answers</button></a>

				<?php
			}
		}
					  ?>


</div>


<?php
if(isset($_SESSION['role'])){

 ?>
<div class="col-sm-1 hvr-float-shadow"><center><a <?php if ($pups == 'Yes'){?>class="pressedup"  <?php }else{ ?> class="none" <?php } ?>href="voteanswer.php?type=Up&aid=<?php echo $aid;?>&qid=<?php echo $qid;?>">
<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
<h4 ><strong> <?php echo $pup;?> </strong></h4></a>
</div>

<div  class="col-sm-1 hvr-float-shadow"><center><a <?php if ($pdowns == 'Yes'){?> class="presseddown"<?php }else{ ?> class="none" <?php }?> href="voteanswer.php?type=Down&aid=<?php echo $aid;?>&qid=<?php echo $qid;?>">
<span class="fa fa-thumbs-down fa-2x" aria-hidden="true" ></span>
<h4 ><strong> <?php echo $pdown;?> </strong></h4></a>
</center>

	</div>

<?php
}else{
?>
<div class="col-sm-1 hvr-float-shadow"><center>
<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
<h4 ><strong> <?php echo $pup;?> </strong></h4></a>
</div>

<div  class="col-sm-1 hvr-float-shadow"><center>
<span class="fa fa-thumbs-down fa-2x" aria-hidden="true" ></span>
<h4 ><strong> <?php echo $pdown;?> </strong></h4></a>
</center>

	</div>
<?php
}
?>

</div>

<form id="commentsection<?php echo $n;?>" >

	<div class="comments">
		<?php
		$sql9 = "select name, AC.userid , picture , username , answercommenttime ,  answercommentcontent , to_char( answercommentdate , 'DD/MM/YYYY') as cdate, to_char(answercommenttime, 'HH24:MI' ) as ctime from answercomment AC , users U where answerid  = '$aid' and AC.userid = U.userid ORDER BY AC.answercommenttime ASC";
		$stid9 = oci_parse($conn, $sql9);
		oci_execute($stid9);

		$i=0;
		while($row9 = oci_fetch_array($stid9,OCI_ASSOC))
		{
			$i++;
			$name = $row9["NAME"];
			$cpic = $row9["PICTURE"];
			$content = $row9["ANSWERCOMMENTCONTENT"];
			$ctime = $row9["CTIME"];
			$cdate = $row9["CDATE"];
			$username = $row9["USERNAME"];
			$cuserid = $row9["USERID"];
			$qct = $row9["ANSWERCOMMENTTIME"];



		 ?>
			<div class="well3 ">
				<div class="col-sm-2">

					<a href="profile.php?us=<?php echo $username;?>">
					<div class="profile-userpic2 hvr-float-shadow">
						<img src="profilepic/<?php echo $cpic;?>" class="img-responsive" alt="">
						<center><?php echo $name;?><h5 style="margin-top:10px">Posted On : <br /><strong><?php echo $ctime;?><br /><?php echo $cdate;?></strong></h5></center>
					</div>
				</a>

				</div>
				<div class="col-sm-10">
					<h2></h2>

					 <p style="font-size:13px">

						 <?php
						 echo $content;
						 ?>
						 <?php
						 if ( $cuserid == $_SESSION['uid'] || $_SESSION['role'] == 'Admin'){
						?>
						<a href="deleteqc.php?qid=<?php echo $qid;?>&qct=<?php echo $qct;?>"><button id="signup" style="float:left;width:20%" type="button" class="btn btn-danger btn-sm">Delete Comment</button></a>
						<br /><br /><br />
						<?php
						 }
						 ?>
					 </p>
</div>
			</div>
		<?php
	}
	?>
</div>
		</form>












			<form action=""  method="post"  id="commentform<?php echo $n;?>">


				<div class="well3">
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
					<form action="" method="post" name="comment">
					<input type="hidden" name = "aid" value="<?php echo $aid;?>">
					<input type="hidden" name="qid" value="<?php echo $_GET['qid'];?>">
					<textarea id="editor2<?php echo $n;?>" name="content" placeholder="" autofocus required></textarea>
					<div id="preview"></div>


					<br />

					 <button style="float:right" name="comment" type="submit" class="btn btn-success btn-sm">Post comment</button>
					 </form>
				</div>


								</form>




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




							 	var editor = new Simditor({
							 	  textarea: $('#editor')
							 	  //optional options
							 	});

	</script>
	<!-- //owl carousel -->

	<script type="text/javascript">

	<?php
		for ($i = 1 ; $i<$n+1;$i++){
	?>

					$( document ).ready( function() {
							$( "#comment<?php echo $i;?>" ).click( function() {
									$( "#commentform<?php echo $i;?>" ).toggle( 'fast' );
							});
					});

					$( document ).ready( function() {
							$( "#viewcomment<?php echo $i;?>" ).click( function() {
									$( "#commentsection<?php echo $i;?>" ).toggle( 'fast' );
							});
					});





						 		var editor2<?php echo $i;?> = new Simditor({
						 		  textarea: $('#editor2<?php echo $i;?>')
						 		  //optional options
						 		});


								<?php
							}
								 ?>

	</script>
	<style>
	<?php
		for ($i = 0 ; $i<$n+1;$i++){
	?>
	#commentform<?php echo $i;?> {
	    display : none;
	}

	#commentsection<?php echo $i;?> {
	    display : none;
	}
	<?php
}
	 ?>
	</style>
</body>

</html>
