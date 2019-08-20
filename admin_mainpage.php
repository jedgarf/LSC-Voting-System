<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		body{
			background-image: url(images/hh.jpg);
			background-size: cover;
		}
		#notif{
			background-color: #FFFF00;
			color: blue;
			margin: 120px;
			padding-right: 15px;
			padding-left: 30px;
			border: 1px blue solid;
			width: 500px;
			height: 150px;
			border-radius: 10px;
			opacity: 0.8;
		}
		#close{
			font-size: 30px;
		}

	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- JQuery -->
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>

</head>
<body>

<?php
	require 'dbcon.php';
	$sql = "select count(*) as count from tbl_tempstudents";
	$result0 = $conn->query($sql);
	$count = $result0->fetch_assoc();
	$total_req = $count['count'];

	if ($total_req == 0) {
		$treq = "";
	}elseif ($total_req >= 100) {
		$treq = "<span class='badge'>99+</span>";
		require 'notif.php';
	}else{
		$treq = "<span class='badge'>".$total_req."</span>";
		require 'notif.php';
	}
	?>
</body>
</html>