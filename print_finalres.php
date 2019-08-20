
<?php require 'admin_session.php'; ?>

<!DOCTYPE html>
<htmls>
<head>	
	<title></title>
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body class="bg-1">
<div id="printarea">

	<style type="text/css">
	#printheader{
		text-align: center; 	
		font-weight: bolder;
		width: 100%;
	}
		th{
			text-align: center;
		}
	</style>

<div id="printheader"><hr>
<img id="logo1" src="images/ne.png" width="98px" height="98px" style="margin-right: -80px; margin-left: 10px; margin-top: -8px;" align="left">
	<small>REPUBLIC OF THE PHILIPPINES</small><br>
	<big>NUEVA ECIJA UNIVERSITY OF SCIENCE AND TECHNOLOGY</big><br>
	<small>Gapan Academic Extension Campus</small><br>
	<small>Km. 92 Maharlika Highway, Bayanihan, Gapan City, 3105, Nueva Ecija</small><br>
	<img id="logo2" src="images/neust.png" width="103px" height="98px" style="margin-top: -87px; margin-right: 10px;" align="right">
<hr></div><br>
<?php
date_default_timezone_set("asia/manila");
	$y1 = date("Y");
?>
<h2 align="center"><b>Final Results of LSC <?php echo $y1; ?> Election</b></h2><br>
<?php
	require 'dbcon.php';
	$today = date("Y-m-d");

	$sql1 = "select count(*) as count from tbl_students";
	$result1 = $conn->query($sql1);
	
	$count = $result1->fetch_assoc();
	$totalstud = $count['count'];
