<?php
  //controlador que crea modals. Creado por FVieira
  require_once '../views/templateEngine.php';

  function renderModalCorrecto($titulo,$contenido){
    $modal = new templateEngine();
    $modal->titulo = "<p class='lead text-success'>".$titulo."</p>";
    $modal->contenido = $contenido;
    $modal->error = false;
    return $modal->render('modal_v.php');
  }
  function renderModalError($titulo,$contenido){
    $modal = new templateEngine();
    $modal->error = true;
    $modal->titulo = "<p class='lead text-danger'>".$titulo."</p>";
    $modal->contenido = $contenido;
    return $modal->render('modal_v.php');
  }
  function renderModal($titulo,$contenido){
    $modal = new templateEngine();
    $modal->error = false;
    $modal->titulo = "<p class='lead'>".$titulo."</p>";
    $modal->contenido = $contenido;
    return $modal->render('modal_v.php');
  }
