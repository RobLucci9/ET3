<div class="modal fade" id="modalTit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?php echo $titulo; ?></h4>
      </div>
      <div class="modal-body">
        <select class="form-control" name="materia">
          <option value="nil" selected> Seleccione una titulacion </option>
          <?php foreach($titulaciones as $titulacion): ?>
            <option value="<?php echo $titulacion->getTit_id(); ?>"><?php echo $materia->getTit_name(); ?></option>
          <?php endforeach; ?>
        </select><br/>
        <button class="btn btn-info btn-block" type="submit"> Seleccionar </button>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#modalTit').modal('show')
</script>
