<?php
// proceso de auto-instalacion de la base de datos de la ET1 hecha para que el señor Rodeiro no se canse de darle a importar en phpmyadmin
$SQLEXPORT = file_get_contents("../bbdd/DumpFinal.sql");
$db;
function connect(){
  global $db;
  $Rpass = $_POST['pass'];
  $db = new mysqli('localhost','root',$Rpass,'mysql');
  unset($Rpass);
  unset($_POST['pass']); // Garantia de que la contraseña no va a ser robada
  if ($db->connect_errno) {
    echo "error connecting to BBDD comprueba si pusiste la contraseña correctamente";
    die("Failed to connect to MySQL: " . $db->connect_error);
    return false;
  }
  return true;
}
function doQuery($query){
  global $db;
  $result = $db->multi_query($query);
  if(!$result){
    die("Error en la query: ".$db->error);
  }
  return $result;
}

if(connect()){
  doQuery($SQLEXPORT);
  echo "instalado. Disfrute de nuestra aplicacion";
}else{
  die("no se puede connectar a la base de datos");
}
