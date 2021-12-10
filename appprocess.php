<?php
include ('connect.php');
session_start();



$userid = $_SESSION['uid'];


$sql = "INSERT INTO appointment VALUES (DEFAULT , :toid , :title , :content , sysdate , sysdate , 'Pending' , :adate , :atime   , :venue , :userid )";
$stmt = oci_parse($conn, $sql);

oci_bind_by_name($stmt, ':toid' , $_POST["appuid"]);
oci_bind_by_name($stmt, ':title' , $_POST["title"]);
oci_bind_by_name($stmt, ':content' , $_POST["content"]);
oci_bind_by_name($stmt, ':adate' , $_POST["adate"]);
oci_bind_by_name($stmt, ':atime' , $_POST["atime"]);
oci_bind_by_name($stmt, ':venue' , $_POST["venue"]);
oci_bind_by_name($stmt, ':userid', $userid );
oci_execute($stmt);



echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Meet-up request sended.')
window.location.href='myappointment.php';
</SCRIPT>");









?>
