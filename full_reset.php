
<?php require 'admin_session.php'; ?>

<?php
require 'dbcon.php';
$sql = "truncate table tbl_candidates";
$sql1 = "truncate table tbl_vote_history";
$sql2 = "truncate table tbl_partylist";
if ($conn->query($sql)) {
	if ($conn->query($sql1)) {
		if ($conn->query($sql2)) {
			?>

				<script type="text/javascript">
					alert("System is Successfully Reset!");
					window.location = "all_candidates.php";
				</script>

			<?php
		}else{
			?>

	<script type="text/javascript">
		alert("It Cannot be Undone in Partylist Records!");
		window.location = "system_setting.php";
	</script>

	<?php
		}
	}else{
		?>

	<script type="text/javascript">
		alert("It Cannot be Undone in Vote History Records!");
		window.location = "system_setting.php";
	</script>

	<?php
	}
	
}else{
	?>

	<script type="text/javascript">
		alert("It Cannot be Undone in Some Records!");
		window.location = "system_setting.php";
	</script>

	<?php
}
?>
