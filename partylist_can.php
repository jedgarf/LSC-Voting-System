
<?php require 'admin_session.php'; ?>

<?php
$pname = $_GET['pname'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
</head>
<body class="bg-1" style="background-image: url('images/b.png');">
<?php
require 'dbcon.php';
date_default_timezone_set("asia/manila");
	$today = date("Y-m-d");
	$curtime = date("H:i:s");
	$sql0 = "select * from tbl_Electionsched";
	$result = $conn->query($sql0);
	$row = $result->fetch_assoc();

	if ($today == $row['start_date'] && $curtime >= $row['start_time'] && $curtime <= $row['end_time']) {
	?>

	<div>
	<a href="add_partylist.php" style="text-decoration-line: none; position: fixed; margin-left: -730px; margin-top: 30px;"><input type="button" class='btn btn-primary btn-lg' value="Back"></a>
	<br><br>
	<h2 align="center" style="margin-left: 10px; margin-top: 50px;"><b><?php echo $pname; ?></b> Partylist</h2><br><br>
	<table align="center" class="table table-condensed" width="100%;">
	<?php

	$sql = "select * from tbl_candidates where Can_Partylist = '$pname'";
	$today = date("Y-m-d");
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr>";
		echo "<td colspan='3'>";
		echo "0 Candidate(s)";
		echo "</td>";
		echo "</tr>";
	}else{
		while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>";
		echo "<img src='uploads/".$row['Can_image']."' class='big' alt='Candidate Photo' width='130px' height='130px'>";
		echo "</td>";
		echo "<td>";
		echo "<b>Position: </b>".$row['Can_Position']."<br>";
		echo "<b>Student ID: </b>".$row['Can_ID']."<br>";
		echo "<b>Full Name: </b>".$row['Can_Fname']." ".$row['Can_Mname']." ".$row['Can_Lname']." ".$row['Can_NameExt']."<br>";

		$dateOfBirth = $row['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<b>Age: </b>".$age." Years old<br>";
		echo "<b>Contact Number: </b>".$row['Can_Contactno']."<br>";
		echo "<b>Motto: </b>".$row['Can_Motto'];
		echo "</td>";
		echo "<td>";
		echo "<button class='btn btn-primary' disabled><span class='glyphicon glyphicon-edit'></span> Edit Contact No. & Motto</button> ";
		echo "<div class='btn btn-primary' disabled><span class='glyphicon glyphicon-trash'></span> Remove</div>";
		echo "</td>";
		echo "</tr>";
		}
	}
	?>
</div>

	<?php
}else{
	?>

	<div>
	<a href="add_partylist.php" style="text-decoration-line: none; position: fixed; margin-left: -730px; margin-top: 30px;"><input type="button" class='btn btn-primary btn-lg' value="Back"></a>
	<br><br>
	<h2 align="center" style="margin-left: 10px; margin-top: 50px;"><b><?php echo $pname; ?></b> Partylist</h2><br><br>
	<table align="center" class="table table-condensed" width="100%;">
	<?php

	$sql = "select * from tbl_candidates where Can_Partylist = '$pname'";
	$today = date("Y-m-d");
	$result = $conn->query($sql);

	if ($result->num_rows == 0) {
		echo "<tr>";
		echo "<td colspan='3'>";
		echo "0 Candidate(s)";
		echo "</td>";
		echo "</tr>";
	}else{
		while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>";
		echo "<img src='uploads/".$row['Can_image']."' class='big' alt='Candidate Photo' width='130px' height='130px'>";
		echo "</td>";
		echo "<td>";
		echo "<b>Position: </b>".$row['Can_Position']."<br>";
		echo "<b>Student ID: </b>".$row['Can_ID']."<br>";
		echo "<b>Full Name: </b>".$row['Can_Fname']." ".$row['Can_Mname']." ".$row['Can_Lname']." ".$row['Can_NameExt']."<br>";

		$dateOfBirth = $row['Can_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<b>Age: </b>".$age." Years old<br>";
		echo "<b>Contact Number: </b>".$row['Can_Contactno']."<br>";
		echo "<b>Motto: </b>".$row['Can_Motto'];
		echo "</td>";
		echo "<td>";
		echo "<a href=\"can_edit_con.php?id=$row[Can_ID]\" class='btn btn-primary'><div><span class='glyphicon glyphicon-edit'></span> Edit Contact No. & Motto</div></a> ";
		echo "<a href=\"can_remove.php?id=$row[Can_ID]\" class='btn btn-primary' onClick=\"return confirm('Are you sure you want to Remove This Candidate?')\"><div><span class='glyphicon glyphicon-trash'></span> Remove</div></a>";
		echo "</td>";
		echo "</tr>";
		}
	}
	?>
</div>

	<?php
}

?>
</body>
</html>