<?php
/* Procesador de crear pagina (formato modelo)
 * Hecho por FVieira para interfaces de usuario ET1
 */

require_once("../DBManager.php");
$man = DBManager::getInstance(); //crea instancia
$man->connect(); //conectate a la bbdd

if($man->insertarPag($_POST['nombre'],$_POST['desc'])){
	//header('location: '.'../../views/correcto.php?ID=c11');
 // echo "Pagina creada correctamente";
  // redireccion a mensaje correcto aqui
}else{
	header('location: '.'../../views/error.php?ID=e11');
  //echo "Error creado la pagina, ya existia una pagina con ese nombre";
  // redireccion a mensaje de error aqui
}

$funcionalidades = $man->listFuns();
foreach ($funcionalidades as $fun) {
  if(isset($_POST[$fun['fun_name']])){
    if($man->insertRelationPagFun($_POST['nombre'],$fun['fun_name'])){
		//header('location: '.'../../views/correcto.php?ID=c3');
      //echo "relacion insertada correctamente";
    }else{
		header('location: '.'../../views/error.php?ID=e3');
      //echo "error insertando la relacion";
    }
  }
}
$usuarios = $man->listUsers();
foreach ($usuarios as $user) {
  if(isset($_POST[$user['user_name']])){
    if($man->insertRelationUserPag($user['user_name'],$_POST['nombre'])){
		//header('location: '.'../../views/correcto.php?ID=c10');
      //echo "relacion insertada correctamente";
    }else{
		header('location: '.'../../views/error.php?ID=e10');
      //echo "error insertando la relacion";
    }
  }
}

 header('location: '.'../../views/correcto.php?ID=c0');
?>
<button onclick="location.href='../../GestionPaginas/GestionPaginas.php'">OK</button>
