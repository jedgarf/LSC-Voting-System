<?php
$nom = $_GET['nom'];
	setcookie(nom1, $nom, time() + (86400 * 30), "/");
	header("location:nom_vchairman.php"); 
?>