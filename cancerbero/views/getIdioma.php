<?php
function getIdioma(){
//$Idioma = 0;
if(!isset($_SESSION['LE'])) {$_SESSION['LE']="sp";}
  switch ($_SESSION["LE"]) {
    case 'sp':
      require '../views/lenguaje/spanish.php';
    break;
    case 'en':
      require '../views/lenguaje/English.php';
    break;
    case 'br':
      require '../views/lenguaje/Brasilian.php';
    break;
    DEFAULT:
      require '../views/lenguaje/English.php';
    break;
  }
return $Idioma;
}
?>
