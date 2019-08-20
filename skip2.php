<?php
	setcookie(nom2, "none", time() + (86400 * 30), "/");
	header("location:nom_secretary.php"); 
?>