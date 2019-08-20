
<?php require 'admin_session.php'; ?>

<?php
header("refresh: 30;");
require 'dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body class="bg-1" style="background-image: url('images/b.png');">
	<div align="center">
		<?php
		$sql0 = "select count(*) as count from tbl_students where Acc_Type = 'Student'";
		$result0 = $conn->query($sql0);
	
		$count = $result0->fetch_assoc();
		$totalstud = $count['count'];
		?>
	<div style="margin-left: 1350px; margin-top: 10px; position: fixed;">
			<span class="badge"><?php echo $totalstud; ?></span> <label>Student(s)</label>
		</div>


		<a href="#search"><div id="click" class='btn btn-primary' style="margin-left: 500px; margin-top: 50px; width: 150px; position: fixed;">
			<span class='glyphicon glyphicon-search'></span> <label>Search</label>
		</div></a><br><br>

		<script type="text/javascript">
		$("#click").click(function () {
			$("#search").show(1000);
			$("#click").hide(1000);
		});
		</script>

		<div id="search" hidden>
			<form method="POST" autocomplete="off" action="search_stud.php"><br>
		<table>
			<tr>
			<td colspan="2"><label>Search by </label>
	<select name="cat" class="form-control">
		<option value="Acc_ID">ID</option>
		<option value="Acc_Fname">First Name</option>
		<option value="Acc_Lname">Last Name</option>
		<option value="Acc_Course">Course</option>
	</select></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td colspan="2"><label>Keyword: </label><input class="form-control" type="text" name="key" required=""></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td align="center"><input type="reset" id="close" class='btn btn-primary' name="close" value="Close"></td>

				<script type="text/javascript">
					$("#close").click(function () {
						$("#search").hide(1000);
						$("#click").show(1000);
					});
				</script>

				<td align="center"><input type="submit" class='btn btn-primary' name="search" value="Search"></td>
			</tr>
		</table>
	</form>
		</div><br>
	<?php
	date_default_timezone_set("asia/manila");
	$today = date("Y-m-d");
	$curtime = date("H:i:s");
	$sql0 = "select * from tbl_Electionsched";
	$result = $conn->query($sql0);
	$row = $result->fetch_assoc();

	if ($today == $row['start_date'] && $curtime >= $row['start_time'] && $curtime <= $row['end_time']) {
		?>

		<h2 align="center"><b>ALL STUDENTS</b></h2>
	<br>
		<table width="80%" align="center" cellspacing="90px" cellpadding="20px">
	<?php
	$sql = "select Acc_image,Acc_ID,Acc_Fname,Acc_Mname,Acc_Lname,Acc_NameExt,Acc_Gender,Acc_Bdate,Acc_Ylevel,Acc_Course from tbl_students where Acc_Type = 'Student' order by Acc_Ylevel";
	$sql1 = "select count(*) as count from tbl_students where Acc_Type = 'Student'";

	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
	$today = date("Y-m-d");

	$sum = $result1->fetch_assoc();
	$count = $sum['count'];

	if ($result->num_rows == 0) {
		echo "<center>No Active Student(s).</center>";
	}else{

	$x = 1;
	do{
		$res = $result->fetch_assoc();
		if (($x % 2) == 0) {
		echo '<td><img src="uploads/'.$res['Acc_image'].'" width = "200px" height="200px"></td>';
		echo "<td><b>Student ID: </b>".$res['Acc_ID']."<br>";
		echo "<b>Full Name: </b><br>".$res['Acc_Fname']." ".$res['Acc_Mname']." ".$res['Acc_Lname']." ".$res['Acc_NameExt']."<br>";
		echo "<b>Gender: </b>".$res['Acc_Gender']."<br>";

		$dateOfBirth = $res['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<b>Age: </b>".$age."<br>";
		echo "<b>Birth Date: </b>".date('F-d-Y', strtotime($res['Acc_Bdate']))."<br>";
		echo "<b>Course: </b>".$res['Acc_Course']."<br>";
		echo "<b>Year Level: </b>".$res['Acc_Ylevel']."<br><br>";
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> Update Profile</button></a> <button type='button' class='btn btn-primary' disabled><span class='glyphicon glyphicon-plus'></span> Add To Candidate</button></td>";
		echo "</tr>";
		echo "<tr><td><br></td></tr>";
		}else{
		echo "<tr>";
		echo '<td><img src="uploads/'.$res['Acc_image'].'" width = "200px" height="200px"></td>';
		echo "<td><b>Student ID: </b>".$res['Acc_ID']."<br>";
		echo "<b>Full Name: </b><br>".$res['Acc_Fname']." ".$res['Acc_Mname']." ".$res['Acc_Lname']." ".$res['Acc_NameExt']."<br>";
		echo "<b>Gender: </b>".$res['Acc_Gender']."<br>";

		$dateOfBirth = $res['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<b>Age: </b>".$age."<br>";
		echo "<b>Birth Date: </b>".date('F-d-Y', strtotime($res['Acc_Bdate']))."<br>";
		echo "<b>Course: </b>".$res['Acc_Course']."<br>";
		echo "<b>Year Level: </b>".$res['Acc_Ylevel']."<br><br>";
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> Update Profile</button></a> <button type='button' class='btn btn-primary' disabled><span class='glyphicon glyphicon-plus'></span> Add To Candidate</button></td>";
		}
		//echo "<tr><td>".$count." - ".$x."</td></tr>";
		$x++;
		} while($x <= $count);

	}
		
	?>
	</table>

		<?php
		
	}else{
		?>

		<h2 align="center"><b>ALL STUDENTS</b></h2>
	<br><br>
		<table width="80%" align="center" cellspacing="90px" cellpadding="20px">
	<?php
	$sql = "select Acc_image,Acc_ID,Acc_Fname,Acc_Mname,Acc_Lname,Acc_NameExt,Acc_Gender,Acc_Bdate,Acc_Ylevel,Acc_Course from tbl_students where Acc_Type = 'Student' order by Acc_Ylevel";
	$sql1 = "select count(*) as count from tbl_students where Acc_Type = 'Student'";

	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
	$today = date("Y-m-d");

	$sum = $result1->fetch_assoc();
	$count = $sum['count'];

	if ($result->num_rows == 0) {
		echo "<center>No Active Student(s).</center>";
	}else{

	$x = 1;
	do{
		$res = $result->fetch_assoc();
		if (($x % 2) == 0) {
		echo '<td><img src="uploads/'.$res['Acc_image'].'" width = "200px" height="200px"></td>';
		echo "<td align='center'><b>Student ID: </b>".$res['Acc_ID']."<br>";
		echo "<b>Full Name: </b><br>".$res['Acc_Fname']." ".$res['Acc_Mname']." ".$res['Acc_Lname']." ".$res['Acc_NameExt']."<br>";
		echo "<b>Gender: </b>".$res['Acc_Gender']."<br>";

		$dateOfBirth = $res['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<b>Age: </b>".$age."<br>";
		echo "<b>Birth Date: </b>".date('F-d-Y', strtotime($res['Acc_Bdate']))."<br>";
		echo "<b>Course: </b>".$res['Acc_Course']."<br>";
		echo "<b>Year Level: </b>".$res['Acc_Ylevel']."<br><br>";
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> Update Profile</button></a> <a href=\"add_can.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-plus'></span> Add To Candidate</button></a><br><br>";
		echo "<a href=\"deactivate.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-times'></span> Deactivate Account</button></a></td>";
		echo "</tr>";
		echo "<tr><td><br></td></tr>";
		echo "<tr><td><br></td></tr>";
		}else{
		echo "<tr>";
		echo '<td><img src="uploads/'.$res['Acc_image'].'" width = "200px" height="200px"></td>';
		echo "<td align='center'><b>Student ID: </b>".$res['Acc_ID']."<br>";
		echo "<b>Full Name: </b><br>".$res['Acc_Fname']." ".$res['Acc_Mname']." ".$res['Acc_Lname']." ".$res['Acc_NameExt']."<br>";
		echo "<b>Gender: </b>".$res['Acc_Gender']."<br>";

		$dateOfBirth = $res['Acc_Bdate'];
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$age = $diff->format('%y');

		echo "<b>Age: </b>".$age."<br>";
		echo "<b>Birth Date: </b>".date('F-d-Y', strtotime($res['Acc_Bdate']))."<br>";
		echo "<b>Course: </b>".$res['Acc_Course']."<br>";
		echo "<b>Year Level: </b>".$res['Acc_Ylevel']."<br><br>";
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span> Update Profile</button></a> <a href=\"add_can.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-plus'></span> Add To Candidate</button></a><br><br>";
		echo "<a href=\"deactivate.php?id=$res[Acc_ID]\"><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-times'></span> Deactivate Account</button></a></td>";
		}
		$x++;
		} while($x <= $count);
	}	
	?>
	</table>

<?php } ?>

</div>
</body>
</html>	