<?php
if (!isset($_SESSION)) session_start();
				$userid = $_SESSION['uid'];
$qid = $_POST['qid'];
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







 <div class="well">

  <br />

  <div style="margin-bottom: 30px" class="row2 " >
     <center><h3 class="<?php echo $status;?>" style="color:white;margin-top:-40px"><?php echo $status;?></h3></center>



    <div class="col-sm-12">
      <h2></h2>
      <h4 style=" text-decoration: underline;margin-bottom:2px">
      <a href="question.php?qid=<?php echo $qid;?>" target="_blank">  <?php echo $title;?> </a>
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



       <br /><br /><br />
       <a href="questionstatus.php?qid=<?php echo $qid;?>&status=Delete"><button id="signup" style="float:left;width:20%;margin-right:20px" type="button" class="btn btn-danger btn-sm">Delete</button></a>
       <a data-toggle="modal" data-id="<?php echo $qid;?>" class="editquestiondialog" href="#editquestion" ><button id="signup" style="float:left;width:20%;margin-right:20px" type="button" class="btn btn-warning btn-sm">Edit</button></a>
       <a href="questionstatus.php?qid=<?php echo $qid;?>&status=Closed"><button id="signup" style="width:20%;margin-right:20px" type="button" class="btn btn-warning btn-sm">Close Question</button></a>
       <a href="questionstatus.php?qid=<?php echo $qid;?>&status=Open"><button id="signup" style="width:20%;margin-right:20px" type="button" class="btn btn-success btn-sm">Open Question</button></a>

</div>



  </div>




 </div>
