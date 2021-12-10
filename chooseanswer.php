<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$aid = $_GET['aid'];



							$sql3 = "select answerstatus , questionid from answer where userid = :userid and answerid = :aid ";
							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':userid', $userid);
							oci_bind_by_name($stid3, ':aid', $aid);
							oci_execute($stid3);
							$row3 = oci_fetch_row($stid3);
							$status = $row3[0];
							$qid = $row3[1];

echo $status ;
echo $qid;

if($status == 'No'){

	$sql = "UPDATE answer set answerstatus = 'Yes' where answerid = :aid ";
	$stmt = oci_parse($conn, $sql);



	oci_bind_by_name($stmt, ':aid' , $aid );

	oci_execute($stmt);
}else{

	$sql = "UPDATE answer set answerstatus = 'No' where answerid = :aid ";
	$stmt = oci_parse($conn, $sql);

	oci_bind_by_name($stmt, ':aid' , $aid );

	oci_execute($stmt);
}

echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='question.php?qid=$qid';
</SCRIPT>");



?>
