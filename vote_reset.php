
<?php require 'admin_session.php'; ?>

<?php
	require 'dbcon.php';
	$sql = "update tbl_candidates set Can_Votes = 0 where Can_Gender = 'Male'|| Can_Gender = 'Female'";
	$sql1 = "truncate table tbl_vote_history";
	if ($conn->query($sql)) {
		$conn->query($sql1);
		?>

		<script type="text/javascript">
			alert("The Vote Counts Has Successfully Reset!");
			window.location = "system_setting.php";
		</script>

		<?php
	}else{
		?>

		<script type="text/javascript">
			alert("Reset Failed!");
			window.location = "system_setting.php";
		</script>

		<?php
	}
?>