<style>
.profile-usermenu ul li.active a {
  color: black;
  background-color: silver;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}


</style>
	<link rel="stylesheet" type="text/css" href="css/main.css">

<?php
include('connect.php');


$sus = $_SESSION['username'];


$sql3 = "select * from users where username = :us";
$stid3 = oci_parse($conn, $sql3);
oci_bind_by_name($stid3, ':us', $sus);
oci_execute($stid3);
$row3 = oci_fetch_row($stid3);
$name = $row3[1];
$type = $row3[4];
$uid = $row3[0];
$pic = $row3[7];
$role = $row3[10];


  ?>


<div class="profile-sidebar">
  <!-- SIDEBAR USERPIC -->
  <div class="profile-userpic">
    <img src="profilepic/<?php echo $pic;?>" class="img-responsive" alt="">
  </div>
  <!-- END SIDEBAR USERPIC -->
  <!-- SIDEBAR USER TITLE -->
  <div class="profile-usertitle">
    <div class="profile-usertitle-name">
      <?php echo $name;
      if ( $role == 'Admin'){
        echo " <br /> ( Admin )";
      }
      ?>
    </div>
    <div class="profile-usertitle-job">
      <?php echo $type;?>
    </div>


  </div>
  <!-- END SIDEBAR USER TITLE -->
  <!-- SIDEBAR BUTTONS -->

















  <!-- END SIDEBAR BUTTONS -->
  <!-- SIDEBAR MENU -->

  <!-- END MENU -->
</div>

<div class="modal fade" id="register" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">


        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="heading-agileinfo">REQUEST MEET-UP<span></span></h3>
      </div>




        <div class="modal-body">

          <div style="margin-top: -80px;margin-bottom:100px" class="profile-content2">
          <div class="col-sm-5">

            <a href="profile.php?us=<?php echo $_SESSION['username'];?>" target="_blank">
            <div class="profile-userpic2 hvr-float-shadow">
              <center><img src="images/dahyun.jpg" class="img-responsive" alt="">
              <?php echo $_SESSION['name'];

              ?></center>
            </div>
          </a>
          </div>

          <div class="col-sm-1">
            <center>
            <span class="fas fa-caret-right fa-4x" aria-hidden="true" ></span>
            <h4 ><strong> Meet </strong></h4>
            </center>

         </div>
          <div class="col-sm-5 open">

            <a href="profile.php?us=<?php echo $sus;?>" target="_blank">
            <div class="profile-userpic2 hvr-float-shadow">
              <img src="images/dahyun.jpg" class="img-responsive" alt="">
              <center><?php echo $name;?></center>
            </div>
          </a>
          </div>



        </div>
















<br /><br />
          <form id="reg" role="form" method="post" action="appprocess.php">
            <div class="form-group">
              <input type="hidden" name="appuid" value="<?php echo $uid;?>">
              <input type="text" class="form-control"  name="title" placeholder="Title">
            </div>
            <div class="form-group">

              <input type="text" class="form-control"  name="content" placeholder="Description">
            </div>



            <div class="row2">
              <div class="col-sm-3 col-md-6">
                <div class="form-group">
                  <center><label for="psw"><span class=""></span>Time</label></center>
                  <input type="time" class="form-control" name="atime" >
                </div>
              </div>
              <div class="col-sm-9 col-md-6">
                <div class="form-group">
                  <center><label for="psw"><span class=""></span>Date</label></center>
                  <input type="date" class="form-control" name="adate" >
                </div>
              </div>
            </div>









              <div class="form-group">

                <input type="text" class="form-control"  name="venue" placeholder="Venue">
              </div>



      </div>
      <div class="modal-footer">
        <button style="float:right" type="submit"  class="btn btn-success">Request Meet-up

        </button>

      </div>
      </form>
    </div>
  </div>
</div>








<div class="profile-usermenu">
  <ul class="nav">
    <li  <?php if ( $_SESSION['page'] == 'Overview'){  ?>    class="active" <?php  }  ?> >
      <a href="myprofile.php">
      <i class="glyphicon glyphicon-home"></i>
      Overview </a>
    </li>

    <li  <?php if ( $_SESSION['page'] == 'Myinbox'){  ?>    class="active" <?php  }  ?> >
      <a href="myinbox.php">
      <i class="glyphicon glyphicon-user"></i>
      Inbox </a>
    </li>
    <li  <?php if ( $_SESSION['page'] == 'Myaccount'){  ?>    class="active" <?php  }  ?> >
      <a href="account.php">
      <i class="glyphicon glyphicon-user"></i>
      Account Settings </a>
    </li>
    <li  <?php if ( $_SESSION['page'] == 'Myapp'){  ?>    class="active" <?php  }  ?> >
      <a href="myappointment.php">
      <i class="glyphicon glyphicon-ok"></i>
      My Appointment</a>
    </li>
    <li  <?php if ( $_SESSION['page'] == 'MyQ'){  ?>    class="active" <?php  }  ?> >
      <a href="myquestion.php">
      <i class="glyphicon glyphicon-flag"></i>
      My Question</a>
    </li>
    <li  <?php if ( $_SESSION['page'] == 'MyA'){  ?>    class="active" <?php  }  ?> >
      <a href="myanswer.php">
      <i class="glyphicon glyphicon-flag"></i>
      My Answers</a>
    </li>
    <li  <?php if ( $_SESSION['page'] == 'MyN'){  ?>    class="active" <?php  }  ?> >
      <a href="mynotes.php">
      <i class="glyphicon glyphicon-flag"></i>
      My Notes</a>
    </li>
    <li  <?php if ( $_SESSION['page'] == 'MyC'){  ?>    class="active" <?php  }  ?> >
      <a href="myclass.php">
      <i class="glyphicon glyphicon-flag"></i>
      My Class</a>
    </li>

  </ul>
</div>
