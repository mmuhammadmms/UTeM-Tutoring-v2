<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$cct = $_GET['cct'];
		$cid = $_GET['cid'];



		$sql2 = "DELETE FROM classvote where classid = :cid";
		$stmt2 = oci_parse($conn, $sql2);
		oci_bind_by_name($stmt2, ':cid' , $cid );
		oci_execute($stmt2);

		$sql = "DELETE FROM classcomment where classcommenttime = :cct";
		$stmt = oci_parse($conn, $sql);
		oci_bind_by_name($stmt, ':cct' , $cct );
		oci_execute($stmt);




echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='class.php?cid=$cid';
</SCRIPT>");



?>
