
<?php require 'admin_session.php'; ?>

<?php

require 'dbcon.php';

$sql2 = "SELECT * FROM tbl_administrator WHERE Acc_Uname = '$user'";
$result = $conn->query($sql2);

$res = $result->fetch_assoc();
	$oldimage = $res['Acc_image'];	
	$studid = $res['Acc_Uname'];
	$pass = $res['Acc_Pword'];
	$fname = $res['Acc_Fname'];
	$mname = $res['Acc_Mname'];
	$next = $res['Acc_NameExt'];
	$lname = $res['Acc_Lname'];
	$gender = $res['Acc_Gender'];
	$bdate = $res['Acc_Bdate'];
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

	<script>
	$(function(){
    Test = {
        UpdatePreview: function(obj){
          // if IE < 10 doesn't support FileReader
          if(!window.FileReader){
             // don't know how to proceed to assign src to image tag
          } else {
             var reader = new FileReader();
             var target = null;

             reader.onload = function(e) {
              target =  e.target || e.srcElement;
               $("#img").prop("src", target.result);
             };
              reader.readAsDataURL(obj.files[0]);
          }
        }
    };
});
</script>

	<style type="text/css">
		input,select{
			text-align: center;
		}
	</style>

</head>

<body class="bg-1" style="background-image: url('images/b.png');">
		<h3 align="center">Change Profile</h3>
	<br>
	<form name="form1" method="POST" enctype="multipart/form-data" onsubmit="return confirm('It Require to Resign-In after Updating Your Information!');" autocomplete="off">
		<table align="center">
			<tr>
				<td colspan="2" align="center"><input type="button" class='btn btn-primary' id="pic_button" value="Change Profile Photo?"></td>
			</tr>
			<tr><td><br></td></tr>

			<script type="text/javascript">
				$("#pic_button").click(function () {
					$("#sel_pic").show(500);
					$("#pic_button").hide(500);
				});
			</script>

			<tr id="pic" align="center" hidden>
				<td colspan="2"><img id="img" src="#" width="268" height="178" style="position: fixed; margin-left: 420px; margin-top: -70px;"></td>
			</tr>
			<tr><td><br></td></tr>
			<tr id="sel_pic" align="center" hidden> 
				<td colspan="2">
					<input type="file" name="image" id="image" accept="image/x-png,image/jpeg,image/jpg" onchange='Test.UpdatePreview(this)' >
				</td>
			</tr>
			<script type="text/javascript">
				$("#image").change(function () {
					$("#pic").show(500);
				});
			</script>
			<tr><td><br></td></tr>
			<tr> 
				<td>Username:</td>
				<td><input type="text" class="form-control" pattern="[A-Za-z0-9\-]{3,15}" name="studid" value="<?php echo $studid;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<!--<tr> 
				<td>New Password:</td>
				<td><input type="Password" class="form-control" name="pass" value="" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Confirm Password:</td>
				<td><input type="Password" class="form-control" name="repass" value="" required></td>
			</tr>
			<tr><td><br></td></tr>-->
			<tr> 
				<td>First Name:</td>
				<td><input type="text" class="form-control" pattern="[A-Za-z\s]{3,25}" name="fname" value="<?php echo $fname;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Middle Name:</td>
				<td><input type="text" class="form-control" pattern="[A-Za-z\s]{3,25}" name="mname" value="<?php echo $mname;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Last Name:</td>
				<td><input type="text" class="form-control" pattern="[A-Za-z\s]{3,25}" name="lname" value="<?php echo $lname;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Name Extension:</td>
				<td align="center">
				<select class="form-control" name="next">
					<option><?php echo $next;?></option>
					<option value="">none</option>
					<option value="Jr.">Jr.</option>
					<option value="Sr.">Sr.</option>
				</select>
				</td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Gender:</td>
				<td align="center">
					<select name="gender" class="form-control" required>
					<option><?php echo $gender; ?></option>
					<option>Male</option>
					<option>Female</option>
				</select></td>
			</tr>
			<tr><td><br></td></tr>
			<tr> 
				<td>Birth Date:</td>
				<td><input type="text" id="p" class="form-control" name="bdate" value="<?php echo date('F-d-Y', strtotime($bdate)); ?>" readonly required>

				<script type="text/javascript">
				$(function() {
					 $('#p').datepicker({
        			 format: 'MM-dd-yyyy',
        			 todayHighlight: true,
        			 orientation: 'bottom right',
        			 autoclose: true,
 				   });
				});
			</script>

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
				<td><input type="text" class="form-control" name="ans" value="<?php echo $ans;?>" required></td>
			</tr>
			<tr><td><br></td></tr>
			<tr>
				<td align="right"><input  class="btn btn-primary btn-lg" type="reset" name="reset" value="Clear"></td>
				<td align="center"><input  class="btn btn-primary btn-lg" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
