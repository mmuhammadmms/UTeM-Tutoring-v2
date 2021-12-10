	<link rel="stylesheet" href="notification-demo-style.css" type="text/css">

<?php
if (!isset($_SESSION)) session_start();
  if(!isset($_SESSION['role'])){
  ?>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <nav class="link-effect-2" id="link-effect-2">
      <ul class="nav navbar-nav">

        <li><a href="listsubject.php" class="effect-3">Subject</a></li>
        <li><a href="listclass.php" class="effect-3">Class</a></li>
        <li><a href="login.php" class="effect-3">Login</a></li>
        <li><a href="register.php" class="effect-3">Sign Up</a></li>

      </ul>
    </nav>
  </div>

  <?php
}else{


?>
<script type="text/javascript">

function myFunction() {


  $.ajax({
    url: "viewnoti.php",
    type: "POST",
    processData:false,
    success: function(data){
			/* ni naa aku buat */
			if ($("#notification-count").is(":visible")){

				$("#notification-count").hide();
				$("#notification-latest").show();$("#notification-latest").html(data);
			}else{

					if ($("#notification-latest").is(":hidden")){
						$("#notification-latest").show();
						$("#notification-latest").html(data);
					}else{
						$("#notification-latest").hide();
					}

			}

			/* ni naa aku buat */

    },
    error: function(){}
  });
 }

 $(document).ready(function() {












	$('b').click(function(e){

			$("#notification-latest").hide();
						 alert('test');

	});
});



</script>

<?php
include('connect.php');
if(isset($_SESSION['role'])){
$userid = $_SESSION['uid'];

$sql4 = "select count(*) as count from notification where userid = '$userid' and nostatus = 0";
$stid4 = oci_parse($conn, $sql4);
oci_execute($stid4);
$row4 = oci_fetch_array($stid4,OCI_ASSOC);

$count = $row4["COUNT"];
}
 ?>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <nav class="link-effect-2" id="link-effect-2">
    <ul class="nav navbar-nav">

      <li><a href="listsubject.php" class="effect-3">SUBJECT</a></li>
      <li><a href="listclass.php" class="effect-3">CLASS</a></li>
      <li>
				<a style="cursor:pointer" class="effect-3 kk" id="notification-icon" name="button" onclick="myFunction()" class="dropbtn">
					<span class="fa fa-bell " style="margin-top:-4px" aria-hidden="true"></span>
					<span id="notification-count"><?php if ($count != 0 ) echo $count;?></span>
				</a>
			<div id="notification-latest"></div>
		  </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown"><?php echo $_SESSION['username'];?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="myprofile.php">My Profile</a></li>
          <li><a href="myinbox.php">Inbox</a></li>
          <li><a href="myquestion.php">My Questions</a></li>
          <li><a href="myanswer.php">My Answers</a></li>
          <li><a href="myclass.php">My Class</a></li>
          <li><a href="mynotes.php">My Notes</a></li>
          <li><a href="myappointment.php">My Appointment</a></li>
          <li><a href="account.php">Account Settings</a></li>
          <li><a href="logout.php" class="effect-3">Logout</a></li>
        </ul>
      </li>


    </ul>
  </nav>
</div>
<?php
} ?>
