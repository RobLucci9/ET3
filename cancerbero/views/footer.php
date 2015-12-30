<?php
	//include("getIdioma.php");
	function renderFooter(){
		$Idioma = getIdioma();
		echo "<footer>";
		echo "<div class='text-muted' style='position: fixed; bottom: 0; right: 0';>";
		if(isset($_SESSION['name'])){
			echo "<span class='username'>".$_SESSION["name"]."</span>";
		}else{
			echo "<span class='username'>anon</span>";
			$_SESSION['name'] = 'anon';
		}
		echo "<a href='../php/GestionUsuarios/process_salir.php'><span  class='text-right'> ".$Idioma['salir']."</span></a>";
		echo "</div></footer>";
	}
?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/sha1.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/gstr.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
