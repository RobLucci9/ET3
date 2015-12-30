<!-- header -->
<?php include("../views/header.php");	//Incluye el header
  RenderBanner("Gestión de Usuarios");	//Muestra el header con la funcion definida en header.php
  cerberus("CER_GestionUsuarios");
  $Idioma = getIdioma();
?>
<!-- Barra Lateral -->
<div class="container"> <!-- Este div llega hasta footer, representa toda la interfaz principal -->
  <div class="row">
    <?php include("../views/lateral.php");	//Incluye el menu lateral
      renderLateral(0);						//Muestra el menu lateral con la funcion definida en lateral.php
    ?>
    <!-- Cuerpo -->
    <div class="col-md-9 col-sm-12">
      <h1><?php echo $Idioma['Gestión de Usuarios'];makeTooltip($Idioma['tgu'],$Idioma['dgu']); ?></h1>
      <?php											//Aqui no se incluye la clase RenderTableGestion porque ya se incluye en el header
        $table_maker = new RenderTableGestion;		//Se crea un Objeto que va a crear las tablas de gestion
        $table_maker->tableUsuario();				//Se muestra la tabla de gestion de usuarios
      ?>
      <hr/>
      <button class='btn btn-default btn-primary' onclick="location.href='CrearUsuario.php'"><?php echo $Idioma['Crear']; ?></button> 			<!--Boton para crear un usuario-->
      <button class='btn btn-default' onclick="location.href='ModificarUsuario.php'"><?php echo $Idioma['Modificar']; ?></button>	<!--Boton para modificar un usuario-->
    </div>
  </div>
  <!-- Modal para verificar borrado-->
<?php include("../views/popupGestion.php"); ?>

<div class="footer logo3"></div>
<?php include("../views/footer.php");	//Incluye el footer
  renderFooter(); 						//Muestra el footer con la funcion definida en footer.php
?>
