<?php
  // Plantilla de creación de un controlador por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos

  //Conexion a la BD (Permite usar las funciones de DBManager de Cancerbero)
  $db = DBManager::getInstance();
  $db->connect();

  //Instanciacion de Driver
  $dbm = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();

  $renderPlantilla->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto


  //FUNCIONES DEL CONTROLADOR
  //Escribimos aquí lo que hace este controlador en concreto (Comprueba el login, redirecciona...)


  //RENDERIZADO FINAL
  $renderMain->title = "PLANTILLA"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderPlantilla->render('plantilla_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
