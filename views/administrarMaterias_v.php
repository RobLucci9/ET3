<!-- Vista para plantilla por Martín Vázquez -->
<br/><br/><br/>
<div class="col-md-5 col-sm-12">
  <p class="lead"> Filtrar po titulación </p>
  <p> En este combobox se pueden hacer cosas añaññañañañañañañañañañañañañañañañañañañaññañañañañaññañ</p>
    <hr/>
    <input class="form-control buscatit" placeholder="Filtrar por Materia" type="text" name="name"><br/>
    <form action="administrarMaterias.php" method="post">
	<select class="form-control" name="titulacion">
    <option value="nil" selected> Seleccione una titulacion </option>
	  <?php foreach($titulos as $titulo): ?>
	    <option value="<?php echo $titulo->getTit_id(); ?>"><?php echo $titulo->getTit_name(); ?></option>
	  <?php endforeach; ?>
	</select><br/>
  <button class="btn btn-info btn-block" type="submit"> Filtrar </button>
  </form>
</div>
<div class="col-md-7 col-sm-12">
  <p class="lead"> Todas las materias </p>
  <p> Aqui se muestran todas las materias disponibles. Si no encuentra su materia contacte con un administrador</p>
  <hr/>
<form action="../controllers/delmat.php" class="header box-main" method="post">
      <?php  foreach ($allMaterias as $key): ?>
        <div class="row box itemtit">
              <span class="izquierda"> <?php echo $key->getMat_name(); ?></span>
              <span> <?php echo $titulos[0]->findBy("tit_id",$key->getTit_id())[0]->getTit_Name();?></span>
              <span class="derecha" ><button type="submit" class="btn btn-success" name="<?php echo $key->getMat_id(); ?>">Eliminar
            </button></span>
      </div>
  <?php endforeach; ?>
  </form>
</div>
