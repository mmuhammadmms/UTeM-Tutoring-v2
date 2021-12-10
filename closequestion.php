<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];

		$qid = $_GET['qid'];



							$sql3 = "select questionstatus from question where questionid = :qid ";
							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':qid', $qid);
							oci_execute($stid3);
							$row3 = oci_fetch_row($stid3);
							$status = $row3[0];

echo $status;
if($status == 'Open'){

	$sql = "UPDATE question set questionstatus = 'Closed' where questionid = :qid";
	$stmt = oci_parse($conn, $sql);



	oci_bind_by_name($stmt, ':qid' , $qid );
	oci_execute($stmt);
}else{

	$sql = "UPDATE question set questionstatus = 'Open' where questionid = :qid";
	$stmt = oci_parse($conn, $sql);
		oci_bind_by_name($stmt, ':qid' , $qid );
		oci_execute($stmt);
}



echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='question.php?qid=$qid';
</SCRIPT>");



?>
