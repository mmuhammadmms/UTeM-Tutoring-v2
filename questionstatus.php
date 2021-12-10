<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$qid = $_GET['qid'];
		$status = $_GET['status'];




			$sql3 = "UPDATE question set questionstatus = :status where questionid = :qid ";
				$stid3 = oci_parse($conn, $sql3);
				oci_bind_by_name($stid3, ':status', $status);
				oci_bind_by_name($stid3, ':qid', $qid);


							oci_execute($stid3);






echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='myquestion.php';
</SCRIPT>");



?>
