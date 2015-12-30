<?php include("../views/header.php");
	RenderBanner("Gestión de Páginas");
	cerberus("CER_GestionPaginas");
	$Idioma = getIdioma();
?>
<div class="container">
	<div class="row">

<?php include("../views/lateral.php");
	RenderLateral(2);
?>
	<div class="col-md-9 col-sm-12">
		<h1><?php echo $Idioma['Gestión de Páginas']; makeTooltip($Idioma['tgp'],$Idioma['dgp']); ?></h1>
	<?php
		$table_maker = new RenderTableGestion;
		$table_maker->tablePagina();
	?>
	<hr/>
		<button class='btn btn-default btn-primary' onclick="location.href='CrearPagina.php'"><?php echo $Idioma['Crear']; ?></button>
		<button class='btn btn-default ' onclick="location.href='ModificarPagina.php'"><?php echo $Idioma['Modificar']; ?></button>
</div>
</div>
<div class="footer logo4"></div>
<?php include("../views/popupGestion.php"); ?>
<?php include("../views/footer.php");
	renderFooter();
?>
