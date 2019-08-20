<?php
$nom = $_GET['nom'];
	setcookie(nom8, $nom, time() + (86400 * 30), "/");
	header("location:nom_bot4.php"); 
?>