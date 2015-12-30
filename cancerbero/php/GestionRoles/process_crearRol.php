<?php
/* Procesador de crear Rol (formato modelo)
 * Hecho por FVieira para interfaces de usuario ET1
 */

require_once("../DBManager.php");
$man = DBManager::getInstance(); //crea instancia
$man->connect(); //conectate a la bbdd

if($man->insertarRol($_POST['nombre'],$_POST['desc'])){
	//header('location: '.'../../views/correcto.php?ID=c9');
  //echo "Pagina creada correctamente";
  // redireccion a mensaje correcto aqui
}else{
	header('location: '.'../../views/error.php?ID=e9');
  //echo "Error creado el rol, ya existia un rol con ese nombre";
  // redireccion a mensaje de error aqui
}

$usuarios = $man->listUsers();
foreach ($usuarios as $user) {
  if(isset($_POST[$user['user_name']])){
    if($man->insertRelationUserRol($user['user_name'],$_POST['nombre'])){
		//header('location: '.'../../views/correcto.php?ID=c1');
     // echo "relacion insertada correctamente";
    }else{
		header('location: '.'../../views/error.php?ID=e1');
     // echo "error insertando la relacion";
    }
  }
}

$funcionalidades = $man->listFuns();
foreach ($funcionalidades as $fun) {
  if(isset($_POST[$fun['fun_name']])){
    if($man->insertRelationRolFun($_POST['nombre'],$fun['fun_name'])){
		//header('location: '.'../../views/correcto.php?ID=c3');
      //echo "relacion insertada correctamente";
    }else{
		header('location: '.'../../views/error.php?ID=e3');
     // echo "error insertando la relacion";
    }
  }
}
 header('location: '.'../../views/correcto.php?ID=c0');
?>
<button onclick="location.href='../../GestionRoles/GestionRoles.php'">OK</button>
