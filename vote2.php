<?php
$nom = $_GET['nom'];
	setcookie(nom2, $nom, time() + (86400 * 30), "/");
	header("location:nom_secretary.php"); 
?>