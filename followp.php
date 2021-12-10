<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$fuid = $_GET['fid'];
 		$ftype = $_GET['type'];
		$fus = $_GET['us'];

		if ($ftype == 'Follow'){
			$sql = "INSERT INTO follower VALUES ( '$fuid' , '$userid' )";
			$stmt = oci_parse($conn, $sql);
			oci_execute($stmt);

		} else{
			$sql = "DELETE from follower where userid = '$fuid' and followerid = '$userid'";
			$stmt = oci_parse($conn, $sql);
			oci_execute($stmt);

		}


echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='profile.php?us=$fus';
</SCRIPT>");


?>
