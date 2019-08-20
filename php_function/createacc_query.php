<?php

require '../dbcon.php';

//setting variables
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$next = $_POST['next'];
$locate = $fname." ".$lname.".jpg";
$sid = $_POST['sid'];
$pass = $_POST['pass'];
$pas = md5($pass);
$repass = $_POST['repass'];
$gender = $_POST['gender'];
$bdate = $_POST['bdate'];
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
	if ($pass == $repass) {
		if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png") {
			
			if ($_FILES['image']['size'] > 1000000) {
			echo "Your Image is higher to standard limit!";
			}else{

			if ($conn->query($sql)) {
			move_uploaded_file($_FILES["image"]["tmp_name"],"../tempuploads/" .$fname." ".$lname.".jpg");
				echo "Your Request is Successfully Sent!";
			}else{
				echo "Error in Database Query!";
			}
		}
		}else{
			echo "Unsupport Image Format!";
	}
	} else {
		echo "Password does not Match!";
	}
	
}else{
	echo "Your ID is Already Taken!";
}