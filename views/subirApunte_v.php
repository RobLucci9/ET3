<<<<<<< HEAD
<!-- plantilla de subir apunte hecha por FVieira  -->
<div class="col-md-4 col-md-offset-4 col-sm-12">
<p class="lead">Solo soportamos apuntes en .pdf</p>
<p> a continuación cubra los siguientes campos para compartir su apunte </p>
<p> por favor, lea las <a href="reglas.html">Reglas</a>
  <hr/>
  <form action="../controllers/subirApunte.php" enctype="multipart/form-data" method="post">
    <div class="form-group">
      <input name="apunteUploaded" type="file" /><br/>
      <input class="form-control" type="text" name="name" placeholder="Nombre"/><br/>
      <?php echo $comboboxMateria; ?>
      <?php echo $comboboxAnho; ?>
      <input class="form-control btn btn-success" type="submit" value="Submit">
    </div>
  </form>
</div>
<?php echo $modal; ?>
=======
<!-- plantilla de subir apunte hecha por FVieira  -->
<div class="col-md-4 col-md-offset-4 col-sm-12">
<p class="lead">Solo soportamos apuntes en .pdf</p>
<p> a continuación cubra los siguientes campos para compartir su apunte </p>
<p> por favor, lea las <a href="reglas.html">Reglas</a>
  <hr/>
  <form action="../controllers/subirApunte.php" enctype="multipart/form-data" method="post">
    <div class="form-group">
      <input name="apunteUploaded" type="file" /><br/>
      <input class="form-control" type="text" name="name" placeholder="Nombre"/><br/>
      <?php echo $comboboxMateria; ?>
      <?php echo $comboboxAnho; ?>
      <input class="form-control btn btn-success" type="submit" value="Submit">
    </div>
  </form>
</div>
<?php echo $modal; ?>
>>>>>>> upstream/master
