<?php
	include ('connect.php');

session_start();

			$uid = $_SESSION['uid'];
			$uname = $_POST['fname'];
			$utype = $_POST['ftype'];
			$upass = $_POST['fpass'];



		if ($_FILES['uploadfile']['name'] == ''){

			$sql3 = "UPDATE users set name = '$uname' , type = '$utype' , password = '$upass'  where userid = '$uid'";
			$stid3 = oci_parse($conn, $sql3);

				oci_execute($stid3);

		}else{
			$path  = $_FILES['uploadfile']['tmp_name'];
			$pathname =  $_FILES['uploadfile']['name'];
			move_uploaded_file($path,"profilepic/$pathname");

			$sql3 = "UPDATE users set name = '$uname' , type = '$utype' , password = '$upass' , picture = '$pathname' where userid = '$uid'";
			$stid3 = oci_parse($conn, $sql3);

				oci_execute($stid3);
				$_SESSION['pic'] = $pathname;

		}


	echo ("<SCRIPT LANGUAGE='JavaScript'>

 window.location.href='account.php';
 </SCRIPT>");


 ?>
