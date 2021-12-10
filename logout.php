<?php
include('connect.php');
session_start();

	unset($_SESSION['username']);
	unset($_SESSION['role']);
	unset($_SESSION['password']);
  session_destroy();
	$_SESSION = array();
	echo "<meta http-equiv=\"refresh\" content=\"1;URL=index.php\">";
?>
