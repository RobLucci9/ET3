<?php

require_once("../DBManager.php");
$man = DBManager::getInstance(); //crea instancia
$man->connect(); //conectate a la bbdd

$man->ModificarUsuario($_POST['nombre'],$_POST['desc'],$_POST['email']);
$changes;

$paginas = $man->listPags();
foreach ($paginas as $pag) {
  $man->deleteRelationUserPag($_POST['nombre'],$pag['pag_name']);
  if(isset($_POST[$pag['pag_name']])){
    if($man->insertRelationUserPag($_POST['nombre'],$pag['pag_name'])){
		}
    else{
      header('location: '.'../../views/error.php?ID=e4');
		}
  }
}
$roles = $man->listRols();
foreach ($roles as $rol) {
  $man->deleteRelationUserRol($_POST['nombre'],$rol['rol_name']);
  if(isset($_POST[$rol['rol_name']])){
    if($man->insertRelationUserRol($_POST['nombre'],$rol['rol_name'])){
		}else{
      header('location: '.'../../views/error.php?ID=e4');
		}
  }
}
$funcionalidades = $man->listFuns();
foreach ($funcionalidades as $fun) {
  $man->deleteRelationUserFun($_POST['nombre'],$fun['fun_name']);
  if(isset($_POST[$fun['fun_name']])){
    if($man->insertRelationUserFun($_POST['nombre'],$fun['fun_name'])){
		}
    else{
      header('location: '.'../../views/error.php?ID=e4');
		}
  }
}
header('location: '.'../../views/correcto.php?ID=c0');

?>
