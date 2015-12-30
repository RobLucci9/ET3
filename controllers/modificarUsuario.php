<?php
  // Plantilla de creación de un controlador por Martín "Vázquez"
  session_start(); // se inicia el manejo de sesiones
  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/driver.php';
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/Usuario.php';

  $renderMain = new TemplateEngine(); //plantilla main
  $renderModificacion = new TemplateEngine(); // plantilla del registro
  $renderModificacion->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto
  $db = Driver::getInstance();
  $dbm = DBManager::getInstance();
  $db->connect();
  $dbm->connect();

  if(isset($_POST['pass'])){
    $usuario = new Usuario($db);
    $usuario = $usuario->findBy('user_name',$_SESSION['name']);
    $usuario = $usuario[0];
    $usuario->setUser_pass($_POST['pass']);
    if(isset($_POST['name']) && isset($_POST['name']) && $dbm->existUserRol($_SESSION["name"],"AdminApuntorium")){
      $usuario->setUser_name($_POST['name']);
      $usuario->setUser_email($_POST['email']);
    }
    $usuario->save();
    header("location: confirmacion.php"); //correcto
  }

  $renderMain->title = "modificacion";
  $renderMain->navbar = renderNavBar();
  $renderMain->content = $renderModificacion->render('modificarUsuario_v.php');
  echo $renderMain->renderMain(); //renderiza y muestra al user

 ?>
