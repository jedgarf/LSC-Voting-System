<?php require 'student_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="jquery-confirm-master/dist/jquery-confirm.min.css">
	<script type="text/javascript" src="jquery-confirm-master/dist/jquery-confirm.min.js"></script>
</head>
<body class="bg-1" style="background-image: url('images/hh.jpg'); background-position: center; background-attachment: fixed; background-size: cover;">
<div id="verify" align="center"><br><br>
	<form method="POST">

		<?php
		require 'dbcon.php';

		$sql1 = "select * from tbl_electionsched";
		$result1 = $conn->query($sql1);

		$row = $result1->fetch_assoc();

		//setting variables
		$sdate = $row['start_date'];
		$stime = $row['start_time'];
		$etime = $row['end_time'];

		$sql0 = "select * from tbl_vote_history where His_ID = '$user'";
		$result0 = $conn->query($sql0);

		if ($result0->num_rows == 0) {

			date_default_timezone_set("asia/manila");
			$today = date("Y-m-d");
			$curtime = date("H:i:s");


			if ($today == $sdate && $curtime >= $stime && $curtime <= $etime) {
				echo '<input type="submit" class="btn btn-primary btn-lg" name="sub" value="START VOTE">';
			}else{
			echo '<input type="button" class="btn btn-primary btn-lg" value="ELECTION IS NOT AVAILABLE AT THIS TIME !" disabled>';
		}
		}else{
			echo '<input type="button" class="btn btn-primary btn-lg" value="YOU ARE ALREADY VOTED!" disabled>';
		}
		?>

		<br><br><br><br>
	<div align="center" style="border-radius: 20px; color: black; background-color: aqua; width: 600px; padding: 50px; opacity: 0.8;">
	<h2>ELECTION SCHEDULE</h2>
	<?php
		echo "<h3 align='center'>".date('F-d-Y', strtotime($sdate))."</h3>";
		echo "<h3 align='center'>".date('h:i a', strtotime($stime))." - ".date('h:i a', strtotime($etime))."</h3>";
	?>
	</div>

	<?php
	if (isset($_POST['sub'])) {


		require 'php_function/clear_nomcookies.php';

		
		}
?>
</form>
</div>
</body>
</html>