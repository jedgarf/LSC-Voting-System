<?php

if (isset($_POST['submit'])) {

//setting variables
$sdate = $_POST['start_date'];
$stime = date('H:i:00', strtotime($_POST['start_time']));
$etime = date('H:i:00', strtotime($_POST['end_time']));

//sql command
$sql2 = "update tbl_ElectionSched set start_date = str_to_date('$sdate','%M-%d-%Y'), start_time = '$stime', end_time = '$etime' where type = 'schedule'";


if ($etime > $stime) {
if ($conn->query($sql2)) {
  //header("Refresh:0");
  header("location:election_schedule.php");

  ?>

    <script type="text/javascript">
        //alert("Failed to Update!");
         $.notify({
      // options
      message: 'Update Success!' 
      icon: 'glyphicon glyphicon-success-sign',
    },{
  // settings
      type: 'warning'
    });
    </script>

    <?php
    
}else{
    ?>

    <script type="text/javascript">
        //alert("Failed to Update!");
         $.notify({
      // options
      message: 'Failed to Update!' 
      icon: 'glyphicon glyphicon-warning-sign',
    },{
  // settings
      type: 'warning'
    });
    </script>

    <?php
}
}else{
    ?>

    <script type="text/javascript">
        //alert("Schedule is not Valid!");
        $.notify({
      // options
      icon: 'glyphicon glyphicon-warning-sign',
      message: 'Schedule is not Valid!' 
    },{
  // settings
      type: 'warning'
    });
    </script>

    <?php


}
}
?>
