
<?php require 'admin_session.php'; ?>

<?php
$id = $_GET['id'];
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
	<script type="text/javascript" src="jquery/function.js"></script>
</head>
<body class="bg-1" style="background-image: url('images/b.png');">
	<br><br><br>
	<?php

	require 'dbcon.php';
	$sql = "select * from tbl_candidates where Can_ID = '$id'";

	$res = $conn->query($sql);
	$row = $res->fetch_assoc();
	
	?>
	<form method="POST">
		<div style="width: 600px; margin-left: 500px;">
			<div class="input-group" style="margin-left: 100px;">
			<label>Contact No:</label>
			<input type="text" class="form-control" name="contact" onkeypress='return validateQty(event);' maxlength="11" value="<?php echo $row['Can_Contactno']; ?>" required>
		</div>
		<div class="input-group">
			<label>Motto:</label>
			<textarea name="motto" class="form-control" cols="50" rows="10" maxlength="20" required>
			<?php echo $row['Can_Motto']; ?>
			</textarea>
		</div>
		<br>
		<div style="margin-left: -50px;">
			<?php
			if ($row['Can_Partylist'] == 'none') {
				echo "<a href='independent_can.php'><input type='button' name='button' class='btn btn-primary btn-lg' value='Back'></a>";
			}else{
				echo "<a href=\"partylist_can.php?pname=$row[Can_Partylist]\"><input type='button' name='button' class='btn btn-primary btn-lg' value='Back'></a>";
			}
			?>
			<input type="reset" name="reset" class="btn btn-primary btn-lg" value="Reset">
			<button type="submit" name="sub" class="btn btn-primary btn-lg">Save</button>
		</div>
		</div>
		<?php
		if (isset($_POST['sub'])) {
			$con = $_POST['contact'];
			$motto = $_POST['motto'];
			$sql = "update tbl_Candidates set Can_Contactno = '$con' , Can_Motto = '$motto' where Can_ID = '$id'";
			if ($conn->query($sql)) {

			if ($row['Can_Partylist'] == 'none') {
				?>

				<script type="text/javascript">
					alert("Successfully Saved!");
					window.location = "independent_can.php";
				</script>

				<?php
			}else{
				$plist = $row['Can_Partylist'];
				header("location:partylist_can.php?pname=$plist");
			}
				
			}else{
				?>

				<script type="text/javascript">
					alert("Failed to Save!");
				</script>

				<?php
			}
		}
		?>
	</form>

</body>
</html>