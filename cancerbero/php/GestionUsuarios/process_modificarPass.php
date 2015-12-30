<?php
/* Procesador de modificar contraseña
 * Todavía no está acabado, la funcion en DBManager debe ser creada
 */

require_once("../DBManager.php");
$man = DBManager::getInstance(); //crea instancia
$man->connect(); //conectate a la bbdd
if($_POST['pass1']==$_POST['pass2']){
  if($man->ModificarPass($_POST['pass1'],$_GET["id"])){
		header('location: '.'../../views/correcto.php?ID=c5');
    //echo "Contraseña cambiada correctamente";
    // redireccion a mensaje correcto aqui
  }else{
	header('location: '.'../../views/error.php?ID=e5');
   // echo "Error durante el cambio de contraseña";
    // redireccion a mensaje de error aqui
  }
}else{
	header('location: '.'../../views/error.php?ID=e5');
  //echo "Las contraseñas no coinciden";
}
//Al terminar se supone que todo es correcto y mostramos.
header('location: '.'../../views/correcto.php?ID=c0');
?>
