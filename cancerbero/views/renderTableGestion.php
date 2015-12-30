<?php
/* Clase destinada a crear tablas dinámicas para las paginas de GestionUsuarios
 * Creada por MVTorres
 */
require_once("../php/DBManager.php");


class RenderTableGestion {

  public function renderTableGestion(){
    $this->man = DBManager::getInstance(); //crea instancia
    $this->man->connect(); //conectate a la bbdd
  }
//Privates para uso interno
  //Muestra la fila cabecera de la tabla
  private function echoInit($arrayNames){
    require_once("getIdioma.php");
    $Idioma = getIdioma();
    //echo '<div class="tabla">';
    echo   '<table class="table table-striped">';
      //Construyendo la linea
    echo '<thead>';
    echo '<tr>';
    foreach($arrayNames as $header){
      echo '<th>'.$Idioma[$header].'</th>';
    }
    echo '</tr>';
    echo '</thead>';
    echo '</tbody>';
  }

  //Finaliza la tabla
  private function echoFin(){
    echo '</tbody>';
    echo '</table>';
    //echo '</div>';
  }

  //Muestra una fila de la tabla
  private function echoline($tupla){
    echo "<tr>";
    foreach($tupla as $campo){
      echo "<td>".$campo."</td>";
    }
    echo "<td><input type='submit' value='X' class='borrar'></td>";
    echo "</tr>";
  }

//Forma y muestra las tablas que se muestan en las paginas de gestion
  public function tableRol(){
    $this->echoInit($arrayNames=array("Rol","Descripcion","Eliminar"));
    $result = $this->man->listGestionRols();
    foreach ($result as $tupla) {
      $GET_id=array_pop($tupla);
      foreach($tupla as $campo){
        echo "<td>".$campo."</td>";
      }
      //echo "<td><button class='btn btn-default' onclick='location.href=\"../php/GestionRoles/process_borrarRol.php?id=$GET_id&confirm=0\"'>X</button></td>";
      echo "<td><button class='btn btn-default btn-danger' onclick='doBorrar(\"rol\",".$GET_id.")'>X</button></td>";
      echo "</tr>";
    }
    $this->echoFin();
  }
  public function tableFuncionalidad(){
    $this->echoInit($arrayNames=array("Funcionalidad","Descripcion","Eliminar"));
    $result = $this->man->listGestionFuns();
    foreach ($result as $tupla) {
      $GET_id=array_pop($tupla);
      foreach($tupla as $campo){
        echo "<td>".$campo."</td>";
      }
      //echo "<td><button class='btn btn-default' onclick='location.href=\"../php/GestionFuncionalidades/process_borrarFuncionalidad.php?id=$GET_id&confirm=0\"'>X</button></td>";
      echo "<td><button class='btn btn-default btn-danger' onclick='doBorrar(\"funcionalidad\",".$GET_id.")'>X</button></td>";
      echo "</tr>";
    }
    $this->echoFin();
  }
  public function tableUsuario(){
    $this->echoInit($arrayNames=array("Usuario","ID","Email","Eliminar"));
    $result = $this->man->listGestionUsers();
    foreach ($result as $tupla) {
      $GET_id=$tupla["user_id"];//Pop aqui no funciona porque ID debe mostrarse
      foreach($tupla as $campo){
        echo "<td>".$campo."</td>";
      }
    //  echo "<td><button onclick='location.href=\"../php/GestionUsuarios/process_borrarUsuario.php?id=$GET_id&confirm=0\"'>X</button></td>";
      echo "<td><button class='btn btn-default btn-danger' onclick='doBorrar(\"usuario\",".$GET_id.")'>X</button></td>";
      echo "</tr>";
    }
    $this->echoFin();
  }
  public function tablePagina(){
    $this->echoInit($arrayNames=array("Pagina","Descripcion","Eliminar"));
    $result = $this->man->listGestionPags();
    foreach ($result as $tupla) {
      $GET_id=array_pop($tupla);
      foreach($tupla as $campo){
        echo "<td>".$campo."</td>";
      }
      //echo "<td><button class='btn btn-default' onclick='location.href=\"../php/GestionPaginas/process_borrarPagina.php?id=$GET_id&confirm=0\"'>X</button></td>";
      echo "<td><button class='btn btn-default btn-danger' onclick='doBorrar(\"pagina\",".$GET_id.")'>X</button></td>";
      echo "</tr>";
    }
    $this->echoFin();
  }

}

?>
