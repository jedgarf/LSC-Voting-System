<?php require 'student_session.php'; ?>

<?php

require 'dbcon.php';

$sql2 = "SELECT * FROM tbl_students WHERE Acc_Id = '$user'";
$result = $conn->query($sql2);

$res = $result->fetch_assoc();

	$pass = $res['Acc_Pword'];
	$quest = $res['Acc_Quest'];
	$ans = $res['Acc_Ans'];
?>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="jquery/highlight_disabled.js"></script>
    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>

	<style type="text/css">
		input,select{
			text-align: center;
		}
	</style>

</head>

<body class="bg-1" style="background-image: url('images/b.png');">
		<h3 align="center">Change Password</h3>
	<br>
	<form name="form1" method="POST" autocomplete="off">
		<table align="center">
			<tr><td><br></td></tr>
			<tr> 
				<td>Current Password:</td>
				<td><input type="Password" class="form-control" name="cpass" id="pwd" value="" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>New Password:</td>
				<td><input type="Password" class="form-control" name="pass" id="pwd1" value="" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Confirm Password:</td>
				<td><input type="Password" class="form-control" name="repass" id="pwd2" value="" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td colspan="2" align="center">
					<label style="color: black; font-size: 15px;" id="text"><input id="eye" type="checkbox"> show password</label>
						<script type="text/javascript" src="jquery/allpw_show.js"></script>
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td>Security Question:</td>
				<td><select name="quest" class="form-control" required>
					<option selected><?php echo $quest; ?></option>
					<option>What is Your Favorite Food?</option>
					<option>What is Your Favorite Color?</option>
					<option>What is Your Favorite Subject?</option>
					<option>Who is Your Favorite Teacher?</option>
					<option>What is Your Favorite Games?</option>
				</select></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Security Answer:</td>
				<td><input type="Password" class="form-control" name="ans" value="<?php echo $ans; ?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td align="right"><input  class="btn btn-primary" type="reset" name="reset" value="Clear"></td>
				<td align="center"><input  class="btn btn-primary" type="submit" name="update" value="Save"></td>
			</tr>
		</table>
<?php
if(isset($_POST['update'])){

	$cpass = $_POST['cpass'];
	$cpas = md5($cpass);
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];

		$sql3 = "select Acc_Pword from tbl_students where Acc_Id = '$user'";
		$res1 = $conn->query($sql3);
		$row1 = $res1->fetch_assoc();
		$realpass = $row1['Acc_Pword'];
	
	if ($realpass == $cpas) {
		if ($pass == $repass) {

			$repas = md5($repass);
			$sql2 = "UPDATE tbl_students SET Acc_Pword = '$repas', Acc_Quest = '$quest',Acc_Ans = '$ans' WHERE Acc_Id = '$user'";
			$conn->query($sql2);
			?>

			<script type="text/javascript">
				alert("Password Has Successfully Changed!");
				window.parent.location = "student_module.php";
			</script>

			<?php
		}else{
			?>

			<script type="text/javascript">
				alert("Password Do Not Match!");
			</script>

			<?php
		}
	}else{	
		
		?>

			<script type="text/javascript">
				alert("Incorrect Current Password!");
			</script>

			<?php
	}
}
?>
	</form>
</body>
</html>