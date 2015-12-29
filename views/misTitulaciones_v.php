<!-- Vista para plantilla por Martín Vázquez -->
<br/><br/><br/>
<div class="col-md-6 col-sm-12">
  <p class="lead"> Titulaciones en la que esta matriculado </p>
  <p> Aqui se muestra las titulaciones en la que esta actualmente matriculado.
    Puede añadir mas usando la tabla de la derecha o eliminar alguna titulacion usando esta tabla</p>
    <hr/>
    <input class="form-control buscatit" placeholder="Filtrar" type="text" name="name"><br/>
<form action="../controllers/deltit.php" class="header box-main" method="post">
  <?php foreach ($misTitulaciones as $key): ?>
    <div class="row box itemtit">
      <span class="izquierda"> <?php echo $key->getTit_name(); ?></span>
      <span class="derecha"><button type="submit" class="btn btn-danger" type="submit" name="<?php echo $key->getTit_id(); ?>">Eliminar</button></span>

    </div>
  <?php endforeach; ?>
</form>
</div>
<div class="col-md-6 col-sm-12">
  <p class="lead"> Todas las titulaciones </p>
  <p> Aqui se muestran todas las titulaciones disponibles. Si no encuentra su titulacion contacte con un administrador</p>
  <hr/>
  <input class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
<form action="../controllers/addtit.php" class="header box-main" method="post">
  <?php foreach ($allTitulaciones as $key): ?>
    <div class="row box itemtit2">
      <span class="izquierda"> <?php echo $key->getTit_name(); ?></span>
      <span class="derecha"><button type="submit" class="btn btn-success" type="submit" name="<?php echo $key->getTit_id(); ?>">Añadir</button></span>
    </div>

  <?php endforeach; ?>
</form>
</div>
