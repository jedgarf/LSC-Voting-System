<!DOCTYPE html>
<html>
<head>
     <title></title>
     <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
</head>
<body>
     
<?php require 'admin_session.php'; ?> 

<?php
$id = $_GET['id'];
$pass = $_GET['pass'];
$image = $_GET['image'];
$type = $_GET['type'];
$fname = $_GET['fname'];
$mname = $_GET['mname'];
$lname = $_GET['lname'];
$next = $_GET['next'];
$gender = $_GET['gender'];
$bdate = $_GET['bdate'];
$course = $_GET['course'];
$ylevel = $_GET['ylevel'];
$quest = $_GET['quest'];
$ans = $_GET['ans'];

require 'dbcon.php';

//echo $id." ".$pass." ";
//echo $image." ".$type." ".$fname." ".$mname." ".$lname." ".$next." ".$gender." ".$bdate." ".$ylevel." ".$quest." ".$ans;

$sql = "insert into tbl_students values ('$image','$type','$id','$pass','$fname','$mname','$lname','$next','$gender','$bdate','$ylevel','$course','$quest','$ans')";

$sql1 = "delete from tbl_tempstudents where Acc_ID = '$id'";     

if ($conn->query($sql)) {
     copy('tempuploads/'.$image , 'uploads/'.$image);
     unlink("tempuploads/$image");

     $conn->query($sql1);
     
     ?>
     
     <script type="text/javascript">
          alert("<?php echo $id; ?> is Successfully Added!");
          window.parent.location.reload();
          $("#form").attr("src","student_requests.php");
     </script>

     <?php

}else{
     ?>
     
     <script type="text/javascript">
          alert("Duplicate ID!");
          window.location = "student_requests.php";
     </script>

     <?php
}
?>
</body>
</html>