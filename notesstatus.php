<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$nid = $_GET['nid'];
		$status = $_GET['status'];



	$sql3 = "UPDATE notes set notesstatus = :status where notesid = :nid ";
		$stid3 = oci_parse($conn, $sql3);
		oci_bind_by_name($stid3, ':status', $status);
		oci_bind_by_name($stid3, ':nid', $nid);
		oci_execute($stid3);







echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='mynotes.php';
</SCRIPT>");


?>
