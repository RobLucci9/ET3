<?php include("../views/header.php");
	RenderBanner("Gestión de Páginas");
	cerberus("CER_ModificarPagina");
	$Idioma = getIdioma();
?>
<div id="contenido" class="container">
	<div class="row">

<?php include("../views/lateral.php");
	RenderLateral(2);
?>

	<?php
		require_once("../php/DBManager.php");
		$man = DBManager::getInstance();
		$man->connect();
		if(!$redirect = $man->getMinIDPag()){
			header('Location: ../views/error.php?ID=e16');
		}
		else{
			if(!isset($_GET["id"])){ //cambiar por funcion que devuelva la primera id ocupada
				header('Location: ModificarPagina.php?id=' .$redirect["pag_id"].'');
			}
			else{
				echo '<div class="col-md-9 col-sm-12">';
				echo '<form action="../php/GestionPaginas/process_modificarPagina.php?="'.$_GET["id"].' method="post" '.'id="formulario">';

				require_once("../views/renderTable.php");
				require_once("../views/renderCombobox.php");
				$table_maker = new RenderTable;
				$combo_maker = new renderCombobox;
				echo "<h1>";
				echo $Idioma['Modificar pagina'];
				makeTooltip($Idioma['tmp'],$Idioma['dmp']);
				echo '</h1>';
				echo '<br/>'.$Idioma['Seleccione pagina'].':';
				$combo_maker->comboboxBlankPagina(); //ComboBox de Selección

				$datos = $man->getDatosPagina($_GET["id"]);
				echo '<br/>'.$Idioma['Nombre pagina'].':<input class="form-control" type=text value="' .$datos["pag_name"].'"'. ' name="nombre" readonly><br>';
				echo $Idioma['Descripcion'].':<br/><textarea rows="5" cols="30" name="desc">' .$datos["pag_desc"].''. '</textarea><br>';


				$table_maker->tableFunByPag($datos["pag_name"]);

				$table_maker->tableUserByPag($datos["pag_name"]);
				echo '<hr/>';
				echo '<a class="btn btn-default" onclick="location.href=\'GestionPaginas.php\'">' .$Idioma['Atras'].' </a>';
				echo ' <input type="button" class="btn btn-default btn-primary" data-toggle="modal" data-target="#myModal"  value="' .$Idioma['Guardar'].'" class="continuar"/>';

				echo '</form>';
				echo '</div>';
			}
		}
	?>
</div>

<?php include("../views/popup.php");?>
<div class="footer logo4"></div>
<?php include("../views/footer.php");
	renderFooter();
?>
