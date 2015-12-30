<?php
/* Clase destinada a crear tablas dinamicamente dados arrays de mysql
 * Creada por FVieira para el proyecto de interfaces de usuario
 */
 require_once("../php/DBManager.php");
 require_once("getIdioma.php");
 $Idioma = getIdioma();

 class RenderTable {
   public function renderTable(){
     $this->man = DBManager::getInstance();
     $this->man->connect();
   }

 //Privates para uso interno

   //Muestra la fila cabecera de la tabla
   private function echoInit($nameTable){
     global $Idioma;
     echo  '<table class="table table-striped">';
     echo  '<thead><tr><th>'.$Idioma[$nameTable] .'</th><th class="text-right">'.$Idioma['permitir'].'</th></tr></thead>';
     echo  '<tbody>';
   }

   //Finaliza la tabla
   private function echoFin(){
     echo '</tbody>';
     echo '</table>';
   }

   //Muestra una fila de la tabla con el checkbox desmarcado
   private function echoline($name){
     echo "<tr><td>".$name."</td><td class='text-right' ><input type='checkbox' name='".$name."'/></td></tr>";
   }

   //Muestra una fila de la tabla con el checkbox marcado
   private function echoMarkedLine($name){
     echo "<tr><td>".$name."</td><td class='text-right' ><input type='checkbox' checked name='".$name."'/></td></tr>";
   }

   /*
   $all: Array asociativo con los arrays de todos los elementos de una entidad. Cada elemento de $all es un array con un campo (Ej: todos los arrays de usuarios. Cada array de usuario tiene un campo 'nombre')
   $relation: Array asociativo con una lista de nombres de una entidad (Ej: nombres de los usuarios relacionados con la funcionalidad "X")

   Esta funcion crea una tabla que muestra todos los nombres contenidos en all junto con un checkbox que esta marcado si el nombre mostrado en esa fila tambien esta en $relation
   */
   private function complexTable($all,$relation){
     foreach ($all as $allItem) {						//Se recorre $all
       $marked = false;
       if(is_array($relation)){
         foreach ($relation as $itemRelation) {				//Para cada elemento de $all se recorren todos los elementos de $relation
           if(reset($itemRelation)==reset($allItem)){   	//Se compara el primer elemento del array $itemRelation con el primero de $allItem
             $marked = true;								//Si coinciden se marcara el checkbox
           }
         }
       }
       if($marked){											//Se muestra la linea con el checkbox marcado o no, segun indique $marked
         $this->echoMarkedLine(reset($allItem));
       }else{
         $this->echoline(reset($allItem));
       }
     }
   }

   //Muestra una tabla con todos los usuarios y sus checkboxes desmarcados
   public function tableBlankUsuario(){
     $this->echoInit("Usuario");
     $result = $this->man->listUsers();
     foreach ($result as $item) {
       $this->echoline($item['user_name']);
     }
     $this->echoFin();
   }

   //Muestra una tabla con todos los roles y sus checkboxes desmarcados
   public function tableBlankRol(){
     $this->echoInit("Rol");
     $result = $this->man->listRols();
     foreach ($result as $item) {
       $this->echoline($item['rol_name']);
     }
     $this->echoFin();
   }

   //Muestra una tabla con todas las paginas y sus checkboxes desmarcados
   public function tableBlankPagina(){
     $this->echoInit("Pagina");
     $result = $this->man->listPags();
     foreach ($result as $item) {
       $this->echoline($item['pag_name']);
     }
     $this->echoFin();
   }

   //Muestra una tabla con todas las funcionalidades y sus checkboxes desmarcados
   public function tableBlankFuncionalidad(){
     $this->echoInit("Funcionalidad");
     $result = $this->man->listFuns();
     foreach ($result as $item) {
       $this->echoline($item['fun_name']);
     }
     $this->echoFin();
   }

 /*
	Estas funciones forman las tablas que se deben mostrar en las vistas de modificacion

	Dichas tablan muestran:
		-Una lista de todas las entidades X (rol, usuario, funcionalidad o pagina)
		-Cada elemento de la lista tiene un checkbox que estara marcado si el elemento de la entidad Y que se esta modificando
		esta relacionado con el elemento de la entidad X mostrado en esa lista de la tabla

	El nombre de la funcion se escribe tal que tableXByY($identificadorElementoModificado)
	Recomiendo que este nombre se cambie por tableXDeY($identificadorElementoModificado)

	Ejemplo:

		Se esta modificando el usuario de nombre "Pepe"
		Se va a mostra la tabla que lista las funcionalidades.
		Las funcionalidades relacionadas con "Pepe" tendran el checkbox marcado

		Entidad modificada (Y): Usuario
		Elemento modificado: "Pepe"
		Entidad a mostrar en la lista (X): Funcionalidad

		La funcion que va a mostrar esta tabla es tableFunByUser($user)
 */

//Tablas mostradas al modificar un rol
  //Muestra la tabla de usuarios
  public function tableUserByRol($rol){
    $relations = $this->man->listUsersByRol($rol);
    $all = $this->man->listUsers();
    $this->echoInit("Usuario");
    $this->complexTable($all,$relations);
    $this->echoFin();
  }

  //Muestra la tabla de funcionalidades
  public function tableFunByRol($rol){
   $relations = $this->man->listFunsByRol($rol);
   $all = $this->man->listFuns();
   $this->echoInit("Funcionalidad");
   $this->complexTable($all,$relations);
   $this->echoFin();
  }
//HASTA AQUI

//Tablas mostradas al modificar un usuario
  //Muestra la tabla de roles
  public function tableRolByUser($user){
    $relations = $this->man->listRolesByUser($user);
    $all = $this->man->listRols();
    $this->echoInit("Rol");
    $this->complexTable($all,$relations);
    $this->echoFin();
  }

  //Muestra la tabla de funcionalidades
  public function tableFunByUser($user){
   $relations = $this->man->listFunsByUser($user);
   $all = $this->man->listFuns();
   $this->echoInit("Funcionalidad");
   $this->complexTable($all,$relations);
   $this->echoFin();
  }
  //Muestra la tabla de paginas
  public function tablePagByUser($user){
    $relations = $this->man->listPagsByUsers($user);
    $all = $this->man->listPags();
    $this->echoInit("Pagina");
    $this->complexTable($all,$relations);
    $this->echoFin();
  }
//HASTA AQUI

//Tablas mostradas al modificar una funcionalidad
  //Muestra la tabla de roles
  public function tableRolByFun($fun){
    $relations = $this->man->listRolesByFun($fun);
    $all = $this->man->listRols();
    $this->echoInit("Rol");
    $this->complexTable($all,$relations);
    $this->echoFin();
  }

  //Muestra la tabla de usuarios
  public function tableUserByFun($fun){
    $relations = $this->man->listUsersByFun($fun);
    $all = $this->man->listUsers();
    $this->echoInit("Usuario");
    $this->complexTable($all,$relations);
    $this->echoFin();
  }

  //Muestra la tabla de paginas
  public function tablePagByFun($fun){
    $relations = $this->man->listPagsByFun($fun);
    $all = $this->man->listPags();
    $this->echoInit("Pagina");
    $this->complexTable($all,$relations);
    $this->echoFin();
  }
//HASTA AQUI

//Tablas mostradas al modificar una pagina
  //Muestra la tabla de usuarios
  public function tableUserByPag($pag){
    $relations = $this->man->listUsersByPag($pag);
    $all = $this->man->listUsers();
    $this->echoInit("Usuario");
    $this->complexTable($all,$relations);
    $this->echoFin();
  }

  //Muestra la tabla de funcionalidades
  public function tableFunByPag($pag){
   $relations = $this->man->listFunsByPag($pag);
   $all = $this->man->listFuns();
   $this->echoInit("Funcionalidad");
   $this->complexTable($all,$relations);
   $this->echoFin();
  }
  //HASTA AQUI
}
