<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$aid = $_GET['aid'];
		$qid = $_GET['qid'];




		$sql2 = "DELETE FROM answervote where answerid = :aid";
		$stmt2 = oci_parse($conn, $sql2);
		oci_bind_by_name($stmt2, ':aid' , $aid);
		oci_execute($stmt2);
		
		$sql2 = "DELETE FROM answercomment where answerid = :aid";
		$stmt2 = oci_parse($conn, $sql2);
		oci_bind_by_name($stmt2, ':aid' , $aid);
		oci_execute($stmt2);

	$sql = "DELETE FROM answer where answerid = :aid";
	$stmt = oci_parse($conn, $sql);
	oci_bind_by_name($stmt, ':aid' , $aid);
	oci_execute($stmt);




echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='question.php?qid=$qid';
</SCRIPT>");



?>
