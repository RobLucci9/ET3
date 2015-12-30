<<<<<<< HEAD
<!-- controlador eliminar Materia por Daniel de ALonso -->
<?php

  session_start();
  require_once '../model/Materia_Usuario.php';
  require_once '../model/Usuario.php';
  require_once '../model/driver.php';

  $mat = (array_keys($_POST)[0]); // get the value of clicked button

  $db = Driver::getInstance();
  $usuario = new Usuario($db);
  $usuario = $usuario->findBy('user_name',$_SESSION['name']);
  $usuario = $usuario[0];
  $mat_us = new Materia_Usuario($db);
  $mat_us = $mat_us->findBy('mat_id',$mat); // find the row to destroy
  foreach ($mat_us as $item) { //buscar la materia del usuario conectado
    if($item->getUser_id() == $usuario->getUser_id()){
      $item->destroy();
    }
  }
  header("location: MisMaterias.php"); //return
?>
=======
<!-- controlador eliminar Materia por Daniel de ALonso -->
<?php

  session_start();
  require_once '../model/Materia_Usuario.php';
  require_once '../model/Usuario.php';
  require_once '../model/driver.php';

  $mat = (array_keys($_POST)[0]); // get the value of clicked button

  $db = Driver::getInstance();
  $usuario = new Usuario($db);
  $usuario = $usuario->findBy('user_name',$_SESSION['name']);
  $usuario = $usuario[0];
  $mat_us = new Materia_Usuario($db);
  $mat_us = $mat_us->findBy('mat_id',$mat); // find the row to destroy
  foreach ($mat_us as $item) { //buscar la materia del usuario conectado
    if($item->getUser_id() == $usuario->getUser_id()){
      $item->destroy();
    }
  }
  header("location: MisMaterias.php"); //return
?>
>>>>>>> upstream/master
