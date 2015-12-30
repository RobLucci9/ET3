<<<<<<< HEAD
<?php
// Controlador eliminar apunte hecho por cidleticia

//Includes iniciales

require_once '../model/driver.php';
require_once '../model/U_Tiene_A.php';
require_once 'navbar.php';
require_once '../model/Usuario.php';

session_start();

$db = Driver::getInstance();

$id = (array_keys($_POST)[0]); // get the value of clicked button

//FUNCIONES DEL CONTROLADOR
$tieneapunte = new U_Tiene_A($db);
$usuario = new Usuario($db);
$usuario = $usuario->findBy('user_name',$_SESSION['name'])[0];

$tieneapunte = $tieneapunte->findBy('apunte_id',$id); // find the apunte
foreach( $tieneapunte as $item){
  if($item->getUser_id()==$usuario->getUser_id()){
    $item->destroy(); // destroy
  }
}

header("location: misApuntes.php"); //return
=======
<?php
// Controlador eliminar apunte hecho por cidleticia

//Includes iniciales

require_once '../model/driver.php';
require_once '../model/U_Tiene_A.php';
require_once 'navbar.php';
require_once '../model/Usuario.php';

session_start();

$db = Driver::getInstance();

$id = (array_keys($_POST)[0]); // get the value of clicked button

//FUNCIONES DEL CONTROLADOR
$tieneapunte = new U_Tiene_A($db);
$usuario = new Usuario($db);
$usuario = $usuario->findBy('user_name',$_SESSION['name'])[0];

$tieneapunte = $tieneapunte->findBy('apunte_id',$id); // find the apunte
foreach( $tieneapunte as $item){
  if($item->getUser_id()==$usuario->getUser_id()){
    $item->destroy(); // destroy
  }
}

header("location: misApuntes.php"); //return
>>>>>>> upstream/master
