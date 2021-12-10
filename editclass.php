<?php
session_start();
?>
	<link rel="stylesheet" type="text/css" href="assets/styles/simditor.css" />
<script type="text/javascript" src="assets/scripts/module.js"></script>
<script type="text/javascript" src="assets/scripts/uploader.js"></script>
<script type="text/javascript" src="assets/scripts/hotkeys.js"></script>
<script type="text/javascript" src="assets/scripts/simditor.js"></script>
<script type="text/javascript" src="assets/scripts/page-demo.js"></script>



	<div class="well2">
	<center><h3>Your Class</h3></center>

	<br />
	<br />
<?php

$userid = $_SESSION['uid'];
$cid = $_POST['cid'];
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
$ddate = date("Y-m-d", strtotime($cdate));
$name = $row3["NAME"];
$pic = $row3["PICTURE"];
$venue = $row3["VENUE"];
$fees = $row3["FEES"];
$capacity = $row3["CAPACITY"];
$sql4 = "BEGIN classdetail(:cid ,  '$userid' , :pup  , :pcomment , :pusers ,  :pview , :pups , :pdowns , :pattend );end;";
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



 										<form id="reg" role="form" method="post" action="editclassp.php" enctype="multipart/form-data">
 											<div class="form-group">

 												<input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $title;?>">
 											</div>
 											<div class="form-group">
												<input type="hidden"  name="cid" value="<?php echo $cid;?>" />
 												<textarea id="editor3" name="content" placeholder="Class Description" autofocus><?php echo $content;?></textarea>
 												<div id="preview"></div>
 											</div>



 											<div class="row2">
 												<div class="col-sm-3 col-md-6">
 													<div class="form-group">
 														<center><label for="psw"><span class=""></span>Time</label></center>
 														<input type="time" class="form-control"  name="ctime" value="<?php echo $ctime;?>"placeholder="Enter your password">
 													</div>
 												</div>
 												<div class="col-sm-9 col-md-6">
 													<div class="form-group">
 														<center><label for="psw"><span class=""></span>Date</label></center>
 														<input type="date"  class="form-control"  min="<?php echo date('Y-m-d');?>" name="cdate" value="<?php echo $ddate;?>"/>
 													</div>
 												</div>
 											</div>

 											<div class="form-group">

 												<input type="number" class="form-control"  name="capacity" placeholder="Class Capacity" value="<?php echo $capacity;?>">
 											</div>

 												<div class="form-group">

 													<input type="text"  class="form-control" name="venue" placeholder="Venue" value="<?php echo $venue;?>">
 												</div>

 												<div class="form-group">

 													<input type="number"  class="form-control"  name="fees" placeholder="Fees: RM" value="<?php echo $fees;?>">
 												</div>

 												<div class="form-group">

 													<input type="file"   name="uploadfile" placeholder="attach">
 												</div>
												<br /><br />
												<button style="float:right" type="submit" name="post" class="btn btn-success btn-sm">Edit Class</button>

 							</form>









<script>

var editor3 = new Simditor({
  textarea: $('#editor3')
  //optional options
});

</script>
