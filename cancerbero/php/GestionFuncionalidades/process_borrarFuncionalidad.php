<?php
//Geteamos la id a borrar
$borrar = $_GET["id"];
$confirm = $_GET["confirm"];
//Conexion con base de datos

require_once("../DBManager.php");
$man = DBManager::getInstance(); //crea instancia
$man->connect(); //conectate a la bbdd

if($confirm==1){
  //Borramos
  if($man->borrarFuncionalidad($borrar)){
	//  header('location: '.'../../views/correcto.php?ID=c14');
   // echo "Borrado Correctamente<br>";
   // echo "<button onclick='location.href=\"../../GestionFuncionalidades/GestionFuncionalidades.php\"'>OK</button>";
  }
  else{
	//  header('location: '.'../../views/error.php?ID=c14');
   // echo "todo mal";
    //echo "<button onclick='location.href=\"../../GestionFuncionalidades/GestionFuncionalidades.php\"'>OK</button>";
  }
}else{//Pide confirmación
  echo "¿Seguro que desea borrar?<br>";
  echo "<button onclick='location.href=\"../../GestionFuncionalidades/GestionFuncionalidades.php\"'>Cancelar</button>";
  echo "<button onclick='location.href=\"../../php/GestionFuncionalidades/process_borrarFuncionalidad.php?id=$borrar&confirm=1\"'>OK</button>";
}
 header('location: '.'../../views/correcto.php?ID=c0');

?>
