<?php
require 'dbcon.php';

//setting variables
$sdate = $_POST['start_date'];
$stime = date('H:i:00', strtotime($_POST['start_time']));
$etime = date('H:i:00', strtotime($_POST['end_time']));

//sql command
$sql2 = "update tbl_ElectionSched set start_date = str_to_date('$sdate','%M-%d-%Y'), start_time = '$stime', end_time = '$etime' where type = 'schedule'";


if ($etime > $stime) {
if ($conn->query($sql2)) {
	//header("Refresh:0");
	//header("location:election_schedule.php");
	echo "success";
		
}else{
		echo "error";
}
}else{
	
echo "invalid_time";

}

?>