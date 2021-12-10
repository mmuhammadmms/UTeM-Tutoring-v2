<?php
session_start();
include ('connect.php');
		$uid = $_SESSION['uid'];
		$cid = $_GET['cid'];



		$sql3 = "select count(*) from attendance where classid = '$cid' and userid = '$uid' ";
		$stid3 = oci_parse($conn, $sql3);

		oci_execute($stid3);
		$row3 = oci_fetch_row($stid3);
		$count = $row3[0];

echo $count;

if($count == 0){

	$sql = "INSERT INTO ATTENDANCE VALUES ('$cid' , '$uid') ";
	$stmt = oci_parse($conn, $sql);

	oci_execute($stmt);
}else{

	$sql = "DELETE FROM ATTENDANCE WHERE classid = '$cid' and USERID = '$uid' ";
	$stmt = oci_parse($conn, $sql);
	oci_execute($stmt);
}



echo ("<SCRIPT LANGUAGE='JavaScript'>
window.location.href='class.php?cid=$cid';
</SCRIPT>");


?>
