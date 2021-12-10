<?php
session_start();
?>
	<link rel="stylesheet" type="text/css" href="assets/styles/simditor.css" />
<script type="text/javascript" src="assets/scripts/module.js"></script>
<script type="text/javascript" src="assets/scripts/uploader.js"></script>
<script type="text/javascript" src="assets/scripts/hotkeys.js"></script>
<script type="text/javascript" src="assets/scripts/simditor.js"></script>
<script type="text/javascript" src="assets/scripts/page-demo.js"></script>



	<div class="well">


	<br />
	<br />
<?php

include ('connect.php');
$uid = $_SESSION['uid'];

$qid = $_POST['qid'];


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









 ?>
 <form action="editquestionp.php"  method="post"  id="qform" enctype="multipart/form-data">





 	<br />
 	<br />


 		<h2></h2>

 			<input type="text" name="title" class="form-control" placeholder="Question Title" value="<?php echo $title;?>" />
 			<br />
 			<input type="hidden" name="qid" value="<?php echo $_POST['qid'];?>">
 		<textarea id="qeditor" name="content" placeholder="Question Description" autofocus><?php echo $content;?></textarea>
 		<div id="preview"></div>


 		<br />
 		<input type="file" name="uploadfile" />
 		 <br /><br />
 		 <button style="float:right" type="submit" name="post" class="btn btn-success btn-sm">Edit Question</button>



 					</form>
</div>
<script>

var editor2 = new Simditor({
  textarea: $('#qeditor')
  //optional options
});

</script>
