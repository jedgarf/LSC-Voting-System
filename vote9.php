<?php
$nom = $_GET['nom'];
	setcookie(nom9, $nom, time() + (86400 * 30), "/");
	header("location:overview_can.php"); 
?>