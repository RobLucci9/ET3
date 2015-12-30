<<<<<<< HEAD
<?php
  // HECHO POR MIGUEL OSCAR

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Titulacion.php'

  session_start(); // se inicia el manejo de sesiones

  //Instanciacion de Driver
  $db = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderAltaTitulacion = new TemplateEngine();
  $renderPlantilla->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto
  $renderSubirApunte->modal = null;

  $renderMain->title = "Alta titulacion";
//no se si habia que tener en cuenta al usuario que de la alta a esa titulacion
//por que no sabia de donde obtener tit_id

  $titulacion = new Titulacion($db);
  $usuarios = new Usuario($db);
  $usuario = $usuarios->findBy('user_name',$_SESSION['name']);
  $id = $usuario[0]->getUser_id;

  $titulacion->setTit_id($id);
  $titulacion->setTit_name($_POST['name']);

  //se crea en la base de datos
  $titulacion->create();

  //RENDERIZADO FINAL
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  echo $renderMain->renderMain(); // Dibujado de la página al completo
//me dijiste que no habia que hacer vista ninguna asique no lo envié a ningún lado
 ?>
=======
<?php
  // HECHO POR MIGUEL OSCAR

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../cancerbero/php/DBManager.php'; // se carga el driver de cancerbero
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Titulacion.php'

  session_start(); // se inicia el manejo de sesiones

  //Instanciacion de Driver
  $db = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderAltaTitulacion = new TemplateEngine();
  $renderPlantilla->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto
  $renderSubirApunte->modal = null;

  $renderMain->title = "Alta titulacion";
//no se si habia que tener en cuenta al usuario que de la alta a esa titulacion
//por que no sabia de donde obtener tit_id

  $titulacion = new Titulacion($db);
  $usuarios = new Usuario($db);
  $usuario = $usuarios->findBy('user_name',$_SESSION['name']);
  $id = $usuario[0]->getUser_id;

  $titulacion->setTit_id($id);
  $titulacion->setTit_name($_POST['name']);

  //se crea en la base de datos
  $titulacion->create();

  //RENDERIZADO FINAL
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  echo $renderMain->renderMain(); // Dibujado de la página al completo
//me dijiste que no habia que hacer vista ninguna asique no lo envié a ningún lado
 ?>
>>>>>>> upstream/master
