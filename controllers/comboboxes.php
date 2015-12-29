<?php
  //controlador que crea comboboxes de materia. Creado por FVieira
  require_once '../model/driver.php';
  require_once '../model/Materia.php';
  require_once '../views/templateEngine.php';

  function materiaRenderComboBox(){
    $render = new templateEngine();
    $db = Driver::getInstance();
    $materias = new Materia($db);
    $render->materias = $materias->all();
    return $render->render('materiaCB_v.php');
  }

  function titulacionRenderComboBox(){
    $render = new templateEngine();
    $db = Driver::getInstance();
    $titulaciones = new Titulacion($db);
    $render->titulaciones = $titulaciones->all();
    return $render->render('titulacionCB_v.php');
  }

  function anhoRenderComboBox(){
    $render = new templateEngine();
    return $render->render('anhoCB_v.php');
  }
