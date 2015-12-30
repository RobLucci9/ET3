<?php

require_once("../DBManager.php");
$man = DBManager::getInstance(); //crea instancia
$man->connect(); //conectate a la bbdd

$man->ModificarPagina($_POST['nombre'],$_POST['desc']);

$funcionalidades = $man->listFuns();
foreach ($funcionalidades as $fun) {
  $man->deleteRelationPagFun($_POST['nombre'],$fun['fun_name']);
  if(isset($_POST[$fun['fun_name']])){
    if($man->insertRelationPagFun($_POST['nombre'],$fun['fun_name'])){
		//header('location: '.'../../views/correcto.php?ID=c3');
      //echo "relacion insertada correctamente<br>";
    }
    else{
		header('location: '.'../../views/error.php?ID=c3');
      //echo 'error insertando la relación';
    }
  }
}
$usuarios = $man->listUsers();
foreach ($usuarios as $user) {
  $man->deleteRelationUserPag($user['user_name'],$_POST['nombre']);
  if(isset($_POST[$user['user_name']])){
    if($man->insertRelationUserPag($user['user_name'],$_POST['nombre'])){
		//header('location: '.'../../views/correcto.php?ID=c10');
      //echo "relacion insertada correctamente<br>";
    }else{
		header('location: '.'../../views/error.php?ID=e10');
      //echo 'error insertando la relación';
    }
  }
}
//Al terminar se supone que todo es correcto y mostramos.
header('location: '.'../../views/correcto.php?ID=c0');
?>
