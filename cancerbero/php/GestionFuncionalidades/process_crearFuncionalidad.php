<?php
/* Procesador de crear funcionalidad (formato modelo)
 * Hecho por FVieira para interfaces de usuario ET1
 */

require_once("../DBManager.php");
$man = DBManager::getInstance(); //crea instancia
$man->connect(); //conectate a la bbdd

if($man->insertarfun($_POST['nombre'],$_POST['desc'])){
	//header('location: '.'../../views/correcto.php?ID=c13');
  //echo "funcionalidad creada correctamente";
  // redireccion a mensaje correcto aqui
}else{
	header('location: '.'../../views/error.php?ID=e13');
  //echo "Error creado la funcionalidad, ya existia una funcionalidad con ese nombre";
  // redireccion a mensaje de error aqui
}

$paginas = $man->listPags();
foreach ($paginas as $pag) {
  if(isset($_POST[$pag['pag_name']])){
    if($man->insertRelationPagFun($pag['pag_name'],$_POST['nombre'])){
		//header('location: '.'../../views/correcto.php?ID=c2');
      //echo "relacion insertada correctamente";
    }else{
		header('location: '.'../../views/error.php?ID=e2');
      //echo "error insertando la relacion";
    }
  }
}
$roles = $man->listRols();
foreach ($roles as $rol) {
  if(isset($_POST[$rol['rol_name']])){
    if($man->insertRelationRolFun($rol['rol_name'],$_POST['nombre'])){
	//	header('location: '.'../../views/correcto.php?ID=c1');
     // echo "relacion insertada correctamente";
    }else{
		header('location: '.'../../views/error.php?ID=e1');
     // echo "error insertando la relacion";
    }
  }
}
$usuarios = $man->listUsers();
foreach ($usuarios as $user) {
  if(isset($_POST[$user['user_name']])){
    if($man->insertRelationUserFun($user['user_name'],$_POST['nombre'])){
		//header('location: '.'../../views/correcto.php?ID=c10');
      //echo "relacion insertada correctamente";
    }else{
		header('location: '.'../../views/error.php?ID=c10');
     // echo "error insertando la relacion";
    }
  }
}
 header('location: '.'../../views/correcto.php?ID=c0');
?>
<button onclick="location.href='../../GestionFuncionalidades/GestionFuncionalidades.php'">OK</button>
