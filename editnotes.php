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
	<center><h3>Your Notes</h3></center>

	<br />
	<br />
<?php

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








 ?>
<form action="editnotesp.php"  method="post"  id="qform" enctype="multipart/form-data">
	<div class="col-sm-12">
		<h2></h2>

			<input type="text" name="title" class="form-control" value="<?php echo $title;?>" placeholder="Notes Title" />
			<br />
      <input type="hidden" name="nid" value="<?php echo $nid;?>">
		<textarea id="editor2" name="content" placeholder="Notes Description" autofocus><?php echo $content;?></textarea>
		<div id="preview"></div>


		<br />
		<input name="uploadfile" type="file" />
		 <br /><br />
		 <button style="float:right" type="submit" name="post" class="btn btn-success btn-sm">Edit Notes</button>
	</div>

</div>
					</form>

<script>

var editor2 = new Simditor({
  textarea: $('#editor2')
  //optional options
});

</script>
