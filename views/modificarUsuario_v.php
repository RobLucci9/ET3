<!-- plantilla de login hecha por FVieira  -->
<div class="col-md-4 col-md-offset-4 col-sm-12  box">
  <div class="banner"><h1>Modificar Usuario</h1></div>
  <form action="../controllers/modificarUsuario.php" method="post">
    <div class="form-group">
      <?php
          require_once '../cancerbero/php/DBManager.php'; //Se carga la API de la BD de cancerbero
          $db = DBManager::getInstance();
          $db->connect();
          if($db->existUserRol($_SESSION["name"],"AdminApuntorium")){
            echo '<input class="form-control" type="text" name="name" placeholder="Nombre"/>
            <input class="form-control" type="text" name="email" placeholder="email" /> ';
          }
       ?>
      <input class="form-control" type="password" name="pass" placeholder="contraseña" />
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
