
	<script type="text/javascript" src="jquery/function.js"></script>
	<script type="text/javascript" src="jquery/image_function.js"></script>	
	
	<style type="text/css">
		input{
			text-align: center;
			}
	</style>

<body class="bg-1" style="background-image: url('images/b.png'); background-attachment: fixed; background-size: cover;">

<br>
<form method="post" enctype="multipart/form-data" autocomplete="off">

	<div>
		<div id="image_show" hidden style="margin-left: 450px; margin-bottom: -150px;">
		<img id="img" src="#" alt="image" width="200px" height="180px">
		<br><br>
		</div>

		<div align="left" style="margin-left: 100px;">
			
		<input type="file" name="image" id="image" accept="image/jpeg,image/png" onchange='Test.UpdatePreview(this)' required>

		</div>

		<script type="text/javascript">
			$("#image").change(function () {
				$("#image_show").show();
			});
		</script>

		<br><br>
	</div>

<div>

	<div class="col-sm-4">
		<div class="input-group">
			<label>Username: </label>
		<input type="text" id="studid" class="form-control" name="sid" maxlength="15" value="<?php if(isset($_POST['sub'])){ echo $_POST['sid']; }else{} ?>" autofocus placeholder="Username" required>
		</div>
	</div>	

	<div class="col-sm-4">
	<label>Gender: </label><br>
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


<br><br><br><br>

	<div class="col-sm-4">
		<label>First Name: </label>
		<input type="text" class="form-control" name="fname" maxlength="25" value="<?php if(isset($_POST['sub'])){ echo $_POST['fname']; }else{} ?>" onkeypress="return onlyAlphabets(event,this);" placeholder="First Name" required="">
	</div>
	<div class="col-sm-4">
		<label>Middle Name: </label>
		<input type="text" class="form-control" name="mname" maxlength="25" value="<?php if(isset($_POST['sub'])){ echo $_POST['mname']; }else{} ?>" onkeypress="return onlyAlphabets(event,this);" placeholder="Middle Name">
	</div>
	<div class="col-sm-4">
		<label>Last Name: </label>
		<input type="text" class="form-control" name="lname" maxlength="25" value="<?php if(isset($_POST['sub'])){ echo $_POST['lname']; }else{} ?>" onkeypress="return onlyAlphabets(event,this);" placeholder="Last Name" required="">
	</div>

<br><br><br><br>
	
	<div class="col-sm-6">
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

	<div class="col-sm-6">
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
	<br><br><br><br>
	<div class="col-sm-6">
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
	<div class="col-sm-6">
		<label>Answer: </label>
		<input type="text" class="form-control" name="ans" maxlength="30" value="<?php if(isset($_POST['sub'])){ echo $_POST['ans']; }else{} ?>" placeholder="Answer">
	</div>
	<br><br><br><br><br>
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
	$pas = md5('officer');
	$gender = $_POST['gender'];
	$bdate = $_POST['bdate'];
	$quest = $_POST['quest'];
	$ans = $_POST['ans'];

	//sql command
	$sql = "INSERT INTO tbl_administrator (Acc_image,Acc_Type,Acc_Uname,Acc_Pword,Acc_Fname,Acc_Mname,Acc_Lname,
	Acc_NameExt,Acc_Gender,Acc_Bdate,Acc_Quest,Acc_Ans) 
	VALUES ('$locate','Election_Officer','$sid','$pas','$fname','$mname','$lname','$next','$gender',
	str_to_date('$bdate','%M-%d-%Y'),'$quest','$ans')";

	$sql1 = "select * from tbl_administrator where Acc_Uname = '$sid'";
	$result = $conn->query($sql1);

		if ($result->num_rows == 0) {
			//$curyear = "";

			//$curyear = date('Y') - 13;


			//if ($year <= $curyear) {

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