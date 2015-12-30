<<<<<<< HEAD
<?php
//Controlador para navbar por Martín Vázquez
//Asigna variables que deciden el contenido del navbar
require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
require_once '../cancerbero/php/DBManager.php'; //Se carga la API de la BD de cancerbero
require_once '../model/Usuario.php'; //ORM boroto
require_once '../model/Administra.php'; //ORM boroto
require_once '../model/driver.php';

function renderNavBar(){
  //Conexion a la BD
  $db = DBManager::getInstance();
  $db->connect();
  $dbm = Driver::getInstance();

  $navBar = new TemplateEngine();



  //---x---x--- Por defecto ---x---x---
  $navBar->log=0; //el usuario NO está logeado
  $navBar->admin=0; //por lo tanto no puede ser administrador
  $navBar->materia=0; //ni administrador de materia
  $navBar->user_id=null; //y no hay ID de usuario
  //Se ha hecho login?
  if(isset($_SESSION["name"])){
    //---x---x--- Si se ha hecho... ---x---x---
    $navBar->log=1; //el usuario está logeado
    $usuario = new Usuario($dbm);
    $usuario = $usuario->findBy('user_name',$_SESSION['name']); //CAMBIAME
    $navBar->user_id = $usuario[0]->getUser_id();
    //El usuario es un administrador?
    if($db->existUserRol($_SESSION["name"],"AdminApuntorium")){
        $navBar->admin=1; //el usuario es administrador
    }
    else{
      //El usuario es administrador de materia?
      $administra = new Administra($dbm);
      if(($administra->findBy('user_id',$usuario[0]->getUser_id())!=null)){
        $navBar->materia=1; //el usuario administra una materia
      }
    }
  }else{
  }
  return $navBar->render('navbar_v.php');
}
?>
=======
<?php
//Controlador para navbar por Martín Vázquez
//Asigna variables que deciden el contenido del navbar
require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
require_once '../cancerbero/php/DBManager.php'; //Se carga la API de la BD de cancerbero
require_once '../model/Usuario.php'; //ORM boroto
require_once '../model/Administra.php'; //ORM boroto
require_once '../model/driver.php';

function renderNavBar(){
  //Conexion a la BD
  $db = DBManager::getInstance();
  $db->connect();
  $dbm = Driver::getInstance();

  $navBar = new TemplateEngine();



  //---x---x--- Por defecto ---x---x---
  $navBar->log=0; //el usuario NO está logeado
  $navBar->admin=0; //por lo tanto no puede ser administrador
  $navBar->materia=0; //ni administrador de materia
  $navBar->user_id=null; //y no hay ID de usuario
  //Se ha hecho login?
  if(isset($_SESSION["name"])){
    //---x---x--- Si se ha hecho... ---x---x---
    $navBar->log=1; //el usuario está logeado
    $usuario = new Usuario($dbm);
    $usuario = $usuario->findBy('user_name',$_SESSION['name']); //CAMBIAME
    $navBar->user_id = $usuario[0]->getUser_id();
    //El usuario es un administrador?
    if($db->existUserRol($_SESSION["name"],"AdminApuntorium")){
        $navBar->admin=1; //el usuario es administrador
    }
    else{
      //El usuario es administrador de materia?
      $administra = new Administra($dbm);
      if(($administra->findBy('user_id',$usuario[0]->getUser_id())!=null)){
        $navBar->materia=1; //el usuario administra una materia
      }
    }
  }else{
  }
  return $navBar->render('navbar_v.php');
}
?>
>>>>>>> upstream/master
