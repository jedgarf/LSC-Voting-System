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
	<title>Create Student Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php require 'header.php'; ?>

<br>
<div align="center" style="margin-top: 200px;">
<h3 align="center">Forgot Password</h3>
<br>
<div align="center">
	<form id="cform" method="post" autocomplete="off">

	<table cellpadding="5px">
			<tr><td><label>Username: </label></td></tr>
			<tr><td><input type="text" class="form-control" name="user" autofocus placeholder="Username" required=""></td></tr>
			<tr><td><label>Security Question: </label></td></tr>
			<tr><td><select class="form-control" style="font-size: 12px;" name="quest">
				<?php
				require 'dbcon.php';
				$sql = "select distinct(Acc_Quest) from tbl_administrator union all select distinct(Acc_Quest) from tbl_students";
				$result = $conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<option>".$row['Acc_Quest']."</option>";
				}
				?>
			</select></td></tr>
			<tr><td><label>Answer: </label></td></tr>
			<tr><td><input type="text" class="form-control" name="ans" maxlength="30" placeholder="Answer" required=""></td></tr>
			<tr><td><br></td></tr>
		</table>

		</div>

 <div align="center">
 	<div onclick="window.parent.location = 'index.php';" class="btn btn-primary btn-lg" >
<label>Back</label>
</div>
    <button class="btn btn-lg" id="btn1" type="reset">Clear</button>

    <script type="text/javascript">
    	$("#btn1").click(function () {
    		$("#image_show").hide();
    	});
    </script>

<button type="submit" name="sub1" class="btn btn-primary btn-lg	">Log in</button>
</div>
</form>
</div>
<?php
	if (isset($_POST['sub1'])) {
		require 'dbcon.php';
				$user = $_POST['user'];
				$quest = $_POST['quest'];
				$ans = $_POST['ans'];

				$sql1 = "select Acc_Type,Acc_ID,Acc_Quest,Acc_Ans from tbl_students where Acc_ID = '$user' union all 
				select Acc_Type,Acc_Uname,Acc_Quest,Acc_Ans from tbl_administrator where Acc_Uname = '$user'";

				if ($result1 = $conn->query($sql1)) {
					$row1 = $result1->fetch_assoc();

						if ($row1['Acc_ID'] == $user) {
							
							if ($row1['Acc_Quest'] == $quest && $row1['Acc_Ans'] == $ans) {

									$type = $row1['Acc_Type'];

									if ($type == 'Administrator') {
										
										$_SESSION['uname'] = $user;
										$_SESSION['type'] = $type;

										header("location:administrator_module.php");

									}elseif ($type == 'Student') {

										$_SESSION['uname'] = $user;
										$_SESSION['type'] = $type;

										header("location:student_module.php");

										}
							}else{

								?>

				<script type="text/javascript">
				 $.alert({
       				title: 'Alert!',
       				boxWidth: '30%',
    				useBootstrap: false,
        			content: 'Your Question/Answer is Incorrect!',
    			});
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
        			content: 'Incorrect Username/Password!',
    			});
				</script>

							<?php
					}
				}
	
	}
?>
</div>
</body>
</html>