<?php
if(isset($_POST['update'])){

	//setting variables
	if(empty($_FILES["image"]["name"])){
		$image = $oldimage;
		$check = 0;
	}elseif (!empty($_FILES["image"]["name"])) {
		$image = "admin.png";
		$check = 1;
	}

	$studid = $_POST['studid'];
	//$pass = $_POST['pass'];
	//$repass = $_POST['repass'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$next = $_POST['next'];
	$gender = $_POST['gender'];
	$bdate =  $_POST['bdate'];
	$quest = $_POST['quest'];
	$ans = $_POST['ans'];
	//echo $image.",".$studid.",".$pass.",".$repass.",".$fname.",".$mname.",".$lname.",".$next.",".$gender.",".$bdate.",".$quest.",".$ans;

	
		$sql2 = "UPDATE tbl_administrator SET Acc_image = '$image',Acc_Uname = '$studid', Acc_Fname = '$fname',Acc_Mname = '$mname',
		Acc_Lname = '$lname',Acc_NameExt = '$next',Acc_Gender = '$gender',Acc_Bdate = str_to_date('$bdate','%M-%d-%Y'), Acc_Quest = '$quest',
		Acc_Ans = '$ans' WHERE Acc_Uname = '$user'";
	
		if (empty($_FILES["image"]["name"])) {
			//if ($pass == $repass) {

			if ($conn->query($sql2)) {

			if ($check == 1) {
				unlink("uploads/$oldimage");
				move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$image);
			}
				$check1 = 1;

				}else{

				$check1 = 0;

				}

			
			if ($check1 == 1) {
				
				setcookie(type, "", time() + (86400 * 30), "/"); 
				setcookie(uname, "", time() + (86400 * 30), "/");
					?>

				<script type="text/javascript">
					alert("Update Successed!");
					window.top.location.href = "index.php";			
				</script>

				<?php

			}else{
				
		?>

		<script type="text/javascript">
			alert("Update Failed!");
		</script>

		<?php

		}
	/*}else{

		?>

		<script type="text/javascript">
			alert("Password do not Match!");
		</script>

		<?php

			}*/
			
		}else{
			if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {

			if ($_FILES['image']['size'] <= 1000000) {

			//if ($pass == $repass) {

			if ($conn->query($sql2)) {

			if ($check == 1) {
				unlink("uploads/$oldimage");
				move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$image);
			}
				$check1 = 1;

				}else{

				$check1 = 0;

				}

			
			if ($check1 == 1) {
				setcookie(type, "", time() + (86400 * 30), "/"); 
				setcookie(uname, "", time() + (86400 * 30), "/");
				
					?>

				<script type="text/javascript">
					alert("Update Successed!");
					window.top.location.href = "index.php";	
				</script>

				<?php

			}else{
				
		?>

		<script type="text/javascript">
			alert("Update Failed!");
		</script>

		<?php

		}
	/*}else{

		?>

		<script type="text/javascript">
			alert("Password do not Match!");
		</script>

		<?php

			}*/
		}else{
			?>

			<script type="text/javascript">
				alert("This File Is Too Large!")
			</script>

			<?php
		}
	}else{

		?>

		<script type="text/javascript">
			alert("Unsupported Image Format!");
		</script>

		<?php

	}
}
}
?>
	</form>
</body>
</html>