<?php
$nom = $_GET['nom'];
	setcookie(nom5, $nom, time() + (86400 * 30), "/");
	header("location:nom_bot1.php"); 
?>