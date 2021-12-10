<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$qct = $_GET['qct'];
		$qid = $_GET['qid'];


	$sql = "DELETE FROM answercomment where answercommenttime= :qct";
	$stmt = oci_parse($conn, $sql);
	oci_bind_by_name($stmt, ':qct' , $qct );
	oci_execute($stmt);




echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='question.php?qid=$qid';
</SCRIPT>");



?>
