<?php
if (isset($_SESSION['type']) && $_SESSION['type'] == "Administrator") {
	header("location:Administrator_Module.php");
}else{
	$user = $_SESSION['uname'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Voting Form</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
	
</head>
<body class="bg-1" style="background-image: url('images/b.png');">

<div>
<h1 align="center" style="float: left; margin-left: 10px;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <b>BOARD OF TRUSTEE 4</b></h1>
<a href="skip9.php" style="float: right; margin-right: 50px; margin-top: 15px;"><input align="right" type="button" class="btn btn-primary btn-lg" name="" value="Skip BOT 4"></a>
	<table class="table table-condensed" width='90%' border=0 align="center" cellspacing="10px" style="text-align: center;">
	<tr bgcolor='#CCCCCC'>
		<th>Photo</th>
		<th>Party List</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Year Level</th>
		<th>Action</th>
	</tr>
	<?php
	require 'dbcon.php';
	$sql = "select * from tbl_candidates where Can_Position = 'BOT 4'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		echo "<tr><td colspan='7' align='center'>no candidates added for this position</td></tr>";
	}else{
	while($res = $result->fetch_assoc()) { 	
	echo "<tr>";	
		echo '<td rowspan="2"><img src="uploads/'.$res['Can_image'].'" width="120px" height="120px"></td>';
		echo "<td>".$res['Can_Partylist']."</td>";
		echo "<td>".$res['Can_ID']."</td>";
		echo "<td>".$res['Can_Fname']." ".$res['Can_Mname']." ".$res['Can_Lname']." ".$res['Can_NameExt']."</td>";
		echo "<td>".$res['Can_Gender']."</td>";
		echo "<td>".$res['Can_Ylevel']."</td>";	
		echo "<td><a href = 'vote9.php?nom=$res[Can_ID]'><input type='button' class='btn btn-primary' value='Vote'></a></td>";	
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan='6' align='left'><b>Motto in Life:</b> ".$res['Can_Motto']."</td>";
		echo "</tr>";
	}
}
	?>
	</table>
</div>
</body>
</html>