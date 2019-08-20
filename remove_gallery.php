
<?php require 'admin_session.php'; ?>

<?php
$pic = $_GET['pic'];

require 'dbcon.php';
$sql = "delete from tbl_gallery where gal_photo = '$pic'";
if ($conn->query($sql)) {
	unlink("gallery/$pic");
	?>

	<script type="text/javascript">
		alert("Remove Successfully!");
		window.location = "admin_gallery.php";
	</script>

	<?php
}else{
	?>

	<script type="text/javascript">
		alert("Remove Failed!");
		window.location = "admin_gallery.php";
	</script>

	<?php
}
?>