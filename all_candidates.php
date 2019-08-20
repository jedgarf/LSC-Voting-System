
<?php require 'admin_session.php'; ?>
<?php require 'dbcon.php'; ?>

<?php
    header("refresh: 30;");
?>

<!DOCTYPE html>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
		th{
			text-align: center;
		}
		td{
			font-size: 20px;
		}
	</style>
</head>
<body class="bg-1" style="background-image: url('images/b.png');">
	<?php
	date_default_timezone_set("asia/manila");
	$today = date("Y-m-d");
	$curtime = date("H:i:s");
	$sql0 = "select * from tbl_Electionsched";
	$result = $conn->query($sql0);
	$row = $result->fetch_assoc();

	if ($today == $row['start_date'] && $curtime >= $row['start_time'] && $curtime <= $row['end_time']) {
		?>

		<button class='btn btn-primary' style="position: fixed; margin-left: 480px; margin-top: 20px; opacity: 0.7;" disabled>
		<span class="glyphicon glyphicon-print"></span>
		<label>PRINT RESULTS</label>
		</button>

		<?php
	}else{
		?>

		<a href="print_finalres.php" style="position: fixed; margin-left: 480px; margin-top: 20px; opacity: 0.7;">
		<div class='btn btn-primary' id="myButton" data-loading-text="Loading...">
		<span class="glyphicon glyphicon-print"></span>
		<label>PRINT RESULTS</label>
		</div>
		</a>

		<?php
	}
	?>

	<script>
  $('#myButton').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
</script>
	
	<br><br>
<?php
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
		<th>Age</th>
		<th>Course</th>
		<th>Year Level</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Chairman' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '8'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
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
 
		$dateOfBirth = $res['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<td>".$age."</td>";
		echo "<td>".$res['Can_Course']."</td>";	
		echo "<td>".$res['Can_Ylevel']."</td>";		
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan = '7'>";

		echo '<div class="progress">';
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);
		echo '<div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percent.'%">';
		echo $res['Can_Votes']." Votes / ".$percent."%</div>";
		echo '</div>';

		echo "</td>";
		echo "</tr>";
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
		<th>Age</th>
		<th>Course</th>
		<th>Year Level</th>
	</tr>
	<?php 
	$sql = "select * from tbl_Candidates where Can_Position = 'Vice Chairman' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '8'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
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

		$dateOfBirth = $res['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<td>".$age."</td>";
		echo "<td>".$res['Can_Course']."</td>";	
		echo "<td>".$res['Can_Ylevel']."</td>";	
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan = '7'>";

		echo '<div class="progress">';
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);
		echo '<div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percent.'%">';
		echo $res['Can_Votes']." Votes / ".$percent."%</div>";
		echo '</div>';

		echo "</td>";
		echo "</tr>";
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
		<th>Age</th>
		<th>Course</th>
		<th>Year Level</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Secretary' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '8'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
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

		$dateOfBirth = $res['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<td>".$age."</td>";
		echo "<td>".$res['Can_Course']."</td>";	
		echo "<td>".$res['Can_Ylevel']."</td>";	
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan = '7'>";

		echo '<div class="progress">';
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);
		echo '<div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percent.'%">';
		echo $res['Can_Votes']." Votes / ".$percent."%</div>";
		echo '</div>';

		echo "</td>";
		echo "</tr>";
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
		<th>Age</th>
		<th>Course</th>
		<th>Year Level</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Treasurer' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '8'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
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

		$dateOfBirth = $res['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<td>".$age."</td>";
		echo "<td>".$res['Can_Course']."</td>";	
		echo "<td>".$res['Can_Ylevel']."</td>";	
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan = '7'>";

		echo '<div class="progress">';
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);
		echo '<div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percent.'%">';
		echo $res['Can_Votes']." Votes / ".$percent."%</div>";
		echo '</div>';

		echo "</td>";
		echo "</tr>";
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
		<th>Age</th>
		<th>Course</th>
		<th>Year Level</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'Business Manager' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '8'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
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

		$dateOfBirth = $res['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<td>".$age."</td>";
		echo "<td>".$res['Can_Course']."</td>";	
		echo "<td>".$res['Can_Ylevel']."</td>";	
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan = '7'>";

		echo '<div class="progress">';
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);
		echo '<div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percent.'%">';
		echo $res['Can_Votes']." Votes / ".$percent."%</div>";
		echo '</div>';

		echo "</td>";
		echo "</tr>";
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
		<th>Age</th>	
		<th>Course</th>
		<th>Year Level</th>
	</tr>
	<?php
	$sql = "select * from tbl_Candidates where Can_Position = 'BOT 1' || Can_Position = 'BOT 2' || Can_Position = 'BOT 3' || 
	Can_Position = 'BOT 4' order by Can_Votes DESC";
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr><td colspan = '8'><h4 align = 'center'>0 Candidates.</h4></td></tr>";
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

		$dateOfBirth = $res['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<td>".$age."</td>";
		echo "<td>".$res['Can_Course']."</td>";	
		echo "<td>".$res['Can_Ylevel']."</td>";		
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan = '7'>";

		echo '<div class="progress">';
		$totalvotes = $res['Can_Votes'];
		$per = ($totalvotes / $totalstud) * 100;
		$percent = number_format($per, 2);
		echo '<div class="progress-bar" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percent.'%">';
		echo $res['Can_Votes']." Votes / ".$percent."%</div>";
		echo '</div>';

		echo "</td>";
		echo "</tr>";
	}
	}
	?>
	</table>
	</form>
</body>
</html>