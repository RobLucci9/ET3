<<<<<<< HEAD
<!-- Vista de consultaTitulaciones por Raul Villar Ramos -->
<div class="col-md-4 col-sm-12">
  <div class="banner">
	   <h1>MODO ADMINISTRADOR</h1>
  </div>

<div>
  <form action="../controllers/addNuevaTitulacion.php"  method="post">
    <div class="form-group">
      <input class="form-control" type="text" name="materianueva" placeholder="Nombre de la nueva titulacion"/><br/>
      <input class="form-control btn btn-success" type="submit" value="Añadir nueva Titulacion">
    </div>
  </form>
</div>
</div>

<div class="col-sm-2"></div>
<div class="col-sm-6">
<form action="deleteTitulacion.php" method="post">
  <p class="lead banner">Titulaciones</p>
  <hr/>
  <input class="form-control buscatit" placeholder="Filtrar" type="text" name="name"><br/>
<?php foreach($titulaciones as $titulo): ?>
  <div class="row box itemtit">
    <span class="izquierda">
    <span class="lead"><?php echo $titulo->getTit_name(); ?></span>
    </span>
    <span class="derecha">
      <button type="submit" class="btn btn-danger" type="submit" name="<?php echo $titulo->getTit_id(); ?>">Borrar</button>
    </span>
 </div>
<?php endforeach; ?>
</form>

</div>
=======
<!-- Vista de consultaTitulaciones por Raul Villar Ramos -->
<div class="col-md-4 col-sm-12">
  <div class="banner">
	   <h1>MODO ADMINISTRADOR</h1>
  </div>

<div>
  <form action="../controllers/addNuevaTitulacion.php"  method="post">
    <div class="form-group">
      <input class="form-control" type="text" name="materianueva" placeholder="Nombre de la nueva titulacion"/><br/>
      <input class="form-control btn btn-success" type="submit" value="Añadir nueva Titulacion">
    </div>
  </form>
</div>
</div>

<div class="col-sm-2"></div>
<div class="col-sm-6">
<form action="deleteTitulacion.php" method="post">
  <p class="lead banner">Titulaciones</p>
  <hr/>
  <input class="form-control buscatit" placeholder="Filtrar" type="text" name="name"><br/>
<?php foreach($titulaciones as $titulo): ?>
  <div class="row box itemtit">
    <span class="izquierda">
    <span class="lead"><?php echo $titulo->getTit_name(); ?></span>
    </span>
    <span class="derecha">
      <button type="submit" class="btn btn-danger" type="submit" name="<?php echo $titulo->getTit_id(); ?>">Borrar</button>
    </span>
 </div>
<?php endforeach; ?>
</form>

</div>
>>>>>>> upstream/master
