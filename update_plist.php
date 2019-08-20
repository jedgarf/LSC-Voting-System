
<?php require 'admin_session.php'; ?>

<?php
$plistname = $_GET['pname'];

require 'dbcon.php';

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
	<style type="text/css">
		th{
			text-align: center;
		}
	</style>
</head>
<body class="bg-1" style="background-image: url('images/b.png');">
<?php
$sql = "select * from tbl_partylist where Plist_Name = '$plistname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$pname = $row['Plist_Name'];
$pdesc = $row['Plist_Desc'];
?>
<form method="POST" autocomplete="off">
	<h3 align="center">Update <?php echo $plistname; ?> Partylist:</h3>
	<div align="center">
		<div class="input-group">
		<label>Partylist Name:</label>
		<input type="text" name="plname" class="form-control" value="<?php echo $pname; ?>">
	</div>
	<br>
	<div class="input-group">
		<label>Partylist Description:</label>
		<textarea class="form-control" name="pldesc" cols="30" rows="8"><?php echo $pdesc; ?></textarea>
	</div>
	<br>
	<div class="input-group">
	<a href="add_partylist.php"><input type="button" name="back" class='btn btn-primary btn-lg' value="Back"></a>

	<button type="reset" name="reset" class='btn btn-primary btn-lg'>
	<span class="glyphicon glyphicon-repeat"></span> Clear</button>

	<button type="submit" name="submit" class='btn btn-primary btn-lg'>
	<span class="glyphicon glyphicon-floppy-save"></span> Save</button>

	</div>
	<br><br>
	</div>
	<?php
	if (isset($_POST['submit'])) {
		$pln = $_POST['plname'];
		$pld = $_POST['pldesc'];

		$sql = "update tbl_partylist set Plist_Name = '$pln', Plist_Desc = '$pld' where Plist_Name = '$plistname'";
		$sql1 = "update tbl_candidates set Can_Partylist = '$pln' where Can_Partylist = '$plistname'";
		
		if ($conn->query($sql)) {

			$conn->query($sql1);
			?>

			<script type="text/javascript">
				alert("Update Success!");
				window.location = "add_partylist.php";
			</script>

			<?php
		}else{
			?>

			<script type="text/javascript">
				alert("Duplicate Partylist!");
			</script>

			<?php
		}
	}
	?>
</form>
</body>
</html>