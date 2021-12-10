<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$cid = $_GET['cid'];

		$type = $_GET['type'];

							$sql3 = "select count(*) from classvote where userid = :userid and classid = :cid and votetype = :type ";
							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':userid', $userid);
							oci_bind_by_name($stid3, ':cid', $cid);
							oci_bind_by_name($stid3, ':type', $type);
							oci_execute($stid3);
							$row3 = oci_fetch_row($stid3);
							$count = $row3[0];



if($count == 0){

	$sql = "INSERT INTO classvote VALUES (:cid,  :type , :userid  )";
	$stmt = oci_parse($conn, $sql);



	oci_bind_by_name($stmt, ':cid' , $cid );
	oci_bind_by_name($stmt, ':userid', $userid  );
	oci_bind_by_name($stmt, ':type', $type );
	oci_execute($stmt);
}else{

	$sql = "DELETE FROM classvote where userid = '$userid' and classid = '$cid' and votetype = '$type'";
	$stmt = oci_parse($conn, $sql);
		oci_execute($stmt);
}



echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='class.php?cid=$cid';
</SCRIPT>");



?>
