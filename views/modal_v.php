<<<<<<< HEAD
<div class="modal fade" id="modalCorrecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?php echo $titulo; ?></h4>
      </div>
      <div class="modal-body">
        <?php echo $contenido ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <?php if(!$error){
          echo '<a href="home.php" class="btn btn-default">Volver al menu principal</a>';
          }
        ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#modalCorrecto').modal('show')
</script>
=======
<div class="modal fade" id="modalCorrecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?php echo $titulo; ?></h4>
      </div>
      <div class="modal-body">
        <?php echo $contenido ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <?php if(!$error){
          echo '<a href="home.php" class="btn btn-default">Volver al menu principal</a>';
          }
        ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$('#modalCorrecto').modal('show')
</script>
>>>>>>> upstream/master
