<<<<<<< HEAD
<?php
  // Controlador subir apunte hecho por FVieira

  //Includes iniciales
  require_once '../views/templateEngine.php';
  require_once '../model/driver.php';
  require_once '../model/Apunte.php';
  require_once '../model/Usuario.php';
  require_once 'navbar.php';
  require_once 'comboboxes.php';
  require_once 'modal.php';

  session_start(); // se inicia el manejo de sesiones
  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderSubirApunte = new TemplateEngine();
  $renderSubirApunte->modal = null;
  //FUNCIONES DEL CONTROLADOR
  $renderMain->title = "SubirApunte"; //Titulo y cabecera de la pagina
  if(isset($_FILES['apunteUploaded'])){
    //inicio colecta de datos para ser introducidos en la bd
    $apunte = new Apunte($db);
    $usuarios = new Usuario($db);
    $usuario = $usuarios->findBy('user_name',$_SESSION['name']);
    $id = $usuario[0]->getUser_id();
    $apunte->setUser_id($id);
    $apunte->setApunte_name($_POST['name']);
    $apunte->setMat_id($_POST['materia']);
    $apunte->setAnho_academico($_POST['anho']);
    //fin colecta de datos

    //inicio operacion subir archivo
    $titulo = "Archivo subido correctamente";
    $contenido = "gracias por su colaboración con la comunidad";
    $target = "../apuntes/";
    $hashedName = md5_file($_FILES['apunteUploaded']['tmp_name']); //en el servidor su guarda como filename el hash md5
                                                                   //resultante de hashear el archivo. Asi si dos archivos son diferentes tendran diferente filename
    $target = $target . basename( $hashedName ) ;
    $ok=1;
    if($_FILES["apunteUploaded"]["type"] == "application/pdf"){
      if(is_uploaded_file($_FILES['apunteUploaded']['tmp_name'])){
        if(move_uploaded_file($_FILES['apunteUploaded']['tmp_name'], $target))  {
          $titulo =  "El apunte ". basename( $_FILES['apunteUploaded']['name']). " ha sido subido correctamente";
        }  else {
          $titulo =  "Error subiendo el apunte.";
          $contenido = "Ha ocurrido un error inesperado. Compruebe los datos de entrada, pruebe otra vez y si el error sigue ocurriendo contacte con un administrador";
        }
      }
    }else{
      $titulo = "fichero invalido";
      $contenido = "compruebe que su fichero es .pdf";
    }
    //fin operacion subir archivo

    $apunte->setRuta($hashedName);
    $apunte->create(); //se crea en la BD el nuevo apunte
    $renderSubirApunte->modal = renderModal($titulo,$contenido);
  }
  //RENDERIZADO FINAL
  $renderSubirApunte->comboboxMateria = materiaRenderComboBox(); //se renderiza el combobox materia
  $renderSubirApunte->comboboxAnho = anhoRenderComboBox(); // se renderiza el combobox de año
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderSubirApunte->render('subirApunte_v.php'); //Inserción del contenido de la página
  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
=======
<?php
  // Controlador subir apunte hecho por FVieira

  //Includes iniciales
  require_once '../views/templateEngine.php';
  require_once '../model/driver.php';
  require_once '../model/Apunte.php';
  require_once '../model/Usuario.php';
  require_once 'navbar.php';
  require_once 'comboboxes.php';
  require_once 'modal.php';

  session_start(); // se inicia el manejo de sesiones
  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderSubirApunte = new TemplateEngine();
  $renderSubirApunte->modal = null;
  //FUNCIONES DEL CONTROLADOR
  $renderMain->title = "SubirApunte"; //Titulo y cabecera de la pagina
  if(isset($_FILES['apunteUploaded'])){
    //inicio colecta de datos para ser introducidos en la bd
    $apunte = new Apunte($db);
    $usuarios = new Usuario($db);
    $usuario = $usuarios->findBy('user_name',$_SESSION['name']);
    $id = $usuario[0]->getUser_id();
    $apunte->setUser_id($id);
    $apunte->setApunte_name($_POST['name']);
    $apunte->setMat_id($_POST['materia']);
    $apunte->setAnho_academico($_POST['anho']);
    //fin colecta de datos

    //inicio operacion subir archivo
    $titulo = "Archivo subido correctamente";
    $contenido = "gracias por su colaboración con la comunidad";
    $target = "../apuntes/";
    $hashedName = md5_file($_FILES['apunteUploaded']['tmp_name']); //en el servidor su guarda como filename el hash md5
                                                                   //resultante de hashear el archivo. Asi si dos archivos son diferentes tendran diferente filename
    $target = $target . basename( $hashedName ) ;
    $ok=1;
    if($_FILES["apunteUploaded"]["type"] == "application/pdf"){
      if(is_uploaded_file($_FILES['apunteUploaded']['tmp_name'])){
        if(move_uploaded_file($_FILES['apunteUploaded']['tmp_name'], $target))  {
          $titulo =  "El apunte ". basename( $_FILES['apunteUploaded']['name']). " ha sido subido correctamente";
        }  else {
          $titulo =  "Error subiendo el apunte.";
          $contenido = "Ha ocurrido un error inesperado. Compruebe los datos de entrada, pruebe otra vez y si el error sigue ocurriendo contacte con un administrador";
        }
      }
    }else{
      $titulo = "fichero invalido";
      $contenido = "compruebe que su fichero es .pdf";
    }
    //fin operacion subir archivo

    $apunte->setRuta($hashedName);
    $apunte->create(); //se crea en la BD el nuevo apunte
    $renderSubirApunte->modal = renderModal($titulo,$contenido);
  }
  //RENDERIZADO FINAL
  $renderSubirApunte->comboboxMateria = materiaRenderComboBox(); //se renderiza el combobox materia
  $renderSubirApunte->comboboxAnho = anhoRenderComboBox(); // se renderiza el combobox de año
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderSubirApunte->render('subirApunte_v.php'); //Inserción del contenido de la página
  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
>>>>>>> upstream/master
