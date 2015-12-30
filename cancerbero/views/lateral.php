<?php
  function RenderLateral($no){
    $Idioma = getIdioma();

    $items = array("<a href='../GestionUsuarios/GestionUsuarios.php'>".$Idioma['Gestión de Usuarios']."</a>",
                    "<a href='../GestionRoles/GestionRoles.php'>".$Idioma['Gestión de Roles']."</a>",
                    "<a href='../GestionPaginas/GestionPaginas.php'>".$Idioma['Gestión de Páginas']."</a>",
                    "<a href='../GestionFuncionalidades/GestionFuncionalidades.php'>".$Idioma['Gestión de Funcionalidades']."</a>");
    echo "<div class=' lateral col-md-3 col-sm-12'>";
    echo "<ul class='nav nav-pills nav-stacked lateral '>";
    //echo "<li class= 'active'>";
    //echo $items[$no];
    //unset($items[$no]);
    //echo "</li>";
    foreach ($items as $item) {
      if($item == $items[$no]){
        echo "<li class='active'>".$item."</li>";
      }else{
        echo "<li>".$item."</li>";
      }
    }
    echo "</ul>";
    echo "<br>";
    echo "</div>";
  }
?>
