<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$nct = $_GET['nct'];
		$nid = $_GET['nid'];


	$sql = "DELETE FROM notescomment where notescommenttime = :nct";
	$stmt = oci_parse($conn, $sql);
	oci_bind_by_name($stmt, ':nct' , $nct );
	oci_execute($stmt);




echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='notes.php?nid=$nid';
</SCRIPT>");



?>
