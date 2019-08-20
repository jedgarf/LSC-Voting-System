<?php
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
require 'dbcon.php';
$sql = "update tbl_students set Acc_Type = 'Student' where Acc_ID = '$id'";
if ($conn->query($sql)) {
	?>

	<script type="text/javascript">
		alert("Account is Activated!");
		window.location = "deactivated_students.php";
	</script>

	<?php
}else{
?>

<script type="text/javascript">
		alert("Activation Failed!");
		window.location = "deactivated_students.php";
	</script>

<?php
}
?>
</body>
</html>
