<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$cid = $_POST['cid'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$ctime = $_POST['ctime'];
		$fees = $_POST['fees'];
		$venue = $_POST['venue'];
		$capacity = $_POST['capacity'];
	$cdate = date('m/d/Y',strtotime($_POST["cdate"]));

					if ($_FILES['uploadfile']['name'] == ''){
						$sql3 = "UPDATE class set classtitle = :ctitle , classcontent = :ccontent , dateschedule = :cdate , timeschedule = :ctime , fees = :cfees , capacity = :ccapacity , venue = :cvenue where classid = :cid";
						$stid3 = oci_parse($conn, $sql3);
						oci_bind_by_name($stid3, ':ctitle', $title);

						oci_bind_by_name($stid3, ':ccontent', $content);
						oci_bind_by_name($stid3, ':cdate', $cdate);
						oci_bind_by_name($stid3, ':ctime', $ctime);
						oci_bind_by_name($stid3, ':cfees', $fees);
						oci_bind_by_name($stid3, ':ccapacity', $capacity);
						oci_bind_by_name($stid3, ':cvenue', $venue);
						oci_bind_by_name($stid3, ':cid', $cid);
								oci_execute($stid3);


					}else{
						$path  = $_FILES['uploadfile']['tmp_name'];
						$pathname =  $_FILES['uploadfile']['name'];
						move_uploaded_file($path,"class/$pathname");

						$sql3 = "UPDATE class set classtitle = :ctitle , classfile = :cfile , classcontent = :ccontent , dateschedule = :cdate , timeschedule = :ctime , fees = :cfees , capacity = :ccapacity , venue = :cvenue where classid = :cid";
						$stid3 = oci_parse($conn, $sql3);
						oci_bind_by_name($stid3, ':ctitle', $title);
						oci_bind_by_name($stid3, ':cfile', $pathname);
						oci_bind_by_name($stid3, ':ccontent', $content);
						oci_bind_by_name($stid3, ':cdate', $cdate);
						oci_bind_by_name($stid3, ':ctime', $ctime);
						oci_bind_by_name($stid3, ':cfees', $fees);
						oci_bind_by_name($stid3, ':ccapacity', $capacity);
						oci_bind_by_name($stid3, ':cvenue', $venue);
						oci_bind_by_name($stid3, ':cid', $cid);
								oci_execute($stid3);

					}








echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='myclass.php';
</SCRIPT>");



?>
