<?php
$nom = $_GET['nom'];
	setcookie(nom4, $nom, time() + (86400 * 30), "/");
	header("location:nom_businessman.php"); 
?>