
<?php require 'admin_session.php'; ?>

<?php
require 'dbcon.php';
$id = $_GET['id'];

$sql = "SELECT * FROM tbl_students WHERE Acc_ID = '$id'";
$result = $conn->query($sql);

$res = $result->fetch_assoc();
	$oldimage = $res['Acc_image'];
	$studid = $res['Acc_ID'];
	$fname = $res['Acc_Fname'];
	$mname = $res['Acc_Mname'];
	$lname = $res['Acc_Lname'];
	$next = $res['Acc_NameExt'];
	$gender = $res['Acc_Gender'];
	$bdate = $res['Acc_Bdate'];
	$ylevel = $res['Acc_Ylevel'];
	$course = $res['Acc_Course'];
	$quest = $res['Acc_Quest'];
	$ans = $res['Acc_Ans'];
?>
<html>
<head>	
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="jquery/highlight_disabled.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script type="text/javascript" src = "jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="jquery/function.js"></script>

	<style type="text/css">
		input,select{
			text-align: center;
		}
		.column1{
			float: left;
			margin-right: 0px;
			margin-right: 30px;
		}
		.column2{
			float: left;
		}
		.allcolumn{
			margin-left: 220px;
		}
		.footer{
		margin-left: 450px;
	}
	</style>

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
               $("img").prop("src", target.result);
             };
              reader.readAsDataURL(obj.files[0]);
          }
        }
    };
});
</script>

</head>

<body class="bg-1" style="background-image: url('images/b.png');">
	<h3 align="center">Update <b><?php echo $fname." ".$mname." ".$lname." ".$next; ?></b> Profile:</h3>
	<br/>
	
	<form name="form1" method="POST" enctype="multipart/form-data" autocomplete="off">
		<div align="center" style="margin-left: 200px;">
				<div style="margin-left: -200px;">
					<input type="button" class="btn btn-primary" id="pic_button" value="Change Photo?">

			<script type="text/javascript">
				$("#pic_button").click(function () {
					$("#sel_pic").show(500);
					$("#pic_button").hide(500);
				});
			</script>
			<br>

			<div id="pic" align="center" hidden style="position: fixed; margin-left: 1200px; margin-top: -70px;">
				<img id="img" src="#" width="280px" height="240px">
			</div>
			<br>
			<div id="sel_pic" align="center" hidden> 
					<input type="file" name="image" id="image" accept="image/*" onchange='Test.UpdatePreview(this)' >
			</div>
			<script type="text/javascript">
				$("#image").change(function () {
					$("#pic").show(500);
				});
			</script>
				</div>
			<br>
			<div class="allcolumn">

			<div class="column1" align="left">

				<div class="input-group">
				<label>Student ID:</label>
				<input type="text" class="form-control" pattern="[A-Z0-9\-]{8,15}" name="studid" value="<?php echo $studid;?>" required>
			</div>
			<div class="input-group">
				<label>First Name:</label>
				<input type="text" class="form-control" pattern="[A-Za-z\s]{3,25}" name="fname" onkeypress="return onlyAlphabets(event,this);" value="<?php echo $fname;?>" required>
				<br><label>Middle Name:</label>
				<input type="text" class="form-control" pattern="[A-Za-z\s]{0,25}" name="mname" onkeypress="return onlyAlphabets(event,this);" value="<?php echo $mname;?>" required>
				<br><label>Last Name:</label>
				<input type="text" class="form-control" pattern="[A-Za-z\s]{3,25}" name="lname" onkeypress="return onlyAlphabets(event,this);" value="<?php echo $lname;?>" required>
			</div>
			<div class="input-group">
				<label>Name Extension:</label>
				<select class="form-control" name="next">
					<option><?php echo $next;?></option>
					<option value="">none</option>
					<option value="Jr.">Jr.</option>
					<option value="Sr.">Sr.</option>
					<option value="III">III</option>
					<option value="IV">IV</option>
					<option value="V">V</option>
				</select>
			</div>
			<div class="input-group">
				<label>Gender:</label><br>
				<?php
				if ($gender == "Male") {					
					echo '<input type="radio" name="gender" value="Male" checked>';
					echo '&nbsp;&nbsp;<label>Male</label>&nbsp;&nbsp;';
					echo '<input type="radio" name="gender" value="Female">';
					echo '&nbsp;&nbsp;<label> Female</label>';
				}elseif ($gender == "Female") {
					echo '<input type="radio" name="gender" value="Male">';
					echo '&nbsp;&nbsp;<label>Male</label>&nbsp;&nbsp;';
					echo '<input type="radio" name="gender" value="Female" checked>';
					echo '&nbsp;&nbsp;<label> Female</label>';
				}
				?>
			</div> 
		</div>

			<div class="column2" align="left"> 
			<div class="input-group">
				<label>Birth Date:</label>
				<input type="text" id="p" class="form-control" name="birthdate" value="<?php echo date('F-d-Y', strtotime($bdate)); ?>" readonly required>

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

			</div>
			<div class="input-group">
				<label>Course:</label>
				<select name="course" class="form-control" required>
					<option><?php echo $course; ?></option>
					<option>BSIT</option>
					<option>BSE-English</option>
					<option>BSE-MAPEH</option>
					<option>BSBA</option>
					<option>BSHRM</option>
				</select>
			</div>
			<div class="input-group">
				<label>Year Level:</label>
				<select name="ylevel" class="form-control" required>
					<option selected><?php echo $ylevel; ?></option>
					<option>1st Year</option>
					<option>2nd Year</option>
					<option>3rd Year</option>
					<option>4th Year</option>
				</select>
			</div>
			<div class="input-group">
				<label>Security Question:</label>
				<select name="quest" class="form-control" required>
					<option selected><?php echo $quest; ?></option>
					<option>What is Your Favorite Food?</option>
					<option>What is Your Favorite Color?</option>
					<option>What is Your Favorite Subject?</option>
					<option>Who is Your Favorite Teacher?</option>
					<option>What is Your Favorite Games?</option>
				</select>
			</div>
			<div class="input-group">
				<label>Security Answer:</label>
				<input type="password" id="pwd" class="form-control" name="ans" value="<?php echo $ans;?>" required>
			</div>
			<br>
			<div class="input-group">
				<label style="color: black; font-size: 15px;" id="text"><input id="eye" type="checkbox"> show answer</label>
                        <script type="text/javascript" src="jquery/pwd_show.js"></script>
			</div>
			<br>
			<div class="footer" style="margin-left: -150px;" align="left">
				<a href="all_students.php" style="text-decoration-line: none;"><input  class="btn btn-primary btn-lg" id="back" type="button" name="back" value="Back"></a>
				<input  class="btn btn-primary btn-lg" id="reset" type="reset" name="reset" value="Clear"> 
				<script type="text/javascript">
				$("#reset").click(function () {
					$("#pic").hide(500);
				});
			</script>
				<input class="btn btn-primary btn-lg" type="submit" name="update" value="Update">
			</div>
			</div>
		</div>
		</div>
