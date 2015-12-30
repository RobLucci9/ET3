<?php
require_once("../../cancerbero.php");

$borrar = $_GET["id"];				//Leemos la id del usuario que hay que borrar
$confirm = $_GET["confirm"];		//Leemos la variable confirm, la cual indica si hay que pedir confirmacion o borrar el usuario

require_once("../DBManager.php");	//Se incluye la clase que gestiona la DB
$man = DBManager::getInstance(); 	//Se creaa un objeto de la calse DBManager, si ya hay alguno creado solo se devuelve el que ya hay.
$man->connect(); 					//Se conecta con la BD

if($confirm==1){						//Si el usuario ya ha confirmado el borrado
  if($man->borrarUsuario($borrar)){			//Si se borra el usuario con exito
	$pagina_anterior=$_SERVER['HTTP_REFERER'];
	header('location: '.'../../views/correcto.php?ID=c7');
    //echo "Borrado Correctamente<br>";			//Mensaje de exito
    echo "<button onclick='location.href=\"../../GestionUsuarios/GestionUsuarios.php\"'>OK</button>";	//Boton de OK que te devuelve a la gestion de usuarios
  }
  else{										//Si no
	$pagina_anterior=$_SERVER['HTTP_REFERER'];
	header('location: '.'../../views/error.php?ID=e7');
    //echo "todo mal";							//Mensaje de error
    echo "<button onclick='location.href=\"../../GestionUsuarios/GestionUsuarios.php\"'>OK</button>";	//Boton de OK que te devuelve a la gestion de usuarios
  }
}else{									//Si no
  echo "¿Seguro que desea borrar a $borrar ?<br>";		//Se pide confirmacion
  echo "<button onclick='location.href=\"../../GestionUsuarios/GestionUsuarios.php\"'>Cancelar</button>"; //Boton para cancelar el borrado
  echo "<button onclick='location.href=\"../../php/GestionUsuarios/process_borrarUsuario.php?id=$borrar&confirm=1\"'>OK</button>"; //Boton para confirmar el borrado
}

?>
