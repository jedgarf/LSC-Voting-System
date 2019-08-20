<!DOCTYPE html>
<html>
<head>
  <title></title>

  <script type="text/javascript" src="bootstrap-notify-master/bootstrap-notify.min.js"></script>

</head>
<body>

 <br><br><br>

   <?php
    require 'dbcon.php';
    $sql = "select start_date, start_time, end_time from tbl_ElectionSched";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>

<form id="election_sched_save" method="POST" class="form-inline" action="election_schedule_save_query.php">

  <br>
    <label>Set The Election Date:</label>

  <div>

    <div class="input-group datepicker">

      <input id="pick1" type="text" class="lfield" name="start_date" value="<?php echo date('F-d-Y', strtotime($row['start_date'])); ?>" readonly required></input>
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </span>

    </div>

  </div>

<script type="text/javascript">
  $(function() {
    $('#pick1').datepicker({
         format: 'MM-dd-yyyy',
         orientation: 'right',
         align: 'right',
         todayHighlight: true,
         autoclose: true
    });
  });
</script><br><br><br><br>

    <label>Set The Time Interval:</label>

 <div>

    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">

    <input type="text" class="lfield" name="start_time" value="<?php echo date('h:iA', strtotime($row['start_time'])); ?>" readonly required></input>
     <span class="input-group-addon">
      <span class="glyphicon glyphicon-time"></span>
    </span>

    </div> - 

    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">

    <input type="text" class="lfield" name="end_time" value="<?php echo date('h:iA', strtotime($row['end_time'])); ?>" readonly required></input>
     <span class="input-group-addon">
      <span class="glyphicon glyphicon-time"></span>
    </span>

  </div>

</div>

 <br><br>

<script type="text/javascript">
    $('.clockpicker').clockpicker({
      twelvehour:true,
      placement: 'top',
      align: 'left'
    });
</script>
<div class="btn-group">
  <button onclick="printsched()" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-print"></span> Print Schedule</button>
&nbsp;&nbsp;&nbsp;
<input type="reset" name="reset" class="btn btn-primary btn-lg" value="Clear">
&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
</div>

<script type="text/javascript">
function printsched() {
    var toPrint = document.getElementById('printarea');
          var popupWin = window.open('', '_blank', 'width=1000,height=700,location=no,left=200px');

          popupWin.document.open();
          popupWin.document.write('<!DOCTYPE html><html><head><title>::Schedule Print::</title><link rel="stylesheet" type="text/css" href="CSS/style.css"><link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"><style type="text/css">label{font-size: 16px;}td{text-align: center;padding: 50px;}</style></head><body onload="window.print()">');

          popupWin.document.write('<div id="printhead"><hr><img id="logo1" src="images/neust.png" width="110px" height="105px" style="margin-right: -80px; margin-left: 10px; margin-top: -8px;" align="left"><small>REPUBLIC OF THE PHILIPPINES</small><br><big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br><small>Gapan Academic Extension Campus</small><br><small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br><big align="center" style="margin-right: -125px;" >Local Student Council Voting System</big><img id="logo2" src="images/ne.png" width="105px" height="105px" style="margin-top: -87px; margin-right: 10px;" align="right"><hr></div>');

          popupWin.document.write("<h1 align = 'center'><b>Election Schedule:</b></h1>");
          popupWin.document.write("<br><br>");
          popupWin.document.write("<div align='center'>");
          popupWin.document.write("<h1><?php echo date('F-d-Y', strtotime($row['start_date'])); ?></h1>");
          popupWin.document.write("<h2><?php echo date('h:iA', strtotime($row['start_time'])); ?> - <?php echo date('h:iA', strtotime($row['end_time'])); ?></h2>");
          popupWin.document.write("</div>");
          popupWin.document.write("<div align='right' style='margin-right:30px; margin-top:150px;'>");
          popupWin.document.write("<p>___________________");
          popupWin.document.write("<br>Campus Administrator</p>");
          popupWin.document.write("</div>");
          popupWin.document.write("</body>");
          popupWin.document.write('</html>');
          popupWin.document.close();
  }  
</script>
</form>

<script type="text/javascript">
  $(document).ready(function () {
    $("#election_sched_save").submit(function (evt) {
      evt.preventDefault();

      $.ajax({
        url: $(this).attr("action"),
        type: "POST",       
        data: $(this).serialize(),

        success: function (response) {
          //console.log(response.responseText);

          if (response == "success") {

            $.notify({
            // options
            message: 'Update Success!',
            icon: 'glyphicon glyphicon-success-sign'
          },{
        // settings
            type: 'warning'
          });
             
          } else if (response == "error") {

            $.notify({
                // options
                message: 'Failed to Update!',
                icon: 'glyphicon glyphicon-warning-sign'
              },{
            // settings
                type: 'warning'
              });

            } else if (response == "invalid_time") {
              //alert("Schedule is not Valid!");
                $.notify({
                  // options
                  icon: 'glyphicon glyphicon-warning-sign',
                  message: 'Schedule is not Valid!' 
                },{
              // settings
                  type: 'warning'
                });
                }

            },
            error: function (error) {
              console.log(error.responseText);
            }

          });
    });
  });
</script>

</body>
</html>