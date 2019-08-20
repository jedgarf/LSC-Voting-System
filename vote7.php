<?php
$nom = $_GET['nom'];
	setcookie(nom7, $nom, time() + (86400 * 30), "/");
	header("location:nom_bot3.php"); 
?>