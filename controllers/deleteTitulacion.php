<<<<<<< HEAD
<?php
// Controlador eliminar Titulacion hecho por cidleticia

//Includes iniciales

require_once '../model/driver.php';
require_once '../model/Titulacion.php';

$id = (array_keys($_POST)[1]); // get the value of clicked button
$db = Driver::getInstance();

$titulacion = new Titulacion($db);
//FUNCIONES DEL CONTROLADOR
$titulacion = $titulacion->findBy('tit_id',$id);
$titulacion[0]->destroy();
header("location: misApuntes.php"); //return
=======
<?php
// Controlador eliminar Titulacion hecho por cidleticia

//Includes iniciales

require_once '../model/driver.php';
require_once '../model/Titulacion.php';

$id = (array_keys($_POST)[1]); // get the value of clicked button
$db = Driver::getInstance();

$titulacion = new Titulacion($db);
//FUNCIONES DEL CONTROLADOR
$titulacion = $titulacion->findBy('tit_id',$id);
$titulacion[0]->destroy();
header("location: misApuntes.php"); //return
>>>>>>> upstream/master
