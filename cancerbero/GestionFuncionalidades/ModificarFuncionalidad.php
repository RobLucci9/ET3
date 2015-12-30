<?php include("../views/header.php");
	RenderBanner("Gestión de Funcionalidades");
	cerberus("CER_ModificarFuncionalidad");
	$Idioma = getIdioma();
?>

<div id="contenido" class="container">
	<div class="row">
<?php include("../views/lateral.php");
	RenderLateral(3);
?>

	<?php
		require_once("../php/DBManager.php");
		$man = DBManager::getInstance();
		$man->connect();
		if(!$redirect = $man->getMinIDFun()){
			header('Location: ../views/error.php?ID=e15');
		}
		else{
			if(!isset($_GET["id"])){ //cambiar por funcion que devuelva la primera id ocupada

				header('Location: ModificarFuncionalidad.php?id=' .$redirect["fun_id"].'');
			}
			else{

				echo '<div class="col-md-9 col-sm-12">';
				echo '<form action="../php/GestionFuncionalidades/process_modificarFuncionalidad.php?="'.$_GET["id"].' method="post" '.'id="formulario">';

				require_once("../views/renderTable.php");
				require_once("../views/renderCombobox.php");
				$table_maker = new RenderTable;
				$combo_maker = new renderCombobox;
				echo "<h1>";
				echo $Idioma['Modificar funcionalidad'];
				makeTooltip($Idioma['tmf'],$Idioma['dmf']);
				echo '</h1>';
				echo '<br/>'.$Idioma['Seleccione funcionalidad'].':';
				$combo_maker->comboboxBlankFuncionalidad(); //ComboBox de Selección

				$datos = $man->getDatosFuncion($_GET["id"]);
				echo '<br/>'.$Idioma['Nombre funcionalidad'].':<input class="form-control" type=text value="' .$datos["fun_name"].'"'. ' name="nombre" readonly><br>';
				echo $Idioma['Descripcion'].':<br/><textarea rows="5" cols="30" name="desc">' .$datos["fun_desc"].''. '</textarea><br>';


				$table_maker->tablePagByFun($datos["fun_name"]);

				$table_maker->tableRolByFun($datos["fun_name"]);

				$table_maker->tableUserByFun($datos["fun_name"]);
			echo '<hr/>';
				echo '<a class="btn btn-default btn-primary" onclick="location.href=\'GestionFuncionalidades.php\'">' .$Idioma['Atras'].' </a>';
				echo ' <input type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"  value="' .$Idioma['Guardar'].'" class="continuar"/>';

				echo '</form>';
				echo '</div>';
			}
		}
	?>
</div>

<?php include("../views/popup.php");?>
<div class="footer logo2"></div>
<?php include("../views/footer.php");
	renderFooter();
?>
