<select class="form-control" name="materia">
  <?php foreach($titulaciones as $titulacion): ?>
    <option value="<?php echo $titulacion->getTit_id(); ?>"><?php echo $titulacion->getTit_name(); ?></option>
  <?php endforeach; ?>
</select><br/>
