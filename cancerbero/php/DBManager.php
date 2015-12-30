<?php
/*
 *  Clase singleton destinada a manejar cualquier interaccion con la base de datos
 *  Creada por Felipe Vieira para el proyecto de interfaces de usuario
 */
class DBManager {
  private static $man = null;

  protected function DBManager(){} // protegido el contructor para que no se puedan construir instancias desde fuera de la clase

  //Constructor singleton
  public static function getInstance(){
    if(isset(DBManager::$man)){
      return DBManager::$man;
    }else{
      DBManager::$man = new DBManager;
      return DBManager::$man;
    }
  }

  //Conecta con la base de datos
  public function connect(){
    if(isset($this->db)){
      return true;
    }else{
      $this->db = new mysqli('localhost','AdminGSTR','AdminPass','GSTRDB');
      if ($this->db->connect_errno) {
          echo "error connecting to BBDD";
          die("Failed to connect to MySQL: " . $this->db->connect_error);
          return false;
      }
      return true;
    }
  }

  //Convierte el resultado de una query a un array
  private function returnArray($result){
    $arrayToReturn = array();
    while($r = $result->fetch_assoc()){
      array_push($arrayToReturn,$r);
    }
    return $arrayToReturn;
  }

  //Comprueba los datos introducidos en el login
  public function tryLogin($user,$pass){
    $toQuery = "select * from Usuario where user_name='".$user."' and user_pass = '".$pass."'";
    $result = $this->doQuery($toQuery);
    if($result->num_rows==0){
      return false;
    }
    return true;
  }

  //Consultar la base de datos. Se muestra informacion de error en caso de que haya alguno.
  private function doQuery($query){
    $result = $this->db->query($query);
    if(!$result){
      die("Error en la query: ".$this->db->error);
    }
    return $result;
  }

  //Comprueba si existe una funcionalidad
  public function existeFun($name){
    $toQuery = "select * from Funcionalidad where fun_name = '".$name."'";
    $result = $this->doQuery($toQuery);
    if($result->num_rows==0){
      return false;
    }
    return true;
  }

  //Comprueba si existe una pagina
  public function existePag($name){
    $toQuery = "select * from Pagina where pag_name = '".$name."'";
    $result = $this->doQuery($toQuery);
    if($result->num_rows==0){
      return false;
    }
    return true;
  }

  //Comprueba si existe un rol
  public function existeRol($name){
    $toQuery = "select * from Rol where rol_name = '".$name."'";
    $result = $this->doQuery($toQuery);
    if($result->num_rows==0){
      return false;
    }
    return true;
  }

  //Comprueba si existe un usuario
  public function existeUser($name){
    $toQuery = "select * from Usuario where user_name = '".$name."'";
    $result = $this->doQuery($toQuery);
    if($result->num_rows==0){
      return false;
    }
    return true;
  }

  //Inserta una funcionalidad en la DB
  public function insertarFun($name,$desc){
    if(!$this->existeFun($name)){
      $toQuery = "insert into Funcionalidad (fun_name,fun_desc) values ('".$name."','".$desc."');";
      $this->doQuery($toQuery); // si no DIE es que todo fue bien. (en determinado momento podriamos hacer algo mejor)
      return true;
    }
    return false;
  }

  //Inserta una pagina en la DB
  public function insertarPag($name,$desc){
    if(!$this->existePag($name)){
      $toQuery = "insert into Pagina (pag_name,pag_desc) values ('".$name."','".$desc."');";
      $this->doQuery($toQuery); // si no DIE es que todo fue bien. (en determinado momento podriamos hacer algo mejor)
      return true;
    }
    return false;
  }

  //Inserta un rol en la DB
  public function insertarRol($name,$desc){
    if(!$this->existeRol($name)){
      $toQuery = "insert into Rol (rol_name,rol_desc) values ('".$name."','".$desc."');";
      $this->doQuery($toQuery); // si no DIE es que todo fue bien. (en determinado momento podriamos hacer algo mejor)
      return true;
    }
    return false;
  }

  //Inserta un usuario en la DB
  public function insertarUser($name,$pass,$desc,$email){
    if(!$this->existeUser($name)){
      $toQuery = "insert into Usuario (user_name,user_pass,user_desc,user_email) values ('".$name."','".$pass."','".$desc."','".$email."');";
      $this->doQuery($toQuery); // si no DIE es que todo fue bien. (en determinado momento podriamos hacer algo mejor)
      return true;
    }
    return false;
  }

