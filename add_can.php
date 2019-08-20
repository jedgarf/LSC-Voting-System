
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
	<script type="text/javascript" src="jquery/function.js"></script>
</head>
<body class="bg-1"><br>
<form method="POST" autocomplete="off" style="margin-left: 400px;">
<?php
	require 'dbcon.php';
	$sql0 = "select Acc_image,Acc_Fname,Acc_Mname,Acc_Lname,Acc_NameExt from tbl_students where Acc_ID='$id'";
	$result = $conn->query($sql0);
	$row = $result->fetch_assoc();
	echo '<h2 align="left">Add <b>'.$row["Acc_Fname"].' '.$row["Acc_Mname"].' '.$row["Acc_Lname"].' '.$row["Acc_NameExt"].'</b> to Candidate:</h2>';
	echo "<div style='float:left; margin-right:30px; margin-top:20px;'>";
	echo "<img src='uploads/".$row['Acc_image']."' alt='student image' width='300px' height='300px'>";
	echo "</div>";
?>
<div style='float:left;'>
<br>
	<table align="center">
		<tr>
		<td><label>Select Party-List</label></td><td>
		<select name="plist" class="form-control" required>
			<option>none</option>
			<?php
			$sql = "select Plist_Name from tbl_Partylist";
			$res = $conn->query($sql);
			if ($res->num_rows >= 1) {
				while ($row = $res->fetch_assoc()) {
					echo "<option>".$row['Plist_Name']."</option>";
				}
			}else{
				echo "<option disabled>No Partylist Added</option>";
			}
			?>
		</select>
		</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td><label>Select Position: </label></td><td>
		<select name="pos" class="form-control" required>
			<option>Chairman</option>
			<option>Vice Chairman</option>
			<option>Secretary</option>
			<option>Treasurer</option>
			<option>Business Manager</option>
			<option>BOT 1</option>
			<option>BOT 2</option>
			<option>BOT 3</option>
			<option>BOT 4</option>
		</select>
		</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td><label>Mobile Number:</label></td>
		<td><input type="text" name="con" class="form-control" maxlength="11" minlength="11" onkeypress='return validateQty(event);' required></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td><label>Select Your Motto:</label></td>
		<td><input class="form-control" type="text" name="motto" placeholder="Optional"></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
	<td colspan="2">
	<br>
	<a href="all_students.php" style="color: black;">
		<input type="button" class='btn btn-primary btn-lg' value="Back">
	</a>&nbsp;&nbsp;&nbsp;
		<input type="submit" class='btn btn-primary btn-lg' name="sub" value="Add">
	</td>
	</table>
	<?php
	if (isset($_POST['sub'])) {

		//setting variables 
		$plist = $_POST['plist'];
		$pos = $_POST['pos'];
		$con = $_POST['con'];
		$motto = $_POST['motto'];

		//sql command
		$sql1 = "select * from tbl_candidates where Can_ID = '$id'";
		$sql2 = "select * from tbl_candidates where Can_Partylist = '$plist' and Can_Position = '$pos'";
		$sql3 = "select * from tbl_students where Acc_ID = '$id'";

		$res1 = $conn->query($sql1);
		if ($res1->num_rows >=1) {
			?>

			<script type="text/javascript">
				alert("This Student is Already Candidate!");
				window.location = "all_students.php";
			</script>

			<?php
		}else{

			if ($plist == 'none') {
				
				$res3 = $conn->query($sql3);
				$row = $res3->fetch_assoc();

				//setting variables
					$image = $row['Acc_image'];
					$fname = $row['Acc_Fname'];
					$mname = $row['Acc_Mname'];
					$lname = $row['Acc_Lname'];
					$next = $row['Acc_NameExt'];
					$gender = $row['Acc_Gender'];
					$bdate = $row['Acc_Bdate'];
					$ylevel = $row['Acc_Ylevel'];
					$course = $row['Acc_Course'];

					//insert command
				$sql4 = "insert into tbl_candidates (Can_image,Can_Position,Can_Partylist,Can_ID,Can_Fname,Can_Mname,Can_Lname,Can_NameExt,Can_Gender,Can_Bdate,Can_Contactno,Can_Ylevel,Can_Course,Can_Motto) values ('$image','$pos','$plist','$id','$fname','$mname','$lname','$next','$gender','$bdate','$con','$ylevel','$course','$motto')";
					if ($res4 = $conn->query($sql4)) {
						?>

						<script type="text/javascript">
							alert("Candidates has Successfully Added!");
							window.location = "all_candidates.php";
						</script>

						<?php
					}else{
						?>

						<script type="text/javascript">
							alert("We have a little Problem in System!");
						</script>

						<?php
					}

			}else{

			$res2 = $conn->query($sql2);
			if ($res2->num_rows >=1) {
				?>

				<script type="text/javascript">
					alert("This Position is Unavailable!");
				</script>

				<?php
			}else{
				$res3 = $conn->query($sql3);
				$row = $res3->fetch_assoc();

				//setting variables
					$image = $row['Acc_image'];
					$fname = $row['Acc_Fname'];
					$mname = $row['Acc_Mname'];
					$lname = $row['Acc_Lname'];
					$next = $row['Acc_NameExt'];
					$gender = $row['Acc_Gender'];
					$bdate = $row['Acc_Bdate'];
					$ylevel = $row['Acc_Ylevel'];
					$course = $row['Acc_Course'];

					//insert command
				$sql4 = "insert into tbl_candidates (Can_image,Can_Position,Can_Partylist,Can_ID,Can_Fname,Can_Mname,Can_Lname,Can_NameExt,Can_Gender,Can_Bdate,Can_Contactno,Can_Ylevel,Can_Course,Can_Motto) values ('$image','$pos','$plist','$id','$fname','$mname','$lname','$next','$gender','$bdate','$con','$ylevel','$course','$motto')";
					if ($res4 = $conn->query($sql4)) {
						?>

						<script type="text/javascript">
							alert("Candidates has Successfully Added!");
							window.location = "all_candidates.php";
						</script>

						<?php
					}else{
						?>

						<script type="text/javascript">
							alert("We have a little Problem in System!");
						</script>

						<?php
					}

				}
			}
		}
	}
	?>
</div>
</form>
</body>
</html>