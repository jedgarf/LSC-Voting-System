<?php
$nom = $_GET['nom'];
	setcookie(nom6, $nom, time() + (86400 * 30), "/");
	header("location:nom_bot2.php"); 
?>