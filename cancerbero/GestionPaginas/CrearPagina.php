<!-- Vista crear pagina (formato modelo)
     Creada por FVieira para interfaces de Usuario ET1 -->
<?php include("../views/header.php");
	RenderBanner("Gestion de Páginas");
	cerberus("CER_CrearPagina");
	$Idioma = getIdioma();
?>

<div class="container">
	<div class="row">
		<?php include("../views/lateral.php");
			RenderLateral(2);
		?>
		<div class="col-md-9 col-sm-12">
			<form action="../php/GestionPaginas/process_crearPagina.php" method="post" id="formulario">

				<h1><?php echo $Idioma['Crear página']; makeTooltip($Idioma['tcp'],$Idioma['dcp']) ?></h1>
				<div class="form-group">
				<?php echo $Idioma['Nombre'];?>: <input type="text" class="form-control" name="nombre"><br/>
				<?php echo $Idioma['Descripcion']; ?>: <br/> <textarea rows="5" cols="30" name="desc"></textarea><br/>

				<?php
				$table_maker = new RenderTable;
				$table_maker->tableBlankFuncionalidad();
				?>

				<?php
				$table_maker->tableBlankUsuario();
				?>
<hr/>
			  <a class="btn btn-default" onclick="location.href='GestionPaginas.php'"><?php echo $Idioma['Atras'];?></a>
			  <input type="button" class="btn btn-default btn-primary" data-toggle="modal" data-target="#myModal"  value="<?php echo $Idioma['Guardar']; ?>" class="continuar"/>
			</div>
			</form>
		</div>
	</div>


<?php include("../views/popup.php"); ?>
<div class="footer logo4"></div>

<?php include("../views/footer.php");
	renderFooter(); //aqui va a ir el nombre de usuario de la sesion php
?>
