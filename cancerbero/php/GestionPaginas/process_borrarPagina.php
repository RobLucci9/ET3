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
  if($man->borrarPagina($borrar)){
	  header('location: '.'../../views/correcto.php?ID=c12');
   // echo "Borrado Correctamente<br>";
   // echo "<button onclick='location.href=\"../../GestionPaginas/GestionPaginas.php\"'>OK</button>";
  }
  else{
	  header('location: '.'../../views/error.php?ID=c12');
    //echo "todo mal";
    //echo "<button onclick='location.href=\"../../GestionPaginas/GestionPaginas.php\"'>OK</button>";
  }
}else{//Pide confirmación
  echo "¿Seguro que desea borrar?<br>";
  echo "<button onclick='location.href=\"../../GestionPaginas/GestionPaginas.php\"'>Cancelar</button>";
  echo "<button onclick='location.href=\"../../php/GestionPaginas/process_borrarPagina.php?id=$borrar&confirm=1\"'>OK</button>";
}

?>
