<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$cid = $_GET['cid'];
		$status = $_GET['status'];




			$sql3 = "UPDATE class set classstatus = :status where classid = :cid ";
				$stid3 = oci_parse($conn, $sql3);
				oci_bind_by_name($stid3, ':status', $status);
				oci_bind_by_name($stid3, ':cid', $cid);


							oci_execute($stid3);






echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='myclass.php';
</SCRIPT>");



?>
