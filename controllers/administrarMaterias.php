<?php
  session_start(); // se inicia el manejo de sesiones

  //Includes iniciales
  require_once '../views/templateEngine.php'; // se carga la clase TemplateEngine
  require_once '../model/Materia.php';
  require_once '../model/Titulacion.php';
  require_once '../model/driver.php';
  require_once 'navbar.php'; //Inclusión de navbar. Omitible si no la necesita
  require_once 'comboboxes.php';


  //Conexion a la BD
  $db = Driver::getInstance();

  //Instancias TemplateEngine, renderizan elementos
  $renderMain = new TemplateEngine();
  $renderAll = new TemplateEngine();
  $renderPlantilla = new TemplateEngine();
  $materias = new Materia($db);
  $titulos = new Titulacion($db);


  $allMaterias = $materias->all();// todas las materia

  //$rendermistit->allTitulaciones = $allTitulaciones;
  $renderAll->titulos = $titulos->all();

  $renderPlantilla->titulacion = titulacionRenderComboBox();


  if( isset($_POST['titulacion'])){
     if($_POST['titulacion'] != "nil"){
       $titulacionfiltro = new Titulacion($db);
       $titulacionfiltro = $titulacionfiltro->findBy('tit_id',$_POST['titulacion']);
       if($titulacionfiltro){
          $titulacionfiltro= $titulacionfiltro[0];

           foreach ($allMaterias as $key => $mat) {
             if($mat->getTit_id() != $titulacionfiltro->getTit_id()){
               unset($allMaterias[$key]);
             }
           }
       }
    }
  }
  $renderAll->allMaterias = $allMaterias;
  $renderMain->title = "Materias"; //Titulo y cabecera de la pagina
  $renderMain->navbar = renderNavBar(); //Inserción de navBar en la pagina. Omitible si no la necesita
  $renderMain->content = $renderAll->render('administrarMaterias_v.php'); //Inserción del contenido de la página
  echo $renderMain->renderMain(); // Dibujado de la página al completo

 ?>
