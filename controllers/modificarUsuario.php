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
  $db = Driver::getInstance(); // inicializa BD
  $dbm = DBManager::getInstance(); // inicializa DBManager de cancerbero
  $db->connect(); // conecta a la BD
  $dbm->connect(); // conecta a la BD

  if(isset($_POST['pass'])){ // si se ha escrito una contraseña y se le dio a submit
    $usuario = new Usuario($db); // inicializa objeto Usuario
    $usuario = $usuario->findBy('user_name',$_SESSION['name']);// coge el usuario que corresponde con la sesion en la que está
    $usuario = $usuario[0];// coge el primer usuario del array(solo hay uno)
    $usuario->setUser_pass($_POST['pass']);// cambia la pass en el objeto Usuario
    if(isset($_POST['name']) && isset($_POST['name']) && $dbm->existUserRol($_SESSION["name"],"AdminApuntorium")){ // si se ha escrito un nombre y un email, se le dio a submit y ademas el usuario es administrador
      $usuario->setUser_name($_POST['name']);  //cambia el nombre en el objeto Usuario
      $usuario->setUser_email($_POST['email']); // cambia el email en el objeto Usuario
    }
    $usuario->save();// guarda la pass en la BD
    header("location: confirmacion.php"); //correcto
  }

  $renderMain->title = "modificacion";//Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar();//Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderModificacion->render('modificarUsuario_v.php');//Inserción del contenido de la página
  echo $renderMain->renderMain(); //renderiza y muestra al user

 ?>
