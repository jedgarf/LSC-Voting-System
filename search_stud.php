
<?php require 'admin_session.php'; ?>

<!DOCTYPE html>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
</head>
<body class="bg-1" style="background-image: url('images/b.png');"><br>
<a href="all_students.php" style="color: black; text-decoration-line: none; position: fixed; margin-left: -720px;"><input type="button" class='btn btn-primary btn-lg' name="" value="Back"></a><br><br>
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

	<div align="center">
		<?php
		$cat = $_POST['cat'];
		$key = $_POST['key'];
		$sql = "select * from tbl_students where $cat like '%$key%' and Acc_Type = 'Student'";
		$res = $conn->query($sql);

		echo '<table width="80%" align="center" cellspacing="90px" cellpadding="20px">';
		if ($res->num_rows == 0) {
			echo "<tr><td colspan='2' align='center'>0 Result(s)</td></tr>";
		}else{

		$sql1 = "select count(*) as count from tbl_students where $cat like '%$key%' and Acc_Type = 'Student'";
		$result1 = $conn->query($sql1);
		$result = $conn->query($sql);
		$today = date("Y-m-d");
		$sum = $result1->fetch_assoc();
		$count = $sum['count'];

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
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><input type='button' class='btn btn-primary' value='Update Profile'></a> <input type='button' class='btn btn-primary' value='Add To Candidate' disabled></td>";
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
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><input type='button' class='btn btn-primary' value='Update Profile'></a> <input type='button' class='btn btn-primary' value='Add To Candidate' disabled></td>";
		}
		//echo "<tr><td>".$count." - ".$x."</td></tr>";
		$x++;
		} while($x <= $count);
		}
	?>
	</table>
	</div>

	<?php

}else{

	?>

	<div align="center">
		<?php
		$cat = $_POST['cat'];
		$key = $_POST['key'];
		$sql = "select * from tbl_students where $cat like '%$key%' and Acc_Type = 'Student'";
		$res = $conn->query($sql);

		echo '<table width="80%" align="center" cellspacing="90px" cellpadding="20px">';
		if ($res->num_rows == 0) {
			echo "<tr><td colspan='2' align='center'>0 Result(s)</td></tr>";
		}else{

		$sql1 = "select count(*) as count from tbl_students where $cat like '%$key%' and Acc_Type = 'Student'";
		$result1 = $conn->query($sql1);
		$result = $conn->query($sql);
		$today = date("Y-m-d");
		$sum = $result1->fetch_assoc();
		$count = $sum['count'];

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
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><input type='button' class='btn btn-primary' value='Update Profile'></a> <a href=\"add_can.php?id=$res[Acc_ID]\"><input type='button' class='btn btn-primary' value='Add To Candidate'></a></td>";
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
		echo "<a href=\"stud_edit.php?id=$res[Acc_ID]\"><input type='button' class='btn btn-primary' value='Update Profile'></a> <a href=\"add_can.php?id=$res[Acc_ID]\"><input type='button' class='btn btn-primary' value='Add To Candidate'></a></td>";
		}
		//echo "<tr><td>".$count." - ".$x."</td></tr>";
		$x++;
		} while($x <= $count);
		}
	?>
	</table>
	</div>

	<?php
}
?>
</body>
</html>