?>
	<form method="POST">
	<h2 align="center">Chairman:</h2>
		<table class="table table-condensed" width='100%' border=0 align="center" cellspacing="10px" style="text-align: center;">

	<tr bgcolor='#CCCCCC'>
		<th>Photo</th>
		<th>Party List</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Course</th>
		<th>Year Level</th>
		<th>Total Vote(s)</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Chairman' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '9'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
	}else{
		while($res = $result->fetch_assoc()) { 		
		echo "<tr>";
		echo '<td rowspan = "2"><img src="uploads/'.$res['Can_image'].'" class="big" width="80px" height="80px"></td>';
		echo "<td>".$res['Can_Partylist']."</td>";
		echo "<td>".$res['Can_ID']."</td>";
		echo "<td>".$res['Can_Fname']." ";
		echo $res['Can_Mname']." ";
		echo $res['Can_Lname']." ";
		echo $res['Can_NameExt']."</td>";
		echo "<td>".$res['Can_Gender']."</td>";
		echo "<td>".$res['Can_Course']."</td>";
		echo "<td>".$res['Can_Ylevel']."</td>";

		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);

		echo "<td>".$totalvotes." Vote(s) / ".$percent."%</td>";				
		echo "</tr>";
		echo "<tr>";
	}
	}
	?>
	</table>
	</form>
	<form method="POST">
	<h2 align="center"> Vice Chairman:</h2>
		<table class="table table-condensed" width='100%' border=0 align="center" cellspacing="10px" style="text-align: center;">

	<tr bgcolor='#CCCCCC'>
		<th>Photo</th>
		<th>Party List</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Course</th>
		<th>Year Level</th>
		<th>Total Vote(s)</th>
	</tr>
	<?php 
	$sql = "select * from tbl_Candidates where Can_Position = 'Vice Chairman' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '9'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
	}else{
		while($res = $result->fetch_assoc()) { 		
		echo "<tr>";
		echo '<td rowspan = "2"><img src="uploads/'.$res['Can_image'].'" class="big" width="80px" height="80px"></td>';
		echo "<td>".$res['Can_Partylist']."</td>";
		echo "<td>".$res['Can_ID']."</td>";
		echo "<td>".$res['Can_Fname']." ";
		echo $res['Can_Mname']." ";
		echo $res['Can_Lname']." ";
		echo $res['Can_NameExt']."</td>";
		echo "<td>".$res['Can_Gender']."</td>";
		echo "<td>".$res['Can_Course']."</td>";
		echo "<td>".$res['Can_Ylevel']."</td>";	
		
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);

		echo "<td>".$totalvotes." Vote(s) / ".$percent."%</td>";				
		echo "</tr>";
		echo "<tr>";
	}
	}
	?>
	</table>
	</form>
	<form method="POST">
	<h2 align="center"> Secretary:</h2>
		<table class="table table-condensed" width='100%' border=0 align="center" cellspacing="10px" style="text-align: center;">

	<tr bgcolor='#CCCCCC'>
		<th>Photo</th>
		<th>Party List</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Course</th>
		<th>Year Level</th>
		<th>Total Vote(s)</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Secretary' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '9'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
	}else{
		while($res = $result->fetch_assoc()) { 		
		echo "<tr>";
		echo '<td rowspan = "2"><img src="uploads/'.$res['Can_image'].'" class="big" width="80px" height="80px"></td>';
		echo "<td>".$res['Can_Partylist']."</td>";
		echo "<td>".$res['Can_ID']."</td>";
		echo "<td>".$res['Can_Fname']." ";
		echo $res['Can_Mname']." ";
		echo $res['Can_Lname']." ";
		echo $res['Can_NameExt']."</td>";
		echo "<td>".$res['Can_Gender']."</td>";
		echo "<td>".$res['Can_Course']."</td>";
		echo "<td>".$res['Can_Ylevel']."</td>";	
		
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);

		echo "<td>".$totalvotes." Vote(s) / ".$percent."%</td>";				
		echo "</tr>";
		echo "<tr>";
	}
	}
	?>
	</table>
	</form>
	<form method="POST">
	<h2 align="center"> Treasurer:</h2>
		<table class="table table-condensed" width='100%' border=0 align="center" cellspacing="10px" style="text-align: center;">

	<tr bgcolor='#CCCCCC'>
		<th>Photo</th>
		<th>Party List</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Course</th>
		<th>Year Level</th>
		<th>Total Vote(s)</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Treasurer' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '9'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
	}else{
		while($res = $result->fetch_assoc()) { 		
		echo "<tr>";
		echo '<td rowspan = "2"><img src="uploads/'.$res['Can_image'].'" class="big" width="80px" height="80px"></td>';
		echo "<td>".$res['Can_Partylist']."</td>";
		echo "<td>".$res['Can_ID']."</td>";
		echo "<td>".$res['Can_Fname']." ";
		echo $res['Can_Mname']." ";
		echo $res['Can_Lname']." ";
		echo $res['Can_NameExt']."</td>";
		echo "<td>".$res['Can_Gender']."</td>";
		echo "<td>".$res['Can_Course']."</td>";
		echo "<td>".$res['Can_Ylevel']."</td>";	
		
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);

		echo "<td>".$totalvotes." Vote(s) / ".$percent."%</td>";				
		echo "</tr>";
		echo "<tr>";
	}
	}
	?>
	</table>
	</form>
	<form method="POST">
	<h2 align="center"> Business Manager:</h2>
		<table class="table table-condensed" width='100%' border=0 align="center" cellspacing="10px" style="text-align: center;">

	<tr bgcolor='#CCCCCC'>
		<th>Photo</th>
		<th>Party List</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Course</th>
		<th>Year Level</th>
		<th>Total Vote(s)</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Business Manager' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '9'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
	}else{
		while($res = $result->fetch_assoc()) { 		
		echo "<tr>";
		echo '<td rowspan = "2"><img src="uploads/'.$res['Can_image'].'" class="big" width="80px" height="80px"></td>';
		echo "<td>".$res['Can_Partylist']."</td>";
		echo "<td>".$res['Can_ID']."</td>";
		echo "<td>".$res['Can_Fname']." ";
		echo $res['Can_Mname']." ";
		echo $res['Can_Lname']." ";
		echo $res['Can_NameExt']."</td>";
		echo "<td>".$res['Can_Gender']."</td>";
		echo "<td>".$res['Can_Course']."</td>";
		echo "<td>".$res['Can_Ylevel']."</td>";	
		
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);

		echo "<td>".$totalvotes." Vote(s) / ".$percent."%</td>";				
		echo "</tr>";
		echo "<tr>";
	}
	}
	?>
	</table>
	</form>
	</form>
	<form method="POST">
	<h2 align="center"> Board Of Trustees:</h2>
		<table class="table table-condensed" width='100%' border=0 align="center" cellspacing="10px" style="text-align: center;">

	<tr bgcolor='#CCCCCC'>
		<th>Photo</th>
		<th>Party List</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Course</th>
		<th>Year Level</th>
		<th>Total Vote(s)</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'BOT 1' || Can_Position = 'BOT 2' || Can_Position = 'BOT 3' || 
	Can_Position = 'BOT 4' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '9'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
	}else{
		while($res = $result->fetch_assoc()) { 		
		echo "<tr>";
		echo '<td rowspan = "2"><img src="uploads/'.$res['Can_image'].'" class="big" width="80px" height="80px"></td>';
		echo "<td>".$res['Can_Partylist']."</td>";
		echo "<td>".$res['Can_ID']."</td>";
		echo "<td>".$res['Can_Fname']." ";
		echo $res['Can_Mname']." ";
		echo $res['Can_Lname']." ";
		echo $res['Can_NameExt']."</td>";
		echo "<td>".$res['Can_Gender']."</td>";
		echo "<td>".$res['Can_Course']."</td>";
		echo "<td>".$res['Can_Ylevel']."</td>";		
		
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);

		echo "<td>".$totalvotes." Vote(s) / ".$percent."%</td>";				
		echo "</tr>";
		echo "<tr>";
	}
	}
	?>
	</table>
	</form>
</div>

	<script type="text/javascript">
		var toPrint = document.getElementById('printarea');
      var popupWin = window.open('', '_blank', 'width=1400,height=800,location=no,left=200px');

        popupWin.document.open();
        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="CSS/style.css"><link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"></head><body onload="window.print()">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write("<div align='right' style='margin-right:30px; margin-top:150px;'>");
          popupWin.document.write("<p>___________________");
          popupWin.document.write("<br>Campus Administrator</p>");
          popupWin.document.write("</div>");
         popupWin.document.write('</body>');
        popupWin.document.write('</html>');
        popupWin.document.close();
	</script>

	<script type="text/javascript">
		window.location = "all_candidates.php";
	</script>

</body>
</html>