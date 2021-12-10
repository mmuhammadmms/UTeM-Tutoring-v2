<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$sid = $_GET['sid'];
		$nid = $_GET['nid'];




		$sql2 = "UPDATE notes set notesstatus = 'Delete' where notesid = :nid";
		$stmt2 = oci_parse($conn, $sql2);
		oci_bind_by_name($stmt2, ':nid' , $nid);
		oci_execute($stmt2);






echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='subjectn.php?sid=$sid';
</SCRIPT>");



?>
