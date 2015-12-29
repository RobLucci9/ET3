<?php
// Controlador eliminar Titulacion hecho por cidleticia

//Includes iniciales

require_once '../model/driver.php';
require_once '../model/Titulacion.php';


$db = Driver::getInstance();

//FUNCIONES DEL CONTROLADOR
$titulacion = $Titulacion->findBy('titulacion_id',$id);
$titulacion[0]->destroy();
