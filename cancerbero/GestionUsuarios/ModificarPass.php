<?php include("../views/header.php");
	RenderBanner("Gestión de Usuarios");
	$can = new Cancerbero("CER_ModificarPass");
	$can->checkUserAndID($_GET['id'],$_SESSION['name']);
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


		echo '<div class="col-md-9 col-sm-12">';
		echo '<form action="../php/GestionUsuarios/process_modificarPass.php?id='.$_GET["id"].'" method="post" id="formulario">';

		echo '<br/>Introducir Contraseña:<input class="form-control" type=password name="pass1"><br>';
		echo '<br/>Repetir Contraseña:<input class="form-control" type=password name="pass2"><br>';
		echo '<hr/>';
		echo '<button class="btn btn-default" onclick="history.go(-1)">' .$Idioma['Atras'].' </button>';
		echo '<input type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal"  value="' .$Idioma['Guardar'].'" class="continuar"/>';

		echo '</form>';
		echo '</div>';

	?>
</div>

<?php include("../views/popup.php");?>
<div class="footer logo3"></div>
<?php include("../views/footer.php");
	renderFooter();
?>
