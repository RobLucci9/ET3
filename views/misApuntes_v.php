<<<<<<< HEAD
<!-- Vista para mis Apuntes por Raul Villar -->

<div class="col-md-4 col-sm-12">
  <div class="banner"><h1>MIS APUNTES</h1></div>
  <div>
    Filtrar
    <br>
    <form action="misApuntes.php" method="post">
	<!--<select class="form-control" name="titulacion">
    <option value="nil" selected> Seleccione una titulacion </option>
	  <?php foreach($titulos as $titulo): ?>
	    <option value="<?php echo $titulo->getTit_id(); ?>"><?php echo $titulo->getTit_name(); ?></option>
	  <?php endforeach; ?>
	</select><br/>-->
	<select class="form-control" name="materia">
    <option value="nil" selected> Seleccione una materia </option>
	  <?php foreach($materias as $materia): ?>
	    <option value="<?php echo $materia->getMat_id(); ?>"><?php echo $materia->getMat_name(); ?></option>
	  <?php endforeach; ?>
	</select><br/>

	  <?php echo $anho; ?>


  </div>
  <div>
  <button class="btn btn-info btn-block" type="submit"> Filtrar </button>
  </form>
  <a class="btn btn-success btn-block" href='../controllers/subirApunte.php'> Subir un apunte </a>
  </div>
</div>
  <div class="col-sm-2"></div>
  <div class="col-sm-6">
    <form action="delApunte.php" method="post">
      <p class="lead banner">Subidos por mi </p>
      <hr/>
    <?php foreach($apuntes as $apunte): ?>
      <div class="row box">
        <span class="izquierda">
	      <span class="apunte"><?php echo $apunte->getApunte_name(); ?></span>
        <div class="info autor"><?php echo $apunte->nombreMateria(); ?>(<?php echo $apunte->nombreTitulacion(); ?>), <?php echo $apunte->getAnho_academico(); ?></div>
        </span>
        <span class="derecha">
          <a class="btn btn-success" href="../apuntes/<?php echo $apunte->getRuta(); ?>">Abrir</a>
          <button type="submit" class="btn btn-danger" type="submit" name="<?php echo $apunte->getApunte_id(); ?>">Borrar</button>
        </span>
     </div>
    <?php endforeach; ?>
    </form>
    <form action="deltieneapunte.php" method="post">
      <p class="lead banner">Apuntes guradados de la comunidad </p>
      <hr/>
    <?php foreach($tieneapuntes as $apunte): ?>
      <div class="row box">
        <span class="izquierda">
        <span class="apunte"><?php echo $apunte->getApunte_name(); ?></span>
        <div class="info autor"><?php echo $apunte->nombreMateria(); ?>(<?php echo $apunte->nombreTitulacion(); ?>), <?php echo $apunte->getAnho_academico(); ?></div>
        <div class="autor"> Autor: <?php echo $apunte->nombreAutor(); ?> </div>
        </span>
        <span class="derecha">
          <a class="btn btn-success" href="../apuntes/<?php echo $apunte->getRuta(); ?>">Abrir</a>
          <button type="submit" class="btn btn-danger" type="submit" name="<?php echo $apunte->getApunte_id(); ?>">Borrar</button>
        </span>
     </div>
    <?php endforeach; ?>
    </form>
  </div>
=======
<!-- Vista para mis Apuntes por Raul Villar -->

<div class="col-md-4 col-sm-12">
  <div class="banner"><h1>MIS APUNTES</h1></div>
  <div>
    Filtrar
    <br>
    <form action="misApuntes.php" method="post">
	<!--<select class="form-control" name="titulacion">
    <option value="nil" selected> Seleccione una titulacion </option>
	  <?php foreach($titulos as $titulo): ?>
	    <option value="<?php echo $titulo->getTit_id(); ?>"><?php echo $titulo->getTit_name(); ?></option>
	  <?php endforeach; ?>
	</select><br/>-->
	<select class="form-control" name="materia">
    <option value="nil" selected> Seleccione una materia </option>
	  <?php foreach($materias as $materia): ?>
	    <option value="<?php echo $materia->getMat_id(); ?>"><?php echo $materia->getMat_name(); ?></option>
	  <?php endforeach; ?>
	</select><br/>

	  <?php echo $anho; ?>


  </div>
  <div>
  <button class="btn btn-info btn-block" type="submit"> Filtrar </button>
  </form>
  <a class="btn btn-success btn-block" href='../controllers/subirApunte.php'> Subir un apunte </a>
  </div>
</div>
  <div class="col-sm-2"></div>
  <div class="col-sm-6">
    <form action="delApunte.php" method="post">
      <p class="lead banner">Subidos por mi </p>
      <hr/>
    <?php foreach($apuntes as $apunte): ?>
      <div class="row box">
        <span class="izquierda">
	      <span class="apunte"><?php echo $apunte->getApunte_name(); ?></span>
        <div class="info autor"><?php echo $apunte->nombreMateria(); ?>(<?php echo $apunte->nombreTitulacion(); ?>), <?php echo $apunte->getAnho_academico(); ?></div>
        </span>
        <span class="derecha">
          <a class="btn btn-success" href="../apuntes/<?php echo $apunte->getRuta(); ?>">Abrir</a>
          <button type="submit" class="btn btn-danger" type="submit" name="<?php echo $apunte->getApunte_id(); ?>">Borrar</button>
        </span>
     </div>
    <?php endforeach; ?>
    </form>
    <form action="deltieneapunte.php" method="post">
      <p class="lead banner">Apuntes guradados de la comunidad </p>
      <hr/>
    <?php foreach($tieneapuntes as $apunte): ?>
      <div class="row box">
        <span class="izquierda">
        <span class="apunte"><?php echo $apunte->getApunte_name(); ?></span>
        <div class="info autor"><?php echo $apunte->nombreMateria(); ?>(<?php echo $apunte->nombreTitulacion(); ?>), <?php echo $apunte->getAnho_academico(); ?></div>
        <div class="autor"> Autor: <?php echo $apunte->nombreAutor(); ?> </div>
        </span>
        <span class="derecha">
          <a class="btn btn-success" href="../apuntes/<?php echo $apunte->getRuta(); ?>">Abrir</a>
          <button type="submit" class="btn btn-danger" type="submit" name="<?php echo $apunte->getApunte_id(); ?>">Borrar</button>
        </span>
     </div>
    <?php endforeach; ?>
    </form>
  </div>
>>>>>>> upstream/master
