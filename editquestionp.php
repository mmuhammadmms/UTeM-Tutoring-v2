<?php
session_start();
include ('connect.php');
		$userid = $_SESSION['uid'];
		$qid = $_POST['qid'];
		$title = $_POST['title'];
		$content = $_POST['content'];


					if ($_FILES['uploadfile']['name'] == ''){
						$sql3 = "UPDATE question set questiontitle = :title , questioncontent = :content where questionid = :qid ";
					}else{
						$path  = $_FILES['uploadfile']['tmp_name'];
						$pathname =  $_FILES['uploadfile']['name'];
						move_uploaded_file($path,"question/$pathname");
						$sql3 = "UPDATE question set questiontitle = :title , questioncontent = :content , questionattach = '$pathname' where questionid = :qid ";
					}

							$stid3 = oci_parse($conn, $sql3);
							oci_bind_by_name($stid3, ':title', $title);
							oci_bind_by_name($stid3, ':content', $content);
							oci_bind_by_name($stid3, ':qid', $qid);
							oci_execute($stid3);





echo ("<SCRIPT LANGUAGE='JavaScript'>

window.location.href='myquestion.php';
</SCRIPT>");



?>
