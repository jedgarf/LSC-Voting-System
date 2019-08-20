<?php
$nom = $_GET['nom'];
	setcookie(nom3, $nom, time() + (86400 * 30), "/");
	header("location:nom_treasurer.php"); 
?>