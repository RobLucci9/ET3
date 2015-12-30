<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cancerbero</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/gstr.css" rel="stylesheet">
  </head>
  <body>
  <div id='loginbox' class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 box  ">
				<div class='lead'>Instalar BD para la ET1</div> 	<!--Muestra el titulo del formulario-->
						<form action="./php/instalaBD.php" id="loginform" method="post">
							<div class="form-group">
							Contraseña de ROOT de mysql: <input class="form-control" type="password" name="pass"><br>
              Atención, la contraseña va por post sin encriptar. la idea seria ejecutar este script desde el servidor para que la constraseña no tenga que viajar en texto plano
							<button class="centered btn btn-default" onclick="$('#loginform').submit()"> Instalar </button>
						</div>
						</form>
				</div>
			</div>
		</div>
	<script src="../js/jquery.js"></script>
</body>
</html>
