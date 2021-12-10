<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$cid = $_GET['cid'];





		$sql2 = "UPDATE class set classstatus = 'Delete' where classid = :cid";
		$stmt2 = oci_parse($conn, $sql2);
		oci_bind_by_name($stmt2, ':cid' , $cid);
		oci_execute($stmt2);






echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='listclass.php';
</SCRIPT>");



?>
