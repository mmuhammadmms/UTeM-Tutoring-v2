<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$sid = $_GET['sid'];
		$qid = $_GET['qid'];




		$sql2 = "UPDATE question set questionstatus = 'Delete' where questionid = :qid";
		$stmt2 = oci_parse($conn, $sql2);
		oci_bind_by_name($stmt2, ':qid' , $qid);
		oci_execute($stmt2);






echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='subjectq.php?sid=$sid';
</SCRIPT>");



?>
