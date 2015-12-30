<?php
//Inicio la Sesion y le doy un valor por defecto a la variable que voy usar para idioma.
session_start();

	$_SESSION["LE"]='sp';

	//Redirijo a la pagina principal.
	header('location:./GestionUsuarios/login.php');
?>
