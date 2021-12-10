<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$aid = $_GET['aid'];
		$status = $_GET['status'];



	$sql3 = "UPDATE appointment set appointmentstatus = :status where appointmentid = :aid ";
		$stid3 = oci_parse($conn, $sql3);
		oci_bind_by_name($stid3, ':status', $status);
		oci_bind_by_name($stid3, ':aid', $aid);
		oci_execute($stid3);







echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='myappointment.php';
</SCRIPT>");


?>
