<?php
include('connect.php');
session_start();


$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];


$cust = oci_parse($conn, "select * from users where email = :em and password = :pw ");


oci_bind_by_name($cust, ":em", $_POST['email']);
oci_bind_by_name($cust, ":pw", $_POST['password']);


oci_execute($cust);




$row = oci_fetch_all($cust, $res);



if ($row == 1 ){
  $sql3 = "select userid , role , username , picture , name from users where email = :em";
  $stid3 = oci_parse($conn, $sql3);
  oci_bind_by_name($stid3, ':em', $_SESSION["email"]);
  oci_execute($stid3);
  $row3 = oci_fetch_row($stid3);
  $cid = $row3[0];
  $_SESSION['uid'] = $row3[0];
  $_SESSION['role'] = $row3[1];
  $_SESSION['username'] = $row3[2];
  $_SESSION['name'] = $row3[4];
  $_SESSION['pic'] = $row3[3];
  header("location: myprofile.php");

}else{
  echo "<script>";
  echo "alert('Login Failed. Wrong username or password.')";
  echo "</script>";
  echo "<meta http-equiv=\"refresh\" content=\"0; URL=login.php\">";
}
?>
