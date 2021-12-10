<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$nid = $_POST['nid'];
		$title = $_POST['title'];
		$content = $_POST['content'];


					if ($_FILES['uploadfile']['name'] == ''){
						$sql3 = "UPDATE notes set notestitle = :title , notescontent = :content where notesid = :nid ";
					}else{
						$path  = $_FILES['uploadfile']['tmp_name'];
						$pathname =  $_FILES['uploadfile']['name'];
						move_uploaded_file($path,"notes/$pathname");
						$sql3 = "UPDATE notes set notestitle = :title , notescontent = :content , notesfile = '$pathname' where notesid = :nid ";
					}

							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':title', $title);
							oci_bind_by_name($stid3, ':content', $content);
							oci_bind_by_name($stid3, ':nid', $nid);
							oci_execute($stid3);




echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='mynotes.php';
</SCRIPT>");


?>
