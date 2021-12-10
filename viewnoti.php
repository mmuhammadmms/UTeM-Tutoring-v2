<?php session_start();
$userid = $_SESSION['uid'];
include('connect.php');





?>

<style>
.profile-userpic3 img {
  float: left;
  margin: 0 auto;
	margin-right:10px;
  width: 10%;
  height: 20%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}


</style>


<?php


$sql9 = "select  to_char( nodate , 'DD/MM/YYYY') as ndate, referid , to_char(nodate, 'HH24:MI' ) as ntime , notype , norefer , nostatus  from notification where userid = '$userid' order by nodate DESC";
$stid9 = oci_parse($conn, $sql9);
oci_execute($stid9);

while($row9 = oci_fetch_array($stid9,OCI_ASSOC))
{
	$ndate = $row9["NDATE"];
	$ntime = $row9["NTIME"];
	$ntype = $row9["NOTYPE"];
	$nrefer = $row9["REFERID"];
	$usrefer = $row9["NOREFER"];
	$nstatus = $row9["NOSTATUS"];


	$sql4 = "select name , username , picture from users where userid = '$nrefer' ";
	$stid4 = oci_parse($conn, $sql4);
	oci_execute($stid4);
	$row4 = oci_fetch_array($stid4,OCI_ASSOC);

	$pname = $row4["NAME"];
	$pus = $row4["USERNAME"];
	$ppic = $row4["PICTURE"];






	if ($ntype == 'follow'){
	?>
	<a href="profile.php?us=<?php echo $pus;?>" target="_blank" style="color:black;">
	<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
	    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
	  </div>
	<div class='notification-subject'>   <?php echo $pname;?> started following you. </div>
	<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
	</div>
</a>
	<?php
}else if ( $ntype == 'question'){


	?>
  <a href="question.php?qid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
  <div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
      <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
    </div>
  <div class='notification-subject'>   <?php echo $pname;?> posted new questions. </div>
  <div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
  </div>
</a>
<?php
}else if ( $ntype == 'answer'){

  $sql7 = "select * from question Q , users U where questionid = '$usrefer' and Q.userid = U.userid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];
  $qtitle = $row7["QUESTIONTITLE"];




?>
<a href="question.php?qid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> answers <?php if ($_SESSION['username'] == $qus){?>your <?php }else{ ?> a <?php }?> question.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'answercomment'){

  $sql7 = "select * from question Q , answer A , users U where A.answerid = '$usrefer' and A.userid = U.userid AND A.questionid = Q.questionid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];
  $qid = $row7["QUESTIONID"];

?>






<a href="question.php?qid=<?php echo $qid;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> commented <?php  if ($_SESSION['username'] == $qus){?>on your <?php }else{ ?> on an <?php }?> answer.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'notescomment'){

  $sql7 = "select * from notes N , users U where notesid = '$usrefer' and N.userid = U.userid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];
  $qtitle = $row7["NOTESTITLE"];

?>
<a href="notes.php?nid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> commented <?php if ($_SESSION['username'] == $qus){?>on your <?php }else{ ?> on a <?php }?> notes.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'likeanswer'){

  $sql7 = "select * from answer A , users U where answerid = '$usrefer' and A.userid = U.userid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];


?>
<a href="question.php?qid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> has voted  <?php if ($_SESSION['username'] == $qus){?> your <?php }else{ ?> an <?php }?> answer.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'likenotes'){
  $sql7 = "select * from notes N , users U where notesid = '$usrefer' and N.userid = U.userid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];

?>
<a href="notes.php?nid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> has voted  <?php if ($_SESSION['username'] == $qus){?> your <?php }else{ ?> a <?php }?> notes.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'likeclass'){
  $sql7 = "select * from class C , users U where classid = '$usrefer' and C.userid = U.userid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];
?>
<a href="class.php?cid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> has voted  <?php if ($_SESSION['username'] == $qus){?> your <?php }else{ ?> an <?php }?> class.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'classcomment'){

  $sql7 = "select * from class C , users U where classid = '$usrefer' and C.userid = U.userid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];

?>
<a href="class.php?cid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> commented <?php if ($_SESSION['username'] == $qus){?>on your <?php }else{ ?> on a <?php }?> class.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'classattend'){

  $sql7 = "select * from class C , users U where classid = '$usrefer' and C.userid = U.userid ";
  $stid7 = oci_parse($conn, $sql7);
  oci_execute($stid7);
  $row7 = oci_fetch_array($stid7,OCI_ASSOC);

  $qname = $row7["NAME"];
  $qus = $row7["USERNAME"];
  $qpic = $row7["PICTURE"];

?>
<a href="class.php?cid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> attend <?php if ($_SESSION['username'] == $qus){?> your <?php }else{ ?>  a <?php }?> class.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'meetup'){

?>
<a href="myappointment.php" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> has requested a meetup.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'class'){

?>
<a href="class.php?cid=<?php echo $usrefer;?>" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> has posted new class.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}else if ( $ntype == 'admin'){

?>
<a href="myprofile.php" target="_blank" style="color:black;">
<div class='notification-item hvr-float-shadow' <?php if ($nstatus == 0){ echo "style='background-color:silver'"; };?>>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $ppic;?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   <?php echo $pname;?> has set you as admin.</div>
<div class='notification-comment'>   <?php echo $ntime . ' - ' . $ndate;?></div>
</div>
</a>
<?php
}
}




$sql4 = "UPDATE notification set nostatus = 1 where userid = '$userid'";
$stid4 = oci_parse($conn, $sql4);
oci_execute($stid4);

?>






<?php

/*


<div class='notification-item'>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $_SESSION['pic'];?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   John Lennon answers your question : How to Basic </div>
<div class='notification-comment'>   1 minutes ago.</div>
</div>
<br />
<div class='notification-item'>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $_SESSION['pic'];?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   John Lennon commented on your class : How to Basic </div>
<div class='notification-comment'>   1 minutes ago.</div>
</div>

<br />
<div class='notification-item'>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $_SESSION['pic'];?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   John Lennon reply to your answers on : How to Basic </div>
<div class='notification-comment'>   1 minutes ago.</div>
</div>

<br />
<div class='notification-item'>  <div class="profile-userpic3">
    <img src="profilepic/<?php echo $_SESSION['pic'];?>" class="img-responsive" alt="">
  </div>
<div class='notification-subject'>   John Lennon posted new questions. </div>
<div class='notification-comment'>   1 minutes ago.</div>
</div>
*/
?>
