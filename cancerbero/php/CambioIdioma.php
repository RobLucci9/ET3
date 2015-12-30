<?php

//Inicio la sesion para tener acceso a las variables:

session_start();

// Recogemos la variable de idioma
$Lenguaje = $_GET['leng'];

// Sustituimos la variable de sesion de idioma por el nuevo valor
$_SESSION["LE"] = $Lenguaje;

//Ejemplo de guardar ruta:
	// obtenemos el nombre de la pagina que llamo a esta y...
	// guardamos en $salto el string con el nombre de la pagina desde el ultimo /
		//$salto = strrchr($_SERVER['HTTP_REFERER'],'/');
	// eliminamos el / del nombre de la pagina para redireccionar bien
		//$salto = str_replace('/','',$salto);

//Guardo la direccion que me interesa:
$pagina_anterior=$_SERVER['HTTP_REFERER'];

// invocamos la pagina desde donde se llamo a esta
header('location: '.$pagina_anterior); 


?> 