<?php

if(isset($_POST['update'])){

	//setting variables
	$studid1 = $_POST['studid'];
	$pass1 = $_POST['pass'];
	$repass1 = $_POST['repass'];
	$fname1 = $_POST['fname'];
	$mname1 = $_POST['mname'];
	$lname1 = $_POST['lname'];
	$next1 = $_POST['next'];
	$gender1 = $_POST['gender'];
	$bdate = $_POST['birthdate'];
	$course = $_POST['course'];
	$ylevel1 = $_POST['ylevel'];
	$quest1 = $_POST['quest'];
	$ans1 = $_POST['ans'];

	//checking image
	if(empty($_FILES['image']['name'])){
		$image = $oldimage;
		$check = 0;
	}elseif (!empty($_FILES['image']['name'])) {
		$image = $fname1." ".$lname1.".jpg";
		$check = 1;
	}

	
		$sql2 = "UPDATE tbl_students SET Acc_image = '$image',
		Acc_ID = '$studid1', Acc_Fname = '$fname1',
		Acc_Mname = '$mname1', Acc_Lname = '$lname1', Acc_NameExt = '$next1',
		Acc_Gender = '$gender1', Acc_Bdate = str_to_date('$bdate','%M-%d-%Y'), Acc_Ylevel = '$ylevel1',Acc_Course = '$course',
		Acc_Quest = '$quest1', Acc_Ans = '$ans1' WHERE Acc_ID = '$id'";

		if (!empty($_FILES['image']['name'])) {

			if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {

			if ($_FILES['image']['size'] <= 5000000) {

			if ($conn->query($sql2)) {

			if ($check == 1) {
				unlink("uploads/$oldimage");
				move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $fname1." ".$lname1.".jpg");
				}
				$check1 = 1;

			}else{

				$check1 = 0;

			}

			if ($check1 == 1) {
				$sql4 = "UPDATE tbl_candidates SET Can_image = '$image',Can_ID = '$studid1',Can_Fname = '$fname1',Can_Mname = '$mname1',
				Can_Lname = '$lname1',Can_NameExt = '$next1',Can_Gender = '$gender1',Can_Bdate = str_to_date('$bdate','%M-%d-%Y'), Can_Ylevel = '$ylevel1',Can_Course = '$course' WHERE Can_ID = '$id'";

				$sql6 = "UPDATE tbl_vote_history SET His_Image = '$image',His_ID = '$studid1',His_fname = '$fname1',His_Mname = '$mname1',
				His_Lname = '$lname1',His_NameExt = '$next1',His_Gender = '$gender1',His_Ylevel = '$ylevel1',His_Course = '$course' WHERE His_ID = '$id'";

				$conn->query($sql4);
				$conn->query($sql6);
					?>

				<script type="text/javascript">
					alert("Update Successed!");
					window.location = "all_students.php";
				</script>

				<?php
			}else{
				
		?>

		<script type="text/javascript">
			alert("Update Failed!");
		</script>

		<?php

		}

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

}else{

	if ($conn->query($sql2) == true) {

			if ($check == 1) {
				unlink("uploads/$oldimage");
				move_uploaded_file($_FILES['image']['tmp_name'],"uploads/" . $fname1." ".$lname1.".jpg");
			}
				$check1 = 1;

			}else{

				$check1 = 0;
			}
		
			if ($check1 == 1) {
				$sql4 = "UPDATE tbl_candidates SET Can_image = '$image',Can_ID = '$studid1',Can_Fname = '$fname1',Can_Mname = '$mname1',
				Can_Lname = '$lname1',Can_NameExt = '$next1',Can_Gender = '$gender1',Can_Bdate = str_to_date('$bdate','%M-%d-%Y'), Can_Ylevel = '$ylevel1' WHERE Can_ID = '$id'";

				$sql6 = "UPDATE tbl_vote_history SET His_Image = '$image',His_ID = '$studid1',His_fname = '$fname1',His_Mname = '$mname1',
				His_Lname = '$lname1',His_NameExt = '$next1',His_Gender = '$gender1',His_Ylevel = '$ylevel1' WHERE His_ID = '$id'";

				$conn->query($sql4);
				$conn->query($sql6);
					?>

				<script type="text/javascript">
					alert("Update Successed!");
					window.location = "all_students.php";
				</script>

				<?php
			}else{
				
		?>

		<script type="text/javascript">
			alert("Update Failed!");
		</script>

		<?php

		}
	}
}
?>
	</form>
</body>
</html>
