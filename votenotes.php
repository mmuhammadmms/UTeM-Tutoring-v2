<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$nid = $_GET['nid'];

		$type = $_GET['type'];

							$sql3 = "select count(*) from notesvote where userid = :userid and notesid = :nid and votetype = :type ";
							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':userid', $userid);
							oci_bind_by_name($stid3, ':nid', $nid);
							oci_bind_by_name($stid3, ':type', $type);
							oci_execute($stid3);
							$row3 = oci_fetch_row($stid3);
							$count = $row3[0];

							echo $count;
							echo $userid;

if($count == 0){

	$sql = "INSERT INTO notesvote VALUES (:nid,  :type , :userid  )";
	$stmt = oci_parse($conn, $sql);



	oci_bind_by_name($stmt, ':nid' , $nid );
	oci_bind_by_name($stmt, ':userid', $userid  );
	oci_bind_by_name($stmt, ':type', $type );
	oci_execute($stmt);
}else{

	$sql = "DELETE FROM notesvote where userid = '$userid' and notesid = '$nid' and votetype = '$type'";
	$stmt = oci_parse($conn, $sql);
		oci_execute($stmt);
}



echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='notes.php?nid=$nid';
</SCRIPT>");



?>
