<?php include("../views/header.php");
	RenderBanner("Gestión de Usuarios");
	cerberus("CER_CrearUsuario");
	$Idioma = getIdioma();
?>

<div class="container">
	<div class="row">
		<?php include("../views/lateral.php");
			RenderLateral(0);
		?>
		<div class="col-md-9 col-sm-12">
			<form action="../php/GestionUsuarios/process_crearUsuario.php" method="post" id="formulario">
				<div class="form-group">
					<h1><?php echo $Idioma['Crear usuario']; makeTooltip($Idioma['tcu'],$Idioma['dcu']); ?></h1>
					<?php echo $Idioma['Nombre'];?>: <input type="text" class="form-control" name="nombre"><br/>
					<?php echo $Idioma['Descripcion']; ?>:<br/> <textarea rows="5" cols="30" name="desc"></textarea><br/>
					email: <input type="text" class="form-control" name="email"><br/>
					<?php echo $Idioma['Contraseña']; ?>: <input type="password" class="form-control" name="pass1"><br/>
    		<?php echo $Idioma['Repetir contraseña']; ?>: <input type="password" class="form-control" name="pass2"><br/>

				<?php
				$table_maker = new RenderTable;
				$table_maker->tableBlankRol();
				?>

				<?php
				$table_maker->tableBlankPagina();
				?>


				<?php
				$table_maker->tableBlankFuncionalidad();
				?>
<hr/>
	  		<a class="btn btn-default" onclick="location.href='GestionUsuarios.php'"><?php echo $Idioma['Atras'];?></a>
			<input type="button" class="btn btn-default btn-primary" data-toggle="modal" data-target="#myModal"  value="<?php echo $Idioma['Guardar']; ?>" class="continuar"/>
			</div>
			</form>
		</div>
	</div>


<?php include("../views/popup.php"); ?>

<div class="footer logo3"></div>
</div>

<?php include("../views/footer.php");
	renderFooter(); //aqui va a ir el nombre de usuario de la sesion php
?>
