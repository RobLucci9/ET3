<<<<<<< HEAD
<?php
  // Controlador de administradores de materia por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Materia.php';
  require_once '../model/Titulacion.php';
  require_once '../model/Administra.php';
  require_once 'modal.php';
  //Instanciacion de Driver
  $dbm = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderMatAdmin = new TemplateEngine();
  $usuarios = new Usuario($dbm);
  $materias = new Materia($dbm);
  $titulos = new Titulacion($dbm);
  $administradores = new Administra($dbm);
  $renderMatAdmin->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto

  //FUNCIONES DEL CONTROLADOR
  if(isset($_POST["usuario"])&&isset($_POST["materia"])){
    if(!$administradores->existe($_POST["usuario"],$_POST["materia"])){
      $administradores->setUser_id($_POST["usuario"]);
      $administradores->setMat_id($_POST["materia"]);
      $administradores->create();
      $renderMatAdmin->status = renderModalCorrecto("Operación Exitosa", "Nuevos permisos de administración añadidos correctamente");
    }
    else{
      $status = "El usuario ya admministra esta materia";
      $contenido = "El usuario ya tiene permisos de administrador sobre los apuntes de la materia";
      $renderMatAdmin->status = renderModalError($status,$contenido);
    }
  }
  if(isset($_POST["parser"])){
    $eliminar = $_POST["parser"];
    $eliminar = preg_split("/[\s,]+/",$eliminar,null);
    $administradores = $administradores->findBy("user_id", $eliminar[0]);
    foreach($administradores as $key){
      if($key->getMat_id()==$eliminar[1]){
        $key->destroy();
        $renderMatAdmin->status = renderModalCorrecto("Eliminado","Eliminación correcta");
      }
    }
  }


  $renderMatAdmin->usuarios = $usuarios->all();
  $renderMatAdmin->materias = $materias->all();
  $renderMatAdmin->titulos = $titulos->all();
  $administradores = new Administra($dbm);
  $renderMatAdmin->administradores = $administradores->all();

  //RENDERIZADO FINAL
  $renderMain->title = "Administradores de Materia"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderMatAdmin->render('administradoresMateria_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
=======
<?php
  // Controlador de administradores de materia por Martín Vázquez

  session_start(); // se inicia el manejo de sesiones

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once '../model/driver.php'; //Inclusión de Driver de las clases de "model". Omitible si no las usamos
  require_once '../model/Materia.php';
  require_once '../model/Titulacion.php';
  require_once '../model/Administra.php';
  require_once 'modal.php';
  //Instanciacion de Driver
  $dbm = Driver::getInstance(); //Esto permite el uso de las clases de "model" (Usuario.php, Apunte.php etc...)

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderMatAdmin = new TemplateEngine();
  $usuarios = new Usuario($dbm);
  $materias = new Materia($dbm);
  $titulos = new Titulacion($dbm);
  $administradores = new Administra($dbm);
  $renderMatAdmin->status = "<br/>"; //Se usa este campo para mostrar mensajes de error o avisos, salto de línea por defecto

  //FUNCIONES DEL CONTROLADOR
  if(isset($_POST["usuario"])&&isset($_POST["materia"])){
    if(!$administradores->existe($_POST["usuario"],$_POST["materia"])){
      $administradores->setUser_id($_POST["usuario"]);
      $administradores->setMat_id($_POST["materia"]);
      $administradores->create();
      $renderMatAdmin->status = renderModalCorrecto("Operación Exitosa", "Nuevos permisos de administración añadidos correctamente");
    }
    else{
      $status = "El usuario ya admministra esta materia";
      $contenido = "El usuario ya tiene permisos de administrador sobre los apuntes de la materia";
      $renderMatAdmin->status = renderModalError($status,$contenido);
    }
  }
  if(isset($_POST["parser"])){
    $eliminar = $_POST["parser"];
    $eliminar = preg_split("/[\s,]+/",$eliminar,null);
    $administradores = $administradores->findBy("user_id", $eliminar[0]);
    foreach($administradores as $key){
      if($key->getMat_id()==$eliminar[1]){
        $key->destroy();
        $renderMatAdmin->status = renderModalCorrecto("Eliminado","Eliminación correcta");
      }
    }
  }


  $renderMatAdmin->usuarios = $usuarios->all();
  $renderMatAdmin->materias = $materias->all();
  $renderMatAdmin->titulos = $titulos->all();
  $administradores = new Administra($dbm);
  $renderMatAdmin->administradores = $administradores->all();

  //RENDERIZADO FINAL
  $renderMain->title = "Administradores de Materia"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderMatAdmin->render('administradoresMateria_v.php'); //Inserción del contenido de la página

  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
>>>>>>> upstream/master
