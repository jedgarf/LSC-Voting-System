 
 <?php
 	session_start();

if (isset($_SESSION['type']) && ($_SESSION['type'] == "Administrator" || $_SESSION['type'] == "Election_Officer" || $_SESSION['type'] == "Election_Chairman")) {

	$user = $_SESSION['uname'];
}elseif (isset($_SESSION['type']) && $_SESSION['type'] == "Student") {

	header("location:student_module.php");

}else{

	header("location:index.php");

}
?>