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
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">

	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="jquery-confirm-master/dist/jquery-confirm.min.css">
	<script type="text/javascript" src="jquery-confirm-master/dist/jquery-confirm.min.js"></script>

	<script type="text/javascript" src="jquery/function.js"></script>
	<script type="text/javascript" src="jquery/image_function.js"></script>	

	<script type="text/javascript" src="bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
	
	<style type="text/css">
		input{
			text-align: center;
			}
		.cont{
			margin-left: 270px;
		}
		.first-column {
  			width: 40%;
 	 		float: left;
		}

		.second-column {
  			width: 40%;
  			float: left;
		}
	</style>

</head>
<body class="bg-1" style="background-image: url('images/b.png'); background-attachment: fixed; background-size: cover;">
<div onclick="window.parent.location = 'index.php';" style="float: left; margin: 20px; margin-right: -40px;" class="btn btn-primary btn-lg" >
<label>Back</label>
</div>
<h2 align="center">Create Student Account:</h2>
<br>
<form id="cform" method="post" enctype="multipart/form-data" autocomplete="off">

	<div align="center">
		<div id="image_show" hidden style="position: fixed; margin-left: 1200px; margin-top: -70px;">
		<img id="img" src="#" width="280px" height="240px">
		<br><br>
		</div>
	
		<input type="file" name="image" id="image" accept="image/jpeg,image/png" onchange='Test.UpdatePreview(this)' required>

		<script type="text/javascript">
			$("#image").change(function () {
				$("#image_show").show();
			});
		</script>

		<br><br>
	</div>

<div class="cont">
	<div class="first-column">
	<div class="col-xs-6">
		<label>Student ID: </label>
		<div class="input-group">
		<input type="text" id="studid" class="form-control" name="sid" maxlength="15" value="<?php if(isset($_POST['sub'])){ echo $_POST['sid']; }else{} ?>" autofocus placeholder="Student ID" onkeydown="return isStudId(event.keyCode);" required>
		</div>
	</div>	

	<div class="col-xs-5">
		<label>Password: </label>
		<input type="password" class="form-control" name="pass" id="pwd" maxlength="10" placeholder="Password" required="">
	</div>
	<div class="col-xs-5">
		<label>Confirm Password: </label>
		<input type="password" class="form-control" name="repass" id="pwd1" maxlength="10" placeholder="Password" required="">
	</div>

	<div>
		<label style="color: black; font-size: 15px;" id="text"><input id="eye" type="checkbox"> show password</label>
						<script type="text/javascript" src="jquery/allpw_show.js"></script>	
	</div>

	<div class="col-xs-4">
		<label>First Name: </label>
		<input type="text" class="form-control" name="fname" maxlength="25" value="<?php if(isset($_POST['sub'])){ echo $_POST['fname']; }else{} ?>" onkeypress="return onlyAlphabets(event,this);" placeholder="First Name" required="">
	</div>
	<div class="col-xs-4">
		<label>Middle Name: </label>
		<input type="text" class="form-control" name="mname" maxlength="25" value="<?php if(isset($_POST['sub'])){ echo $_POST['mname']; }else{} ?>" onkeypress="return onlyAlphabets(event,this);" placeholder="Middle Name">
	</div>
	<div class="col-xs-4">
		<label>Last Name: </label>
		<input type="text" class="form-control" name="lname" maxlength="25" value="<?php if(isset($_POST['sub'])){ echo $_POST['lname']; }else{} ?>" onkeypress="return onlyAlphabets(event,this);" placeholder="Last Name" required="">
	</div>
	
	<div class="col-xs-5">
			<label>Extension Name: </label>
			<select class="form-control" name="next">
			<?php if(isset($_POST['sub'])){ echo "<option>".$_POST['next']."</option>"; }else{} ?>
			<option value="">none</option>
			<option value="Jr.">Jr.</option>
			<option value="Sr.">Sr.</option>
			<option value="III">III</option>
			<option value="Iv">IV</option>
			<option value="V">V</option>
		</select>
	</div>

</div>


