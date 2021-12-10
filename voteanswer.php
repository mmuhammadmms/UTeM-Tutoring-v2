<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$aid = $_GET['aid'];
		$qid = $_GET['qid'];
		$type = $_GET['type'];

							$sql3 = "select count(*) from answervote where userid = :userid and answerid = :aid and votetype = :type ";
							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':userid', $userid);
							oci_bind_by_name($stid3, ':aid', $aid);
							oci_bind_by_name($stid3, ':type', $type);
							oci_execute($stid3);
							$row3 = oci_fetch_row($stid3);
							$count = $row3[0];

							echo $count;
							echo $userid;

if($count == 0){

	$sql = "INSERT INTO answervote VALUES (:aid,  :type , :userid  )";
	$stmt = oci_parse($conn, $sql);



	oci_bind_by_name($stmt, ':aid' , $aid );
	oci_bind_by_name($stmt, ':userid', $userid  );
	oci_bind_by_name($stmt, ':type', $type );
	oci_execute($stmt);
}else{

	$sql = "DELETE FROM answervote where userid = '$userid' and answerid = '$aid' and votetype = '$type'";
	$stmt = oci_parse($conn, $sql);
		oci_execute($stmt);
}



echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='question.php?qid=$qid';
</SCRIPT>");



?>
