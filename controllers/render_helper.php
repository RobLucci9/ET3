<?php
require_once '../views/engine.php';
//funciones que cargan y renderizan automaticamente una plantilla en concreto. Solo es util si la plantilla en si no tiene variables
//hecho por FVieira
function renderfileNoNavbar($file){
  $view = new Template();
  $view->navbar = null;
  $view->title = "Login";
  $view->content = $view->render($file);
  echo $view->renderMain();
  return $view;
}
function renderfile($file){
  $view = new Template();
  $view->navbar = $view->render('navbar_v.php');
  $view->title = "Login";
  $view->content = $view->render($file);
  echo $view->render('main.php');
  return $view;
}
?>
