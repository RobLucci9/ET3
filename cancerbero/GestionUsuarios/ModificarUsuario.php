<?php include("../views/header.php");
	RenderBanner("Gestión de Usuarios");
	cerberus("CER_ModificarUsuario");
	$Idioma = getIdioma();
?>
<div id="contenido" class="container">
	<div class="row">

<?php include("../views/lateral.php");
	RenderLateral(0);
?>

	<?php
		require_once("../php/DBManager.php");
		$man = DBManager::getInstance();
		$man->connect();
		if(!$redirect = $man->getMinIDUser()){
			header('Location: ../views/error.php?ID=e18');
		}
		else{
			if(!isset($_GET["id"])){ //cambiar por funcion que devuelva la primera id ocupada

			header('Location: ModificarUsuario.php?id=' .$redirect["user_id"].'');
			}
			else{

				echo '<div class="col-md-9 col-sm-12">';
				echo '<form action="../php/GestionUsuarios/process_modificarUsuario.php?="'.$_GET["id"].' method="post" '.'id="formulario">';

				require_once("../views/renderTable.php");
				require_once("../views/renderCombobox.php");
				$table_maker = new RenderTable;
				$combo_maker = new renderCombobox;
				echo '<h1>' . $Idioma['Modificar usuario'];
				makeTooltip($Idioma['tmu'],$Idioma['dmu']);
				echo '</h1>';
				echo '<br/>'.$Idioma['Seleccione usuario'].':';
				$combo_maker->comboboxBlankUsuario(); //ComboBox de Selección

				$datos = $man->getDatosUsuario($_GET["id"]);
				echo '<br/>'.$Idioma['Nombre usuario'].':<input class="form-control" type=text value="' .$datos["user_name"].'"name="nombre" readonly><br>';
				echo $Idioma['Descripcion'].'<br/><textarea  rows="5" cols="30" name="desc">' .$datos["user_desc"].''. '</textarea><br>';
				echo $Idioma['Email'].':<input class="form-control" type=text value="'.$datos["user_email"].'"name="email"<br>';

				echo '<br/>'.$Idioma['Contraseña'].': <a class="btn btn-default" href=\'ModificarPass.php?id='.$_GET["id"].'\'">Cambiar</a>';

				$table_maker->tableRolByUser($datos["user_name"]);

				$table_maker->tablePagByUser($datos["user_name"]);

				$table_maker->tableFunByUser($datos["user_name"]);
				echo '<hr/>';
				echo '<a class="btn btn-default" onclick="location.href=\'GestionUsuarios.php\'">' . $Idioma['Atras'] .' </a>';
				echo ' <input type="button" class="btn btn-default btn-primary" data-toggle="modal" data-target="#myModal"  value="' . $Idioma['Guardar'] .'" class="continuar"/>';

				echo '</form>';
				echo '</div>';
			}
		}
	?>
</div>

<?php include("../views/popup.php");?>
<div class="footer logo3"></div>
<?php include("../views/footer.php");
	renderFooter();
?>
