<?php include("../views/header.php");




		RenderBanner("Correcto");
		$len = getIdioma();
		$checked = $_GET['ID'];
		$cerb = new Cancerbero("CER_correcto");
		if($cerb->canAccessPage($_SESSION["name"],"CER_Menu")){
			$redirect = "../Menu/MenuPrincipal.php";
		}else{
			$redirect = "../".$routeToMenu;
		}
?>
  <div id='loginbox' class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 box">
				<div class='lead correcto'><?php echo $len['c0']."  "; ?></div>
				<p class="text-center"><?php echo $len[$checked]; ?></p><br/>
				<p class="text-center"><a class="btn btn-default" href="<?php echo $redirect ?>"><?php echo $len['Menu Principal']; ?></a></p><br>
			</div>
		</div>
	</div>
</body>
</html>
