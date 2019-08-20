<!-- session-admin -->
<?php require 'admin_session.php'; ?>

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

		<div id="addplist" align="center" style="width: 40%; margin-left: 400px;" hidden>
	<form method="POST" autocomplete="off">
	<h2 align="center">Add Partylist</h2>
	<br>
	<input type="text" class="form-control" name="ptname" placeholder="Partylist Name" required=""><br>
	<textarea cols="70" name="ptdesc" class="form-control" rows="6" maxlength="50" placeholder="Partylist Description...." required></textarea><br><br>
	<input type="button" id="close_plist" class='btn btn-primary btn-lg' value="Close">

	<script type="text/javascript">
	$("#close_plist").click(function () {
		$("#addplist").hide(1000);
		$("#add").show(1000);
	});
</script>

	<input type="reset" class='btn btn-primary btn-lg' value="Reset">
	<input type="submit" class='btn btn-primary btn-lg' name="sub" value="Save">
	<?php
	require 'dbcon.php';
	if (isset($_POST['sub'])) {
		$ptn = $_POST['ptname'];
		$ptd = $_POST['ptdesc'];
		$sql = "insert into tbl_partylist values ('$ptn','$ptd')";
		if ($conn->query($sql)) {
			?>

			<script type="text/javascript">
				window.alert("<?php echo $ptn;?> is Successfully Added!");
			</script>

			<?php
		}else{
			?>

			<script type="text/javascript">
				window.alert("This Partylist is Already Added!");
			</script>

			<?php
		}
	}
	?>
	</form>
</div><br><br>
<div>
<a href="independent_can.php">
<button type="button" class='btn btn-primary' style="float: left; margin-top: -30px; margin-left: 20px;"><span class='glyphicon glyphicon-user'></span> Independent Candidate(s)</button>
</a>	
</div>
<center>
<button id="add" type="button" class='btn btn-primary' style="margin-left: -220px;"><span class='glyphicon glyphicon-plus'></span> Add Partylist</button>
</center>
<br><br>

<script type="text/javascript">
	$("#add").click(function () {
		$("#addplist").show(1000);
		$("#add").hide(1000);
	});
</script>

<div id="listplist">
	<?php
	$sql1 = "select * from tbl_partylist order by Plist_Name";
	$res = $conn->query($sql1);
	echo "<table class='table table-condensed' width = '30%'>";
	if ($res->num_rows == 0) {
		echo "<tr><td colspan='3'>No Partylist Added</td></tr>";
	}else{
		while ($row = $res->fetch_assoc()) {
			echo "<tr>";
			echo "<th>Partylist Name</th>";
			echo "<th colspan='2'>Partylist Description</th>";
			echo "<th>Actions</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>".$row['Plist_Name']."</td>";
			echo "<td colspan='2'>".$row['Plist_Desc']."</td>";
			echo "<td>";

			echo "<a href=\"partylist_can.php?pname=$row[Plist_Name]\" class='btn btn-primary'><div><span class='glyphicon glyphicon-eye-open'></span> View All Candidates</div></a> ";

			echo "<div class='btn btn-primary' disabled><span class='glyphicon glyphicon-edit'></span> Update Partylist</div> ";

			echo "<div class='btn btn-primary' disabled><span class='glyphicon glyphicon-trash'></span> Remove</div>";

			echo "</td>";
			echo "</tr>";
			echo "<tr><td colspan='4'><br></td></tr>";
			}
		}
		echo "</table>";
		
	?>
</div>

		<?php
	
}else{

	?>

	<div id="addplist" align="center" style="width: 40%; margin-left: 400px;" hidden>
	<form method="POST" autocomplete="off">
	<h2 align="center">Add Partylist</h2>
	<br>
	<input type="text" class="form-control" name="ptname" placeholder="Partylist Name" required=""><br>
	<textarea cols="70" name="ptdesc" class="form-control" rows="6" maxlength="50" placeholder="Partylist Description...." required></textarea><br><br>
	<input type="button" id="close_plist" class='btn btn-primary btn-lg' value="Close">

	<script type="text/javascript">
	$("#close_plist").click(function () {
		$("#addplist").hide(1000);
		$("#add").show(1000);
	});
</script>

	<input type="reset" class='btn btn-primary btn-lg' value="Reset">
	<input type="submit" class='btn btn-primary btn-lg' name="sub" value="Save">
	<?php
	require 'dbcon.php';
	if (isset($_POST['sub'])) {
		$ptn = $_POST['ptname'];
		$ptd = $_POST['ptdesc'];
		$sql = "insert into tbl_partylist values ('$ptn','$ptd')";
		if ($conn->query($sql)) {
			?>

			<script type="text/javascript">
				window.alert("<?php echo $ptn;?> is Successfully Added!");
			</script>

			<?php
		}else{
			?>

			<script type="text/javascript">
				window.alert("This Partylist is Already Added!");
			</script>

			<?php
		}
	}
	?>
	</form>
</div><br><br>
<div>
<a href="independent_can.php">
<button type="button" class='btn btn-primary' style="float: left; margin-top: -30px; margin-left: 20px;"><span class='glyphicon glyphicon-user'></span> Independent Candidate(s)</button>
</a>	
</div>
<center>
<button id="add" type="button" class='btn btn-primary' style="margin-left: -220px;"><span class='glyphicon glyphicon-plus'></span> Add Partylist</button>
</center>
<br><br>

<script type="text/javascript">
	$("#add").click(function () {
		$("#addplist").show(1000);
		$("#add").hide(1000);
	});
</script>

<div id="listplist">
	<?php
	$sql1 = "select * from tbl_partylist order by Plist_Name";
	$res = $conn->query($sql1);
	echo "<table class='table table-condensed' width = '30%'>";
	if ($res->num_rows == 0) {
		echo "<tr><td colspan='3'>No Partylist Added</td></tr>";
	}else{
		while ($row = $res->fetch_assoc()) {
			echo "<tr>";
			echo "<th>Partylist Name</th>";
			echo "<th colspan='2'>Partylist Description</th>";
			echo "<th>Actions</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>".$row['Plist_Name']."</td>";
			echo "<td colspan='2'>".$row['Plist_Desc']."</td>";
			echo "<td>";

			echo "<a href=\"partylist_can.php?pname=$row[Plist_Name]\" class='btn btn-primary'><div><span class='glyphicon glyphicon-eye-open'></span> View All Candidates</div></a> ";

			echo "<a href=\"update_plist.php?pname=$row[Plist_Name]\" class='btn btn-primary'><div><span class='glyphicon glyphicon-edit'></span> Update Partylist</div></a> ";

			echo "<a href=\"remove_plist.php?pname=$row[Plist_Name]\" class='btn btn-primary' onClick=\"return confirm('Are you sure you want to Remove This Partylist?')\"><div><span class='glyphicon glyphicon-trash'></span> Remove</div></a>";

			echo "</td>";
			echo "</tr>";
			echo "<tr><td colspan='4'><br></td></tr>";
			}
		}
		echo "</table>";
		
	?>
</div>

	<?php
}

?>
</body>
</html>