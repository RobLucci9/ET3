<?php include("../views/header.php"); 	//Incluye el header
  RenderBanner("Menu Principal"); 		//Muestra el header con la funcion definida en header.php
  cerberus("CER_Menu");
  $Idioma = getIdioma(); 				//Guarda en $Idioma el array asociativo que almacena el idioma. getIdioma() esta definido en header.php
?>

<div class="container"> <!-- Este div llega hasta footer, representa toda la interfaz principal -->
  <div class="row">
    <div class="col-md-6 text-center">
      <a style="text-decoration: none" href="../GestionUsuarios/GestionUsuarios.php">
        <div class="BotonMenu">
          <div class="logo3"></div>
          <?php echo $Idioma['Gestión de Usuarios']; makeTooltip($Idioma['tusuarios'],$Idioma['dusuarios']); ?>
        </div>
      </a>
    </div>
    <div class="col-md-6 text-center">
      <a style="text-decoration: none" href="../GestionRoles/GestionRoles.php">
      <div class="BotonMenu">
        <div class="logo1"></div>
        <?php echo $Idioma['Gestión de Roles'];  makeTooltip($Idioma['troles'],$Idioma['droles']);  ?>
      </div>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 text-center">
      <a style="text-decoration: none" href="../GestionPaginas/GestionPaginas.php">
      <div class="BotonMenu">
        <div class="logo4"></div>
        <?php echo $Idioma['Gestión de Páginas'];  makeTooltip($Idioma['tpaginas'],$Idioma['dpaginas']);  ?>
      </div>
      </a>
    </div>
    <div class="col-md-6 text-center">
      <a style="text-decoration: none" href="../GestionFuncionalidades/GestionFuncionalidades.php">
      <div class="BotonMenu">
        <div class="logo2"></div>
        <?php echo $Idioma['Gestión de Funcionalidades'];  makeTooltip($Idioma['tfuncionalidades'],$Idioma['dfuncionalidades']);  ?>
      </div>
      </a>
    </div>
  </div>
</div>

<?php include("../views/footer.php"); 	//Incluye el footer
  renderFooter(); 						//Muestra el footer con la funcion definida en footer.php
?>
