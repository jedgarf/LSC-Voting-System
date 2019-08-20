
<?php require 'admin_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="jquery/highlight_disabled.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <!--<script type="text/javascript" src="js/modal.js"></script>-->
    <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css">

<style type="text/css">
body{
  z-index: 2;
}

.navbar-fixed-left .navbar-nav li .a{
  color: white;
}
.navbar-fixed-left .navbar-nav li .a:hover{
  color: yellow;
}
.navbar-fixed-left .navbar-nav li .a:active{
  color: yellow;
}

 /* CSS used here will be applied after bootstrap.css */
.navbar-fixed-left {
  background-color: blue;
  width: 300px;
  position: fixed;
  border-radius: 0;
  height: 100%;
}

.navbar-fixed-left .navbar-nav > li {
  float: none;  /* Cancel default li float: left */
  width: 300px;
  font-size: 20px;
  font-weight: bolder;
}

.navbar-fixed-left + .container {
  padding-left: 260px;
}

.container {
  height: 100px;
}

.wrapper {
  margin-left: 200px;
}
</style>

</head>
<body class="bg-1" style="background-image: url('images/b.png');">


<?php
require 'dbcon.php';
#$uname = $_COOKIE['uname'];
$sql2 = "select * from tbl_administrator where Acc_Uname = '$user'";
$res = $conn->query($sql2);
$row1 = $res->fetch_assoc();

?>
<input type="hidden" name="quest" id="quest" value="<?php echo $row1['Acc_Quest']; ?>" readonly>
<input type="hidden" name="ans" id="ans" value="<?php echo $row1['Acc_Ans']; ?>" readonly>

<!--navigation-->
<div class="navbar navbar-inverse navbar-fixed-left">
  <a class="navbar-brand" href="system_setting.php">
    <span class="glyphicon glyphicon-wrench"></span> <label><b>SYSTEM SETTINGS</b></label>
  </a>
  <br><br><br>
  <ul class="nav navbar-nav">

    <li><a href="#officer" class="a">ADD ELECTION OFFICER</a></li>

    <li><a href="#election_schedule" class="a"> ELECTION SCHEDULE </a></li> 

    <br><br>

<?php 
  //SQL Commands
    $sql = "select Acc_Pword from tbl_administrator where Acc_Type = 'Administrator'";
    $sql1 = "select Acc_Pword from tbl_administrator where Acc_Type = 'Election_Chairman'";

    //Querying SQL Commands
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);

    //Fetching Data
    $row = $result->fetch_assoc();
    $upsec1 = $row['Acc_Pword'];

    $row1 = $result1->fetch_assoc();
    $upsec = $row1['Acc_Pword'];
  ?>

   <li><a class="a" id="resetvote">RESET VOTING COUNTS</a></li>

   <?php
   date_default_timezone_set("asia/manila");
  $today = date("Y-m-d");
  $curtime = date("H:i:s");
  $sql0 = "select * from tbl_Electionsched";
  $result = $conn->query($sql0);
  $row = $result->fetch_assoc();

  if ($today == $row['start_date'] && $curtime >= $row['start_time'] && $curtime <= $row['end_time']) {
    ?>

<li><a class="a" onClick="return alert('Voting is Ingoing!')">RESET FULL ELECTION</a></li>

<?php }else{ ?>

<li><a id="fullreset" href="full_reset.php" onClick="return confirm('Are You Sure You Want To Reset Full Election!')" class="a">RESET FULL ELECTION</a></li>

  
<?php } ?>

<br><br>

<li><a href="#about" class="a">ABOUT US</a></li>

  </ul>
</div>
<!--end navigation-->



<div class="wrapper" style="width: 900px !important; margin-left: 300px;">
  
<!-- 1st section-->
<div class="container" id="election_schedule">
 <div class="row">
   <h2>Election Schedule</h2>

   <?php require 'election_schedule.php'; ?>

 </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<hr>

<!-- 2nd section-->
<div class="container-fluid" id="officer">
  <h2>Add Election Officer</h2>
 <div class="row" style="margin-left: 150px !important;">

<?php require 'add_officers.php'; ?>

 </div>
</div>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<hr>

<!-- 3rd section-->
<div class="container-fluid" id="about">
 <div class="row" style="margin-left: 220px;">

<?php require 'about.php'; ?>

 </div>
</div>

</div>


</body>

<?php require 'resetvotemodal.php'; ?>

</html>