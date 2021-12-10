<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$uid = $_GET['uid'];
		$us  = $_GET['us'];
		$set = $_GET['set'];



		$sql2 = "UPDATE users set role = '$set' where userid = '$uid'";
		$stmt2 = oci_parse($conn, $sql2);

		oci_execute($stmt2);

		if ($set == 'Admin'){
		$sql3 = "INSERT INTO notification VALUES ( '$uid' , sysdate , 'admin' , '$userid' , 'myprofile' , 0 )	";
		$stmt3 = oci_parse($conn, $sql3);

		oci_execute($stmt3);
		}


echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='profile.php?us=$us';
</SCRIPT>");



?>
