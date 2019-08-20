<?php
session_start();
if (isset($_SESSION['type']) && $_SESSION['type'] == "Student") {
	$user = $_SESSION['uname'];
}elseif (isset($_SESSION['type']) && $_SESSION['type'] == "Administrator") {
	header("location:administrator_module.php");
}else{
	header("location:index.php");
}
?>