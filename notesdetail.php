<?php
session_start();
include ('connect.php');
$uid = $_SESSION['uid'];

$nid = $_POST['nid'];

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









 <div class="well">

  <br />

  <div style="margin-bottom: 30px" class="row2 " >


    <a href="profile.php?us=<?php echo $username;?>"><div class="col-sm-2 hvr-float-shadow" >



    </div></a>
    <div class="col-sm-12">
      <h2></h2>
      <a href="notes.php?nid=<?php echo $nid;?>" target="_blank"><h4 style=" text-decoration: underline;margin-bottom:2px">
        <?php echo $title;?>
      </h4></a>
       <p style="font-size:13px">
         <?php echo $content;?>
       </p>
         <br /><br />
         <?php if ($attach != ''){
         ?>
           <h4>Attachment: <a href="downloadn.php?filename=<?php echo $attach; ?>"><?php echo $attach;?></a></h4>
         <?php
       }?>


         <div class="col-sm-1 hvr-float-shadow"><center>



         <span class="fa fa-thumbs-up fa-2x" aria-hidden="true" ></span>
         <h4 ><strong> <?php echo $pup;?> </strong></h4>
         </div>


           <div class="col-sm-1 hvr-float-shadow"><center>



           <span class="fa fa-eye fa-2x" aria-hidden="true" ></span>
           <h4 class="counter"><strong> <?php echo $pview;?> </strong></h4>
           </div>





</div>
<br /><br />
<a href="notesstatus.php?nid=<?php echo $nid;?>&status=Delete"><button id="signup" style="float:left;width:30%;margin-right:20px" type="button" class="btn btn-danger btn-sm">Delete</button></a>
<a data-toggle="modal" data-id="<?php echo $nid;?>" class="editnotesdialog" href="#editnotes" ><button id="signup" style="width:30%;margin-right:20px" type="button" class="btn btn-warning btn-sm">Edit</button></a>
<a href="notesstatus.php?nid=<?php echo $nid;?>&status=Hide"><button id="signup" style="width:30%;margin-right:20px" type="button" class="btn btn-success btn-sm">Hide</button></a>











  </div>




 </div>
