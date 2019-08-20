
<?php require 'admin_session.php'; ?>

<?php
    header("refresh: 60;");
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
	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css"/>
	<script type="text/javascript" src="DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
</head>

	<style type="text/css">
		th{
			text-align: center;
		}
		td{
			font-size: 17px;
		}
	</style>
	<?php
	require 'dbcon.php';
	$sql0 = "select count(*) as count1 from tbl_vote_history";
	$sql1 = "select count(*) as count2 from tbl_students";

	$result2 = $conn->query($sql0);
	$result1 = $conn->query($sql1);
	
	$count_his = $result2->fetch_assoc();
	$his = $count_his['count1'];

	$count = $result1->fetch_assoc();
	$totalstud = $count['count2'];

		$per = ($his / $totalstud) * 100;
		$percent = number_format($per, 2);

		$outvote = 100 - $percent;
		$notvote = number_format($outvote, 2);

		$studnotvote = $totalstud - $his;
?>
</head>
<body class="bg-1" style="background-image: url('images/b.png');">
	<a href="vote_records.php">
	<div style="float: left; margin: 10px;" class="btn btn-primary btn-lg">
	<label>Previous Records</label>
	</div>
	</a>
	<div style="margin-left: 1150px;">
		<div style="float: right; margin: 10px;" id="click" class="btn btn-primary btn-lg"><span class='glyphicon glyphicon-eye-open'></span> <label>VIEW PERCENTAGE</label></div>
		<div style="float: right;  margin: 10px; display: none;" id="back" class="btn btn-primary btn-lg"><label>BACK</label></div>
		<?php
		$sql0 = "select count(*) as count1 from tbl_vote_history";
		$result0 = $conn->query($sql0);
	
		$count1 = $result0->fetch_assoc();
		$totalreq = $count1['count1'];
		?>
	</div>
	<div id="badge" style="float: right; margin-right: -170px; margin-top: 70px;">
			<span class="badge"><?php echo $totalreq; ?></span> <label>RECORD(S)</label>
		</div>
	<div id="percentage" hidden>
		<br><br><br><br>
	<center>
	<div class="progress" style="width: 80%;">
  	<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent; ?>%;"><?php echo $his." Voted Student(s) / ".$percent."%"; ?>
  	</div><?php echo $studnotvote." Unvote Student(s) / ".$notvote."%"; ?>
	</div><br><br><br>
	<label>Total of Voted Voters:</label><span><?php echo " ".$his." Student(s)."; ?></span><br>
	<label>Total of Unvote Voters:</label><span><?php echo " ".$studnotvote." Student(s)."; ?></span>
	</center>
	</div>
<div id="listcan"><br><br>
	<h2 align="center">LIST OF CURRENTLY VOTED VOTER(S):</h2>

	<div class="row-fluid">
        <div class="span12">

	<table id="voteTable" class="table table-striped table-bordered" width="99%" cellspacing="10px data-order='[[ 1, "asc" ]]' data-page-length='10'>

		<thead>
			<tr>
			<th>Photo</th>
			<th>School ID</th>
			<th>Full Name</th>
			<th>Gender</th>
			<th>Course</th>
			<th>Year Level</th>
			<th>Time & Date</th>
			<th>Votes</th>
		</tr>
		</thead>

	<tbody>
		<?php
	require 'dbcon.php';
	$sql = "select * from tbl_vote_history order by His_datetime DESC";
	$res = $conn->query($sql);
		if ($res->num_rows >= 1) {
		 	while ($row = $res->fetch_assoc()) {
		 		echo "<tr>";
				echo "<td><img src='uploads/".$row['His_Image']."' class='big' width='100px' height='100px'></td>";
				echo "<td>".$row['His_ID']."</td>";
				echo "<td>".$row['His_fname']." ".$row['His_Mname']." ".$row['His_Lname']." ".$row['His_NameExt']."</td>";
				echo "<td>".$row['His_Gender']."</td>";
				echo "<td>".$row['His_Course']."</td>";
				echo "<td>".$row['His_Ylevel']."</td>";
				echo "<td>".date('h:i:s a / F-d-Y', strtotime($row['His_datetime']))."</td>";
				echo "<td><a href=\"voting_logs.php?id=$row[His_ID]&datetime=$row[His_datetime]\" ><button class='btn btn-primary'>View Votes</button></a></td>";
				echo "</tr>";
		 	}
		 	echo "</tbody>";
		 	echo "</table>";
		 }
	?>

</div>
<script type="text/javascript">
	$(document).ready( function () {
    $('#voteTable').DataTable({
           "pagingType": "full_numbers",
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
           select: true
         });
} );
</script>

<script type="text/javascript">
	$("#click").click(function () {
		$("#percentage").show();
		$(this).hide();
		$("#listcan").hide();
		$("#badge").hide();
		document.getElementById('back').style.display = "block";
	});
	$("#back").click(function () {
		$("#percentage").hide();
		$("#click").show();
		$("#badge").show();
		$("#listcan").show();
		document.getElementById('back').style.display = "none";
	});
</script>

</div>
</div>
</body>
</html>