
<?php require 'admin_session.php'; ?>

<?php
    header("refresh: 30;");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css"/>
	<script type="text/javascript" src="DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>

	<style type="text/css">
		th,td{
			text-align: center;
		}
	</style>
</head>
<body class="bg-1" style="background-image: url('images/b.png');">
<form method="POST">
<h3 align="center">LIST OF STUDENT REQUEST(S)</h3><br>
<table id="requests" align="center" class="table table-striped table-bordered" width="99%" cellspacing="10px data-order='[[ 1, "asc" ]]' data-page-length='10'>
	<thead>
		<tr>
		<th>Student Photo</th>
		<th>Student ID</th>
		<th>Full Name</th>
		<th>Gender</th>
		<th>Age</th>
		<th>Course</th>
		<th>Year Level</th>
		<th>Date & Time</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php
	require 'dbcon.php';
	$sql = "select * from tbl_tempstudents order by Acc_Datetime DESC";
	$res = $conn->query($sql);
	if ($res->num_rows >= 1){
		while ($row = $res->fetch_assoc()) {
			echo "<tr>";
			echo "<td>";
			echo "<img src='tempuploads/".$row['Acc_image']."' class='big' width='80px' height='80px' alt='Temp Photo'>";
			echo "</td>";
			echo "<td>";
			echo $row['Acc_ID'];
			echo "</td>";
			echo "<td>";
			echo $row['Acc_Fname']." ".$row['Acc_Mname']." ".$row['Acc_Lname']." ".$row['Acc_NameExt'];
			echo "</td>";
			echo "<td>";
			echo $row['Acc_Gender'];
			echo "</td>";

			date_default_timezone_set("asia/manila");
			$today = date("Y-m-d");
			$dateOfBirth = $row['Acc_Bdate'];
			$diff = date_diff(date_create($dateOfBirth), date_create($today));
			$age = $diff->format('%y');

			echo "<td>";
			echo $age;
			echo "</td>";
			echo "<td>";
			echo $row['Acc_Course'];
			echo "</td>";
			echo "<td>";
			echo $row['Acc_Ylevel'];
			echo "</td>";
			echo "<td>".date('h:i:s a / F-d-Y', strtotime($row['Acc_Datetime']))."</td>";
			echo "<td>";
			$aid = $row['Acc_ID'];

			echo "<a href=\"accept_req.php?id=$row[Acc_ID]&pass=$row[Acc_Pword]&image=$row[Acc_image]&type=$row[Acc_Type]&fname=$row[Acc_Fname]&mname=$row[Acc_Mname]&lname=$row[Acc_Lname]&next=$row[Acc_NameExt]&gender=$row[Acc_Gender]&bdate=$row[Acc_Bdate]&course=$row[Acc_Course]&ylevel=$row[Acc_Ylevel]&quest=$row[Acc_Quest]&ans=$row[Acc_Ans]\"><button type='button' class='btn btn-primary' onClick=\"return confirm('Are You Sure You Want To Accept This Request?')\"><span class='glyphicon glyphicon-check'></span> Accept</button></a> ";
			echo "<a href=\"delete_req.php?id=$row[Acc_ID]&image=$row[Acc_image]\"><button type='button' class='btn btn-primary' onClick=\"return confirm('Are You Sure You Want To Remove This Request?')\"><span class='glyphicon glyphicon-trash'></span> Decline</button></a>";
			
			echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	?>
<script type="text/javascript">
	$(document).ready( function () {
    $('#requests').DataTable({
           "pagingType": "full_numbers",
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
           select: true
         });
} );
</script>
</form>
</body>
</html>