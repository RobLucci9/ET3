<?php include("../views/header.php");
	RenderBanner("Gestión de Funcionalidades");
	cerberus("CER_GestionFuncionalidades");
	$Idioma = getIdioma();

?>
<div class="container">
<div class="row">

<?php include("../views/lateral.php");
	RenderLateral(3); //gestion paginas esta el 2 en el array de lateral
?>

	<div class="col-md-9 col-sm-12">
		<h1><?php echo $Idioma['Gestión de Funcionalidades']; makeTooltip($Idioma['tgf'],$Idioma['dgf']); ?></h1>
		<?php
			$table_maker = new RenderTableGestion;
			$table_maker->tableFuncionalidad();
		?>
		<hr/>
		<button class="btn btn-default btn-primary" onclick="location.href='CrearFuncionalidad.php'"><?php echo $Idioma['Crear']; ?></button>
		<button class="btn btn-default" onclick="location.href='ModificarFuncionalidad.php'"><?php echo $Idioma['Modificar']; ?></button>
	</div>
</div>
<?php include("../views/popupGestion.php"); ?>
<div class="footer logo2"></div>
<?php include("../views/footer.php");
	renderFooter();
?>
