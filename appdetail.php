<?php
if (!isset($_SESSION)) session_start();
				$userid = $_SESSION['uid'];
$aid = $_POST['aid'];
include ('connect.php');


$sql4 = "BEGIN appointmentdetail ( '$aid' , :userid , :tous , :toname , :topic , :uname , :upic , :adate , :atime , :pdate , :ptime , :atitle , :adesc , :astatus , :atype , :avenue);end;";
$stid4 = oci_parse($conn, $sql4);

oci_bind_by_name($stid4, ':userid' , $userid , 15);
oci_bind_by_name($stid4, ':tous' , $tous, 30);
  oci_bind_by_name($stid4, ':tous' , $tous, 30);
  oci_bind_by_name($stid4, ':toname' , $toname, 30);
oci_bind_by_name($stid4, ':topic' , $topic, 30);
oci_bind_by_name($stid4, ':uname' , $uname, 30);
oci_bind_by_name($stid4, ':upic' , $upic, 30);
oci_bind_by_name($stid4, ':adate' , $adate, 15);
oci_bind_by_name($stid4, ':atime' , $atime, 15);
oci_bind_by_name($stid4, ':pdate' , $pdate , 10);
oci_bind_by_name($stid4, ':ptime' , $ptime , 10);
oci_bind_by_name($stid4, ':atitle' , $atitle , 30);
oci_bind_by_name($stid4, ':adesc' , $adesc, 50);
oci_bind_by_name($stid4, ':astatus' , $astatus, 15);
oci_bind_by_name($stid4, ':atype' , $atype, 15);
oci_bind_by_name($stid4, ':avenue' , $avenue, 100);

oci_execute($stid4);


   ?>







  <br />

	<div style="margin-top: -80px;margin-bottom:100px" class="profile-content2">


    <div class="col-sm-5 open">


      <div class="profile-userpic hvr-float-shadow">
        <img src="profilepic/<?php echo $upic;?>" class="img-responsive" alt="">
        <center><?php echo $uname;?></center>
      </div>

    </div>

    <div class="col-sm-2">
      <center>
      <span class="fas fa-caret-<?php echo $atype;?> fa-3x" aria-hidden="true" ></span>
      <h4 ><strong> Meet </strong></h4>
      </center>

   </div>

    <div class="col-sm-5">


      <div class="profile-userpic hvr-float-shadow">
        <img src="profilepic/<?php echo $topic;?>" class="img-responsive" alt="">
        <center><?php echo $toname;?></center>
      </div>


    </div>



</div>
















<br /><br />
	<form id="reg" role="form" method="post" action="appprocess.php">
		<div class="form-group">

			<input type="text" class="form-control"  name="title" placeholder="Title" value="Title : <?php echo $atitle;?>" readonly>
		</div>
		<div class="form-group">

			<input type="text" class="form-control"  name="content" placeholder="Description" value=" Description: <?php echo $adesc;?>" readonly>
		</div>



		<div class="row2">
			<div class="col-sm-3 col-md-6">
				<div class="form-group">
					<center><label for="psw"><span class=""></span>Time</label></center>
					<input type="text" class="form-control" name="atime" value="<?php echo $atime;?>" readonly>
				</div>
			</div>
			<div class="col-sm-9 col-md-6">
				<div class="form-group">
					<center><label for="psw"><span class=""></span>Date</label></center>
					<input type="text" class="form-control" name="adate" value="<?php echo $adate;?>" readonly>
				</div>
			</div>
		</div>









			<div class="form-group">

				<input type="text" class="form-control"  name="venue" placeholder="Venue" value="Venue : <?php echo $avenue;?>" readonly>
			</div>


		 <a href="appstatus.php?aid=<?php echo $aid;?>&status=Delete"><button id="signup" style="float:left;width:20%;margin-right:20px" type="button" class="btn btn-danger btn-sm">Delete</button></a>
 		<a href="appstatus.php?aid=<?php echo $aid;?>&status=Rejected"><button id="signup" style="width:20%;margin-right:20px" type="button" class="btn btn-warning btn-sm">Reject</button></a>
 		<a href="appstatus.php?aid=<?php echo $aid;?>&status=Accept"><button id="signup" style="width:20%;margin-right:20px" type="button" class="btn btn-success btn-sm">Accept</button></a>

 		<a href="appstatus.php?aid=<?php echo $aid;?>&status=Completed"><button id="signup" style="width:20%;margin-right:20px" type="button" class="btn btn-success btn-sm">Completed</button></a>

		 
