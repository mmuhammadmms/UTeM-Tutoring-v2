<?php
session_start();
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
$name = $row3["NAME"];
$pic = $row3["PICTURE"];
$classpic = $row3["CLASSFILE"];
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









<div class="well">

 <br />

 <div style="margin-bottom: 30px" class="row2 " >



	 <div class="col-sm-12">
		 <h2></h2>


<div class="col-sm-4 col-xs-6 gallery-grid">
<div class="grid effect-apollo">
<a class="example-image-link" href="class/<?php echo $classpic; ?>" data-lightbox="example-set" data-title="">
<center><img src="class/<?php echo $classpic; ?>" width="500px" height="300px" /></center>

<?php echo $pic;?>
<div class="figcaption">

</div>
</a>
</div>
</div>


  	<a href="class.php?cid=<?php echo $cid;?>" target="_blank"><h2><?php echo $title;?></h2></a><br />
		 <h4 style=" text-decoration: underline;margin-bottom:2px">			Venue: <?php echo $venue;?></h4>
		 <h4 style=" text-decoration: underline;margin-bottom:2px">			Date: <?php echo $cdate;?></h4>
		 <h4 style=" text-decoration: underline;margin-bottom:2px">			Time: <?php echo $ctime;?></h4>
		 <h4 style=" text-decoration: underline;margin-bottom:2px">			Capacity: 0 / <?php echo $capacity;?></h4><br />
		 <h4 style=" text-decoration: underline;margin-bottom:2px">			Fees: <strong>RM <?php echo $fees;?></strong></h4><br /><br />
			<p style="font-size:13px">
				<?php echo $content;?>



			</p>
				<br /><br />




				<div class="col-sm-1 hvr-float-shadow"><center>



				<span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
				<h4><strong> <?php echo $pup;?></strong></h4>
			</div>

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

<a href="classstatus.php?cid=<?php echo $cid;?>&status=Cancel"><button id="signup" style="float:left;width:20%;margin-right:20px" type="button" class="btn btn-danger btn-sm">Cancel</button></a>
<a data-toggle="modal" data-id="<?php echo $cid;?>" class="editclassdialog" href="#editclass" ><button id="signup" style="float:left;width:20%;margin-right:20px" type="button" class="btn btn-warning btn-sm">Edit</button></a>
<a href="classstatus.php?cid=<?php echo $cid;?>&status=Postponed"><button id="signup" style="width:20%;margin-right:20px" type="button" class="btn btn-warning btn-sm">Postponed</button></a>
<a href="classstatus.php?cid=<?php echo $cid;?>&status=Completed"><button id="signup" style="width:20%;margin-right:20px" type="button" class="btn btn-success btn-sm">Completed</button></a>


</div>



 </div>




</div>
