<?php

session_start();

if (isset($_SESSION['type']) && $_SESSION['type'] == "Administrator") {
	header("location:administrator_module.php");
}elseif (isset($_SESSION['type']) && $_SESSION['type'] == "Student") {
	header("location:student_module.php");
}else{

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log-In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery/image_function.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-confirm-master/dist/jquery-confirm.min.css">
	<script type="text/javascript" src="jquery-confirm-master/dist/jquery-confirm.min.js"></script>
	<script type="text/javascript" src="bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="jquery/function.js"></script>

	<style type="text/css">
		input{
			text-align: center;
			}
		.first-column {
  			width: 40%;
 	 		float: left;
		}

		.second-column {
  			width: 40%;
  			float: right;
		}
	</style>

</head>
<body class="bg-1" style="background-image: url('images/b.png');">

<script type="text/javascript">
	$('#myModal1').modal('show');
</script>
<?php require 'main_header.php'; ?>

<div id="login">
	<form method="POST" autocomplete="off">
		<table>
			<tr><td><label style="color: yellow;">USERNAME/ID:</label></td></tr>
			<tr>
				<td>
					<input type="text" class="form-control" style="text-transform: uppercase;" id="c" maxlength="30" name="user" required="" value="<?php if (isset($_POST['submit'])){echo $_POST['user']; }else{ echo ''; } ?>" autofocus="on">
				</td>
			</tr>
			<tr><td><label style="color: yellow;">PASSWORD:</label></td></tr>
			<tr>
				<td>
					</div>
  				<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
 				 <input type="password" id="pwd" class="masked form-control" name="pass" maxlength="30" required="">
				</div>
				</td>
			</tr>
			<tr>
				<td align="left">
					<div>
						<label style="color: yellow; font-size: 15px;" id="text"><input id="eye" type="checkbox"> show password</label>
						<script type="text/javascript" src="jquery/pwd_show.js"></script>
					</div>
				</td>
			</tr>
			<tr><td><input type="submit" class="btn btn-primary" name="submit" value="Log-In"></td></tr>
			<tr><td></td></tr>
		</table>

		<?php
			require 'dbcon.php';
			if (isset($_POST['submit'])) {

				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$pas = md5($pass);

				$sql = "select Acc_Type from tbl_administrator where Acc_Uname = '$user' and Acc_Pword = '$pas'
				union select Acc_Type from tbl_students where Acc_ID = '$user' and Acc_Pword = '$pas' and Acc_Type = 'Student'";

			    $result = $conn->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
						$type = $row['Acc_Type'];
					if ($type == 'Administrator' || $type == 'Election_Chairman' || $type == 'Election_Officer') {

						$_SESSION['uname'] = $user;
						$_SESSION['type'] = $type;

						//header("location: administrator_module.php");
						?>
							<script type="text/javascript">
								window.location = "administrator_module.php";
							</script>
						<?php

					}elseif ($type == 'Student') {

						$_SESSION['uname'] = $user;
						$_SESSION['type'] = $type;

						//header("location: student_module.php");
						?>
							<script type="text/javascript">
								window.location = "administrator_module.php";
							</script>
						<?php
					}
			}else{
				?>

				<script type="text/javascript">
				 $.alert({
       				title: 'Alert!',
       				boxWidth: '30%',
    				useBootstrap: false,
        			content: 'Invalid Username or Password!',
    			});
				</script>

				<?php
			}
		}
		?>
	</form>

	<?php require 'forgot_pass_modal.php'; ?>

	<br>

	<!-- Button to trigger modal -->
    <a href="#myModal" data-toggle="modal">Create One?</a>
    <?php require 'modal.php'; ?>

	<hr>
</div>
<div id="slideshow">

	<?php require 'slideshow/slideshow.php'; ?>

</div>
<?php

$conn->close();

?>
</body>
</html>
