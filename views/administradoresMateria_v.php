<!-- Vista para Administradores de Materia por Martín Vázquez -->

<!-- Inserción de modal -->
<?php echo $status ?>
<!-- Contenedor de tablas de adición -->

<div class="col-md-12 col-sm-12">
  <!-- Tabla de Usuarios -->
  <div>Seleccione un usuario y la materia que éste debe administrar
    o haga click <span class="btn-link" onclick='window.scroll(0,findPos(document.getElementById("eliminacion")));'>aquí</span>
    para ver o eliminar los permisos de administración actuales
    </div>
  <br>
  <div class="col-md-5 col-sm-12">
  <input class="form-control buscatit" placeholder="Filtrar" type="text" name="name"><br/>
  <form action="administradoresMateria.php" method="post">
  <?php foreach($usuarios as $key): ?>
    <div class="row box itemtit">
      <span class="izquierda"><?php echo $key->getUser_name(); ?></span>
      <span class="derecha"><input type="radio" name="usuario"  value="<?php echo $key->getUser_id(); ?>"><span>
    </div>
  <?php endforeach; ?>
  </div>

  <!-- Tabla de Materias -->
  <div class="col-md-5 col-sm-12">
  <input class="form-control buscatit2" placeholder="Filtrar" type="text" name="name"><br/>
  <?php foreach($materias as $key): ?>
      <div class="row box itemtit2">
        <span class="izquierda"><?php echo $key->getMat_name(); ?></span>
        <span><?php echo $titulos[0]->findBy("tit_id",$key->getTit_id())[0]->getTit_Name(); ?></span>
        <span class="derecha"><input type="radio" name="materia"  value="<?php echo $key->getMat_id(); ?>">
      </div>
  <?php endforeach; ?>
  </table>
  </div>
  <div class="col-md-2 col-sm-12">
  <button type="submit" class="btn btn-success">Añadir Administrador</button>
  </div>
  </form>
</div>


<!-- Contenedor de tablas de eliminación -->
<div id="eliminacion" class="col-md-12 col-sm-12">
<br><br><br>
<div>En la siguiente lista se encuentran los administradores de materia junto a las materias de las que se ocupan.
  Puede eliminar estos permisos mediante el botón pertinente
</div>
  <br>
  <table><th>Usuario</th><th>Administra</th><th>Titulación</th><th>Quitar permiso</th>
  <form action="administradoresMateria.php" method="post">
  <?php foreach($administradores as $key): ?>
      <tr>
        <td class="row box"><span class="elem"><?php echo $usuarios[0]->findBy("user_id",$key->getUser_id())[0]->getUser_Name(); ?></span></td>
        <td class="row box"><span class="elem"><?php echo $materias[0]->findBy("mat_id",$key->getMat_id())[0]->getMat_Name(); ?></span></td>
        <td class="row box"><span class="elem"><?php echo $titulos[0]->findBy("tit_id",$materias[0]->findBy("mat_id",$key->getMat_id())[0]->getTit_id())[0]->getTit_Name(); ?></span></td>
        <td class="row box"><button type="submit" class="btn btn-danger" name="parser" value="<?php echo $key->getUser_id().' '.$key->getMat_id(); ?>">Eliminar</button></td>
      </tr>
  <?php endforeach; ?>
</table>
