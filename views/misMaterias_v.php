<<<<<<< HEAD
<!-- Vista para mis Materias por Daniel de Alonso-->
<div class="col-md-6 col-sm-12">
  <p class="lead"> Materias en la que esta matriculado </p>
  <p> Aqui se muestran las Materias en las que esta actualmente matriculado.
    Puede añadir mas usando haciendo click en el boton o eliminar alguna Materia usando esta tabla</p>
    <hr/>
<form action="../controllers/delmat.php" class="header box-main" method="post">
  <?php foreach ($misMaterias as $key): ?>
    <div class="row box itemtit">
      <span class="izquierda"> <?php echo $key->getMat_name(); ?> (<?php echo $key->nombreTitulacion(); ?>)</span>
      <span class="derecha"><button type="submit" class="btn btn-danger" type="submit" name="<?php echo $key->getMat_id(); ?>">Eliminar</button></span>
    </div>
  <?php endforeach; ?>
</form>
</div>
<div class="col-md-6 col-sm-12">
  <p class="lead"> Todas las Materias por titulacion </p>
  <p> Aqui se muestran todas las materias de las titulaciones a las que se ha subscrito. Si no se lista ninguna materia usted tiene que subscribirse a una titulacion en "mis titulaciones"</p>
  <hr/>
  <input class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
<form action="../controllers/addmateria.php" class="header box-main" method="post">
  <?php foreach ($misTitulaciones as $titulacion): ?>
    <p class="lead"><?php echo $titulacion->getTit_name(); ?></p>
    <hr/>
    <?php foreach ($titulacion->materias() as $materia): ?>
    <div class="row box itemtit2">
      <span class="izquierda"> <?php echo $materia->getMat_name(); ?></span>
      <span class="derecha"><button type="submit" class="btn btn-success" type="submit" name="<?php echo $materia->getTit_id(); ?>">Añadir</button></span>
    </div>
    <?php endforeach; ?>
  <?php endforeach; ?>
</form>
</div>
=======
<!-- Vista para mis Materias por Daniel de Alonso-->
<div class="col-md-6 col-sm-12">
  <p class="lead"> Materias en la que esta matriculado </p>
  <p> Aqui se muestran las Materias en las que esta actualmente matriculado.
    Puede añadir mas usando haciendo click en el boton o eliminar alguna Materia usando esta tabla</p>
    <hr/>
<form action="../controllers/delmat.php" class="header box-main" method="post">
  <?php foreach ($misMaterias as $key): ?>
    <div class="row box itemtit">
      <span class="izquierda"> <?php echo $key->getMat_name(); ?> (<?php echo $key->nombreTitulacion(); ?>)</span>
      <span class="derecha"><button type="submit" class="btn btn-danger" type="submit" name="<?php echo $key->getMat_id(); ?>">Eliminar</button></span>
    </div>
  <?php endforeach; ?>
</form>
</div>
<div class="col-md-6 col-sm-12">
  <p class="lead"> Todas las Materias por titulacion </p>
  <p> Aqui se muestran todas las materias de las titulaciones a las que se ha subscrito. Si no se lista ninguna materia usted tiene que subscribirse a una titulacion en "mis titulaciones"</p>
  <hr/>
  <input class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
<form action="../controllers/addmateria.php" class="header box-main" method="post">
  <?php foreach ($misTitulaciones as $titulacion): ?>
    <p class="lead"><?php echo $titulacion->getTit_name(); ?></p>
    <hr/>
    <?php foreach ($titulacion->materias() as $materia): ?>
    <div class="row box itemtit2">
      <span class="izquierda"> <?php echo $materia->getMat_name(); ?></span>
      <span class="derecha"><button type="submit" class="btn btn-success" type="submit" name="<?php echo $materia->getTit_id(); ?>">Añadir</button></span>
    </div>
    <?php endforeach; ?>
  <?php endforeach; ?>
</form>
</div>
>>>>>>> upstream/master