<div class="second-column">

	<div class="col-xs-3">
	<label>Gender: </label>
	<?php if(isset($_POST['sub'])){ 
	if ($_POST['gender'] == "Male") {
	?>
	<input type="radio" name="gender" value="Male" checked> 
	 &nbsp;&nbsp;Male&nbsp;&nbsp;
	<input type="radio" name="gender" value="Female">
	&nbsp;&nbsp;Female&nbsp;&nbsp;
	<?php
	}else{
		?>
		<input type="radio" name="gender" value="Male"> 
	 &nbsp;&nbsp;Male&nbsp;&nbsp;
	<input type="radio" name="gender" value="Female" checked>
	&nbsp;&nbsp;Female&nbsp;&nbsp;
		<?php
	}
	 }else{
	 ?>
	 <input type="radio" name="gender" value="Male" checked> 
	 &nbsp;&nbsp;Male&nbsp;&nbsp;
	<input type="radio" name="gender" value="Female">
	&nbsp;&nbsp;Female&nbsp;&nbsp;
	 <?php
	 } ?>
	</div>
	<br>
	<div class="col-xs-5">
		<label>Course:</label>
		<select name="course" class="form-control" required>
			<?php if(isset($_POST['sub'])){ echo "<option>".$_POST['course']."</option>"; }else{} ?>
			<option>BSIT</option>
			<option>BSE-English</option>
			<option>BSE-MAPEH</option>
			<option>BSBA</option>
			<option>BSHRM</option>
		</select>
	</div>
	<div class="col-xs-6">
	<label>Year Level: </label>
	<select name="ylevel" class="form-control" required>
		<?php if(isset($_POST['sub'])){ echo "<option>".$_POST['ylevel']."</option>"; }else{} ?>
		<option>1st Year</option>
		<option>2nd Year</option>
		<option>3rd Year</option>
		<option>4th Year</option>
	</select>
	</div>
	<br>
	<div class="col-xs-6">
		<label>Birth Date(less than 13 Years Old Are Not Valid):</label>
		<?php

		date_default_timezone_set("asia/manila");

		$curdate = date("F-d-").(date("Y") - 13);

		?>
	<input type="text" id="p" class="form-control" name="bdate" value="<?php if(isset($_POST['sub'])){ echo $_POST['bdate']; }else{ echo $curdate; } ?>" readonly required>

			<script type="text/javascript">
				$(function() {
					 $('#p').datepicker({
        			 format: 'MM-dd-yyyy',
        			 startDate: "January-01-1970",
        			 todayHighlight: true,
        			 orientation: 'bottom right',
        			 autoclose: true,
 				   });
				});
			</script>
	</div>
	<br>
	<div class="col-xs-6">
		<label>Security Question: </label>
		<select class="form-control" style="font-size: 12px;" name="quest">
		<?php if(isset($_POST['sub'])){ echo "<option>".$_POST['quest']."</option>"; }else{} ?>
		<option>What is Your Favorite Food?</option>
		<option>What is Your Favorite Color?</option>
		<option>What is Your Favorite Subject?</option>
		<option>Who is Your Favorite Teacher?</option>
		<option>What is Your Favorite Games?</option>
		</select>
	</div>
	<div class="col-xs-6">
		<label>Answer: </label>
		<input type="text" class="form-control" name="ans" maxlength="30" value="<?php if(isset($_POST['sub'])){ echo $_POST['ans']; }else{} ?>" placeholder="Answer">
	</div>
	<br><br>
   <div>

    <button class="btn" id="reset" type="reset">Clear</button>

    <script type="text/javascript">
    	$("#reset").click(function () {
    		$("#image_show").hide();
    	});
    </script>

<button type="submit" name="sub" class="btn btn-primary">Create Account</button>
   </div>

 </div>
</div>
<?php
	if (isset($_POST['sub'])) {

	require 'dbcon.php';

	//setting variables
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$next = $_POST['next'];
	$locate = $fname." ".$lname.".jpg";
	$sid = $_POST['sid'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$pas = md5($pass);
	$gender = $_POST['gender'];
	$bdate = $_POST['bdate'];
	

	//$year = date('Y',$bdate);

	?>

	<!--<script type="text/javascript">
		alert("<?php //echo $year; ?>");
	</script>-->

	<?php
	$course = $_POST['course'];
	$ylevel = $_POST['ylevel'];
	$quest = $_POST['quest'];
	$ans = $_POST['ans'];

	//sql command
	$sql = "INSERT INTO tbl_tempstudents (Acc_image,Acc_Type,Acc_ID,Acc_Pword,Acc_Fname,Acc_Mname,Acc_Lname,
	Acc_NameExt,Acc_Gender,Acc_Bdate,Acc_Course,Acc_Ylevel,Acc_Quest,Acc_Ans,Acc_Datetime) 
	VALUES ('$locate','Student','$sid','$pas','$fname','$mname','$lname','$next','$gender',
	str_to_date('$bdate','%M-%d-%Y'),'$course','$ylevel','$quest','$ans',now())";

	$sql1 = "select * from tbl_students where Acc_ID = '$sid'";
	$result = $conn->query($sql1);

		if ($result->num_rows == 0) {
			//$curyear = "";

			//$curyear = date('Y') - 13;


			//if ($year <= $curyear) {

				if ($pass == $repass) {
				if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
					
					if ($_FILES['image']['size'] > 1000000) {
					?>

					<script type="text/javascript">
						alert("Your Image is higher than to standard file limit!");
					</script>

					<?php
					}else{

					if ($conn->query($sql)) {
					move_uploaded_file($_FILES["image"]["tmp_name"],"tempuploads/" .$fname." ".$lname.".jpg");
						?>

				<script type="text/javascript">
				 $.alert({
       				title: 'Alert!',
       				boxWidth: '30%',
    				useBootstrap: false,
        			content: 'Your Request is Successfully Sent!',
    			});
				 //window.parent.location = "index.php";
				</script>

						<?php
					}else{
						?>

				<script type="text/javascript">
				 $.alert({
       				title: 'Alert!',
       				boxWidth: '30%',
    				useBootstrap: false,
        			content: 'Error Caught!',
    			});
				</script>

						<?php
					}
				}
				}else{
					?>

				<script type="text/javascript">
				 $.alert({
       				title: 'Alert!',
       				boxWidth: '30%',
    				useBootstrap: false,
        			content: 'Unsupport Image Format!',
    			});
				</script>

					<?php
			}
			}else{
				?>

				<script type="text/javascript">
					alert("Password Doesn't not Match!");
				</script>

				<?php
			}
			/*}else{
				?>

				<script type="text/javascript">
					alert("You're not Qualified!");
				</script>

				<?php
			}*/
		}else{
			?>

			<script type="text/javascript">
				 $.alert({
       				title: 'Alert!',
       				boxWidth: '30%',
    				useBootstrap: false,
        			content: 'Your ID is Already Taken!',
    			});
				</script>

			<?php
		}
	}
?>
</form>
</body>
</html>