  //Devuelve un array con los nombres de los roles a los que pertenece un usuario
  public function listRolesByUser($user){
    $toQuery = "select rol_name
                from Usuario , Rol , User_Rol
                where Usuario.user_name = '".$user."' and
                      Usuario.user_id = User_Rol.user_id and
                      User_Rol.rol_id = Rol.rol_id order by rol_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de los roles que realizan cierta funcionalidad
  public function listRolesByFun($fun){
    $toQuery = "select rol_name
                from Funcionalidad , Rol , Rol_Fun
                where Funcionalidad.fun_name = '".$fun."' and
                      Funcionalidad.fun_id = Rol_Fun.fun_id and
                      Rol_Fun.rol_id = Rol.rol_id order by rol_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de los usuarios que pertenecen a cierto rol
  public function listUsersByRol($rol){
    $toQuery = "select user_name
                from Usuario , Rol , User_Rol
                where rol_name = '".$rol."' and
                      Rol.rol_id = User_Rol.rol_id and
                      User_Rol.user_id = Usuario.user_id order by user_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de los usuarios que tienen acceso a cierta pagina
  public function listUsersByPag($pag){
    $toQuery = "select user_name
                from Usuario , Pagina , User_Pag
                where pag_name = '".$pag."' and
                      Pagina.pag_id = User_Pag.pag_id and
                      User_Pag.user_id = Usuario.user_id order by user_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de los usuarios que realizan cierta funcionalidad
  public function listUsersByFun($fun){
    $toQuery = "select user_name
                from Usuario , Funcionalidad , User_Fun
                where fun_name = '".$fun."' and
                      Funcionalidad.fun_id = User_Fun.fun_id and
                      User_Fun.user_id = Usuario.user_id order by user_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de las paginas a las que puede acceder cierto usuario
  public function listPagsByUsers($user){
    $toQuery = "select pag_name
                from Usuario , Pagina , User_Pag
                where user_name = '".$user."' and
                      Usuario.user_id = User_Pag.user_id and
                      User_Pag.pag_id = Pagina.pag_id order by pag_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de las paginas que pertenecen a una funcionalidad
  public function listPagsByFun($fun){
    $toQuery = "select pag_name
                from Pagina , Funcionalidad , Pag_Fun
                where fun_name = '".$fun."' and
                      Funcionalidad.fun_id = Pag_Fun.fun_id and
                      Pag_Fun.pag_id = Pagina.pag_id order by pag_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de las funciones que realiza cierto rol
  public function listFunsByRol($rol){
    $toQuery = "select fun_name
                from Funcionalidad , Rol , Rol_Fun
                where rol_name = '".$rol."' and
                      Rol.rol_id = Rol_Fun.rol_id and
                      Rol_Fun.fun_id = Funcionalidad.fun_id order by fun_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de las funcionalidades que tienen acceso a cierta pagina
  public function listFunsByPag($pag){
    $toQuery = "select fun_name
                from Funcionalidad , Pagina , Pag_Fun
                where pag_name = '".$pag."' and
                      Pagina.pag_id = Pag_Fun.pag_id and
                      Pag_Fun.fun_id = Funcionalidad.fun_id order by fun_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }
  public function listFunsByUser($user){
    $toQuery = "select fun_name
                from Funcionalidad , Usuario , User_Fun
                where user_name = '".$user."' and
                      Usuario.user_id = User_Fun.user_id and
                      User_Fun.fun_id = Funcionalidad.fun_id order by fun_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de todas las funcionalidades
  public function listFuns(){
    $toQuery = "select fun_name from Funcionalidad group by fun_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de todos los usuarios
  public function listUsers(){
    $toQuery = "select user_name from Usuario group by user_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de todas las paginas
  public function listPags(){
    $toQuery = "select pag_name from Pagina order by pag_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }

  //Devuelve un array con los nombres de todos los roles
  public function listRols(){
    $toQuery = "select rol_name from Rol order by rol_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }


//Funciones que devuelven los datos que van a ser mostrados en las paginas de gestion
//Estas funciones las usa la clase RenderTableGestion
  public function listGestionFuns(){
    $toQuery = "select fun_name, fun_desc, fun_id from Funcionalidad order by fun_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }
  public function listGestionUsers(){
    $toQuery = "select user_name, user_id, user_email from Usuario order by user_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }
  public function listGestionPags(){
    $toQuery = "select pag_name, pag_desc, pag_id  from Pagina order by pag_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }
  public function listGestionRols(){
    $toQuery = "select rol_name,rol_desc, rol_id from Rol order by rol_name";
    $result = $this->doQuery($toQuery);
    return $this->returnArray($result);
  }
//HASTA AQUI

//Borrados
  public function borrarFuncionalidad($delete_id){
    //Borramos de Funcionalidad
    $toQuery = "delete from Funcionalidad where fun_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de Pag_Fun
    $toQuery = "delete from Pag_Fun where fun_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de User_Fun
    $toQuery = "delete from User_Fun where fun_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de Rol_Fun
    $toQuery = "delete from Rol_Fun where fun_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Done
    return(true);
  }

  public function borrarUsuario($delete_id){
    //Borramos de Usuario
    $toQuery = "delete from Usuario where user_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de User_Fun
    $toQuery = "delete from User_Fun where user_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de User_Rol
    $toQuery = "delete from User_Rol where user_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de User_Pag
    $toQuery = "delete from User_Pag where user_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Done
    return(true);
  }

  public function borrarPagina($delete_id){
    //Borramos de Pagina
    $toQuery = "delete from Pagina where pag_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de Pag_Fun
    $toQuery = "delete from Pag_Fun where pag_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de User_Pag
    $toQuery = "delete from User_Pag where pag_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Done
    return(true);
  }


  public function borrarRol($delete_id){
    //Borramos de Rol
    $toQuery = "delete from Rol where rol_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de Rol_Fun
    $toQuery = "delete from Rol_Fun where rol_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Borramos de User_Rol
    $toQuery = "delete from User_Rol where rol_id='".$delete_id."'";
    $this->doQuery($toQuery);
    //Done
    return(true);
  }
//HASTA AQUI

//Funciones que devuelven los datos que hay que mostrar en los formularios de las vistas de modificaciones
  public function getDatosFuncion($busca_id){
    $toQuery = "select fun_name, fun_desc from Funcionalidad where fun_id = $busca_id";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }

  public function getDatosRol($busca_id){
    $toQuery = "select rol_name, rol_desc from Rol where rol_id = $busca_id";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }

  public function getDatosUsuario($busca_id){
    $toQuery = "select user_name, user_desc, user_email from Usuario where user_id = $busca_id";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }

  public function getDatosPagina($busca_id){
    $toQuery = "select pag_name, pag_desc from Pagina where pag_id = $busca_id";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }
//HASTA AQUI

//Funciones que devuelven una id aleatoria de rol, usuario, funcionalidad o pagina
  public function getMinIDFun(){
    $toQuery = "select fun_id from Funcionalidad";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }
  public function getMinIDRol(){
    $toQuery = "select rol_id from Rol";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }
  public function getMinIDPag(){
    $toQuery = "select pag_id from Pagina";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }
  public function getMinIDUser(){
    $toQuery = "select user_id from Usuario";
    $result = $this->doQuery($toQuery);
    return $result->fetch_assoc();
  }
//HASTA AQUI

  //Devuelve verdadero si un usuario y un rol estan relacionados
  public function existUserRol($user,$rol){
    $toQuery = "select * from Usuario, Rol, User_Rol
                where Usuario.user_name = '".$user."' and
                      Rol.rol_name = '".$rol."' and
                      Rol.rol_id = User_Rol.rol_id and
                      Usuario.user_id = User_Rol.user_id";
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  //Devuelve verdadero si un usuario y una pagina estan relacionados
  public function existUserPag($user,$pag){
    $toQuery = "select * from Usuario, Pagina, User_Pag
                where Usuario.user_name = '".$user."' and
                      Pagina.pag_name = '".$pag."' and
                      Pagina.pag_id = User_Pag.pag_id and
                      Usuario.user_id = User_Pag.user_id";
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  //Devuelve verdadero si un usuario y una funcionalidad estan relacionados
  public function existUserFun($user,$fun){
    $toQuery = "select * from Usuario, Funcionalidad, User_Fun
                where Usuario.user_name = '".$user."' and
                      Funcionalidad.fun_name = '".$fun."' and
                      Funcionalidad.fun_id = User_Fun.fun_id and
                      Usuario.user_id = User_Fun.user_id";
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  //Devuelve verdadero si una pagina y una funcionalidad estan relacionados
  public function existPagFun($pag,$fun){
    $toQuery = "select * from Pagina, Funcionalidad, Pag_Fun
                where Pagina.pag_name = '".$pag."' and
                      Funcionalidad.fun_name = '".$fun."' and
                      Funcionalidad.fun_id = Pag_Fun.fun_id and
                      Pagina.pag_id = Pag_Fun.pag_id";
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  //Devuelve verdadero si un rol y una funcionalidad estan relacionados
  public function existRolFun($rol,$fun){
    $toQuery = "select * from Rol, Funcionalidad, Rol_Fun
                where Rol.rol_name = '".$rol."' and
                      Funcionalidad.fun_name = '".$fun."' and
                      Funcionalidad.fun_id = Rol_Fun.fun_id and
                      Rol.rol_id = Rol_Fun.rol_id";
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  //Devuelve el ID de un usuario
  public function getIdUser($user){
    $toQuery = "select user_id from Usuario where user_name = '".$user."'";
    $result = $this->doQuery($toQuery);
    $result = $result->fetch_assoc();
    return $result['user_id'];
  }

  //Devuelve el ID de una pagina
  public function getIdPag($pag){
    $toQuery = "select pag_id from Pagina where pag_name = '".$pag."'";
    $result = $this->doQuery($toQuery);
    $result = $result->fetch_assoc();
    return $result['pag_id'];
  }

  //Devuelve el ID de un rol
  public function getIdRol($rol){
    $toQuery = "select rol_id from Rol where rol_name = '".$rol."'";
    $result = $this->doQuery($toQuery);
    $result = $result->fetch_assoc();
    return $result['rol_id'];
  }

  //Devuelve el ID de una funcionalidad
  public function getIdFun($fun){
    $toQuery = "select fun_id from Funcionalidad where fun_name = '".$fun."'";
    $result = $this->doQuery($toQuery);
    $result = $result->fetch_assoc();
    return $result['fun_id'];
  }

//Insercion de relaciones
  public function insertRelationUserPag($user,$pag){
    if($this->existUserPag($user,$pag)){
      return false;
    }else{
      $userid = $this->getIdUser($user);
      $pagid  = $this->getIdPag($pag);
      if($pagid && $userid){
        $toQuery = "insert into User_Pag (user_id,pag_id) values ('".$userid."','".$pagid."')";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function insertRelationUserRol($user,$rol){
    if($this->existUserRol($user,$rol)){
      return false;
    }else{
      $userid = $this->getIdUser($user);
      $rolid  = $this->getIdRol($rol);
      if($rolid && $userid){
        $toQuery = "insert into User_Rol (user_id,rol_id) values ('".$userid."','".$rolid."')";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function insertRelationUserFun($user,$fun){
    if($this->existUserFun($user,$fun)){
      return false;
    }else{
      $userid = $this->getIdUser($user);
      $funid  = $this->getIdFun($fun);
      if($funid && $userid){
        $toQuery = "insert into User_Fun (user_id,fun_id) values ('".$userid."','".$funid."')";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function insertRelationPagFun($pag,$fun){
    if($this->existPagFun($pag,$fun)){
      return false;
    }else{
      $pagid =  $this->getIdPag($pag);
      $funid  = $this->getIdFun($fun);
      if($funid && $pagid){
        $toQuery = "insert into Pag_Fun (pag_id,fun_id) values ('".$pagid."','".$funid."')";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function insertRelationRolFun($rol,$fun){
    if($this->existRolFun($rol,$fun)){
      return false;
    }else{
      $rolid =  $this->getIdRol($rol);
      $funid  = $this->getIdFun($fun);
      if($funid && $rolid){
        $toQuery = "insert into Rol_Fun (rol_id,fun_id) values ('".$rolid."','".$funid."')";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  //HASTA AQUI

  //BORRADO DE RELACIONES (ESTOS CAMBIOS DEBEN PROPAGARSE)
  public function deleteRelationUserFun($user,$fun){
    if(!$this->existUserFun($user,$fun)){
      return false;
    }else{
      $userid = $this->getIdUser($user);
      $funid  = $this->getIdFun($fun);
      if($funid && $userid){
        $toQuery = "delete from User_Fun where user_id='".$userid."' and fun_id='".$funid."'";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function deleteRelationRolFun($rol,$fun){
    if(!$this->existRolFun($rol,$fun)){
      return false;
    }else{
      $rolid =  $this->getIdRol($rol);
      $funid  = $this->getIdFun($fun);
      if($funid && $rolid){
        $toQuery = "delete from Rol_Fun where rol_id='".$rolid."' and fun_id='".$funid."'";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function deleteRelationPagFun($pag,$fun){
    if(!$this->existPagFun($pag,$fun)){
      return false;
    }else{
      $pagid =  $this->getIdPag($pag);
      $funid  = $this->getIdFun($fun);
      if($funid && $pagid){
        $toQuery = "delete from Pag_Fun where pag_id='".$pagid."' and fun_id='".$funid."'";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function deleteRelationUserPag($user,$pag){
    if(!$this->existUserPag($user,$pag)){
      return false;
    }else{
      $userid = $this->getIdUser($user);
      $pagid  = $this->getIdPag($pag);
      if($pagid && $userid){
        $toQuery = "delete from User_Pag where user_id='".$userid."' and pag_id='".$pagid."'";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
  public function deleteRelationUserRol($user,$rol){
    if(!$this->existUserRol($user,$rol)){
      return false;
    }else{
      $userid = $this->getIdUser($user);
      $rolid  = $this->getIdRol($rol);
      if($rolid && $userid){
        $toQuery = "delete from User_Rol where user_id='".$userid."' and rol_id='".$rolid."'";
        $this->doQuery($toQuery);
      }else{
        return false;
      }
    }
    return true;
  }
//HASTA AQUI

//Modificado de DESCRIPCIONES y otros textos

  public function ModificarFuncionalidad($name,$desc){
    $toQuery = "update Funcionalidad set fun_desc='".$desc."' where fun_name='".$name."'";
    if($this->doQuery($toQuery)){
      return true;
    }
    else{
      return false;
    }
  }
  public function ModificarPagina($name,$desc){
    $toQuery = "update Pagina set pag_desc='".$desc."' where pag_name='".$name."'";
    if($this->doQuery($toQuery)){
      return true;
    }
    else{
      return false;
    }
  }
  public function ModificarRol($name,$desc){
    $toQuery = "update Rol set rol_desc='".$desc."' where rol_name='".$name."'";
    if($this->doQuery($toQuery)){
      return true;
    }
    else{
      return false;
    }
  }
  public function ModificarUsuario($name,$desc,$email){
    $toQuery = "update Usuario set user_desc='".$desc."',user_email='".$email."' where user_name='".$name."'";
    if($this->doQuery($toQuery)){
      return true;
    }
    else{
      return false;
    }
  }
  public function ModificarPass($pass,$id){
    $toQuery = "update Usuario set user_pass='".$pass."' where user_id='".$id."'";
    if($this->doQuery($toQuery)){
      return true;
    }
    else{
      return false;
    }
  }

  //HASTA AQUI

  private function checkRolPath($user,$pag) { //prueba si un usuario puede acceder a una pagina mediante su rol
    $toQuery ='select Pagina.pag_name from Usuario,User_Rol,Rol_Fun,Pag_Fun,Pagina
    where Usuario.user_name = "'.$user.'" and
          Usuario.user_id = User_Rol.user_id and
          User_Rol.rol_id = Rol_Fun.rol_id and
          Rol_Fun.fun_id = Pag_Fun.fun_id and
          Pag_Fun.pag_id = Pagina.pag_id and
          Pagina.pag_name = "'.$pag.'"';
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  private function checkFunPath($user,$pag){
    $toQuery = ' select Pagina.pag_name from Usuario,User_Fun,Pag_Fun,Pagina
    where Usuario.user_name = "'.$user.'" and
          Usuario.user_id = User_Fun.user_id and
          User_Fun.fun_id = Pag_Fun.fun_id and
          Pag_Fun.pag_id = Pagina.pag_id and
          Pagina.pag_name = "'.$pag.'"';
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  private function checkPagPath($user,$pag){
    $toQuery = 'select Pagina.pag_name from Usuario,User_Pag,Pagina
    where Usuario.user_name = "'.$user.'" and
          Usuario.user_id = User_Pag.user_id and
          User_Pag.pag_id = Pagina.pag_id and
          Pagina.pag_name = "'.$pag.'"';
    $result = $this->doQuery($toQuery);
    return $result->num_rows != 0;
  }

  public function canUserInPag($user,$pag) {
    return $this->checkRolPath($user,$pag) || $this->checkPagPath($user,$pag) || $this->checkFunPath($user,$pag);
  }
}
?>
