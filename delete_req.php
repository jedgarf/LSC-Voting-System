<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
if (isset($_COOKIE['type']) && $_COOKIE['type'] == "Administrator") {

}elseif (isset($_COOKIE['type']) && $_COOKIE['type'] == "Student") {
     header("location:student_module.php");
}else{
     header("location:index.php");
}
?>
<?php
$id = $_GET['id'];
$image = $_GET['image'];

require 'dbcon.php';

$sql = "delete from tbl_tempstudents where Acc_ID = '$id'";
if ($conn->query($sql)) {
	unlink("tempuploads/$image");
	
	?>

	<script type="text/javascript">
		alert("This Request is Successfully Deleted!");
		window.location = "student_requests.php";
	</script>

	<?php
}else{
	?>

	<script type="text/javascript">
		alert("Deleted Denied!");
		window.location = "student_requests.php";
	</script>

	<?php
}

?>

</body>
</html>