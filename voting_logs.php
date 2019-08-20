
<?php require 'admin_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Voting Logs</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<style type="text/css">
		label{
			font-size: 16px;
		}
		td{
			text-align: center;
			padding: 50px;
		}
	</style>
</head>
<body class="bg-1" style="background-image: url('images/b.png'); background-attachment: fixed; background-size: cover;">
<?php

//Getting Data
$id = $_GET['id'];
$datetime = $_GET['datetime'];

//database connection
require 'dbcon.php';

//SQL Command
$sql0 = "select * from tbl_students where Acc_ID = '$id'";
$result0 = $conn->query($sql0);

//Gathering Fullname
$row0 = $result0->fetch_assoc();
$fullname = $row0['Acc_Fname']." ".$row0['Acc_Mname']." ".$row0['Acc_Lname']." ".$row0['Acc_NameExt'];
$fname = $row0['Acc_Fname'];

//Gathering Candidates
$sql = "select * from tbl_voting_logs where L_Id = '$id' and L_Datetime = '$datetime'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$chairman_photo = $row['L_Chairman_Photo'];
$chairman = $row['L_Chairman'];

$vicechairman_photo = $row['L_ViceChairman_Photo'];
$vicechairman = $row['L_ViceChairman'];

$secretary_photo = $row['L_Secretary_Photo'];
$secretary = $row['L_Secretary'];

$treasurer_photo = $row['L_Treasurer_Photo'];
$treasurer = $row['L_Treasurer'];

$busiman_photo = $row['L_BusinessManager_Photo'];
$busiman = $row['L_BusinessManager'];

$bot1_photo = $row['L_BOT1_Photo'];
$bot1 = $row['L_BOT1'];

$bot2_photo = $row['L_BOT2_Photo'];
$bot2 = $row['L_BOT2'];

$bot3_photo = $row['L_BOT3_Photo'];
$bot3 = $row['L_BOT3'];

$bot4_photo = $row['L_BOT4_Photo'];
$bot4 = $row['L_BOT4'];
?>
<a href="vote_history.php" style="text-decoration-line: none;">
	<div style="position: fixed; margin-left: -660px; opacity: 0.7;" id="back" class="btn btn-primary btn-lg">
	<label>Back</label>
</div>
</a>
<br>
<h2 align="center"><?php echo $fname; ?>'s Candidate List:</h2>
<div align="center" id="printarea">
	<table>
		<tr>
			<td>
			<label>Chairman:</label><br><br>
			<img alt="No Selected for Chairman" src="uploads/<?php echo $chairman_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $chairman; ?></h4>	
			</td>
			<td>
			<label>Vice Chairman:</label><br><br>
			<img alt="No Selected for Vice Chairman" src="uploads/<?php echo $vicechairman_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $vicechairman; ?></h4>		
			</td>
			<td>
			<label>Secretary:</label><br><br>
			<img alt="No Selected for Secretary" src="uploads/<?php echo $secretary_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $secretary; ?></h4>		
			</td>
			<td>
			<label>Treasurer:</label><br><br>
			<img alt="No Selected for Treasurer" src="uploads/<?php echo $treasurer_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $treasurer; ?></h4>			
			</td>
			<td>
			<label>Business Manager:</label><br><br>
			<img alt="No Selected for Business Manager" src="uploads/<?php echo $busiman_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $busiman; ?></h4>
			</td>
		</tr>
		<tr>
			<td>
			<label>Board of Trustee:</label><br><br>
			<img alt="No Selected for Board of Trustee 1" src="uploads/<?php echo $bot1_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $bot1; ?></h4>
		</td>
		<td>
			<img alt="No Selected for Board of Trustee 2" src="uploads/<?php echo $bot2_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $bot2; ?></h4>
		</td><td>
			<img alt="No Selected for Board of Trustee 3" src="uploads/<?php echo $bot3_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $bot3; ?></h4>
		</td><td>
			<img alt="No Selected for Board of Trustee 4" src="uploads/<?php echo $bot4_photo; ?>" class="big" width = "130px" height = "130px">
			<h4><?php echo $bot4; ?></h4>
			</td>
		</tr>

	</table>
	</div>

</body>
</html>