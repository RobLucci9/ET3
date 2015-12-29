<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */
require_once 'Titulacion.php';
require_once 'Apunte.php';
require_once 'Materia.php';

class Usuario{

 public $driver;
 private $user_id;
 private $user_name;
 private $user_pass;
 private $user_desc;
 private $user_email;

 public function Usuario($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->user_id = null;
   $this->user_name = null;
   $this->user_pass = null;
   $this->user_desc = null;
   $this->user_email = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setUser_id($arrayassoc['user_id']);
  $this->setUser_name($arrayassoc['user_name']);
  $this->setUser_pass($arrayassoc['user_pass']);
  $this->setUser_desc($arrayassoc['user_desc']);
  $this->setUser_email($arrayassoc['user_email']);
 }

/* Getters... */
 public function getUser_id(){
   return $this->user_id;
 }
 public function getUser_name(){
   return $this->user_name;
 }
 public function getUser_pass(){
   return $this->user_pass;
 }
 public function getUser_desc(){
   return $this->user_desc;
 }
 public function getUser_email(){
   return $this->user_email;
 }

/* Setters... */
 public function setUser_id($value){
   $this->user_id = $value;
 }
 public function setUser_name($value){
   $this->user_name = $value;
 }
 public function setUser_pass($value){
   $this->user_pass = $value;
 }
 public function setUser_desc($value){
   $this->user_desc = $value;
 }
 public function setUser_email($value){
   $this->user_email = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Usuario */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Usuario($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Usuario that key = value */
 public function findBy($key,$value){
   $arraytoret = array();
   $query='select *
     from Usuario
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Usuario containing all rows from db */
 public function all(){
   $arraytoret = array();
   $query='select *
     from Usuario';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Usuario where
   user_id = "'.$this->getUser_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Usuario (user_id,user_name,user_pass,user_desc,user_email) values ("'.$this->getUser_id().'","'.$this->getUser_name().'","'.$this->getUser_pass().'","'.$this->getUser_desc().'","'.$this->getUser_email().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Usuario (user_name,user_pass,user_desc,user_email) values ("'.$this->getUser_name().'","'.$this->getUser_pass().'","'.$this->getUser_desc().'","'.$this->getUser_email().'")';
   $this->driver->exec($query);
}
//funcion custom creada por FVieira
  public function titulaciones(){
    $titulacion = new Titulacion($this->driver);
    $query = "select * from Usuario,Titulacion,Titulacion_Usuario where
              Usuario.user_id = Titulacion_Usuario.user_id and
              Titulacion_Usuario.tit_id = Titulacion.tit_id and
              Usuario.user_id = '".$this->user_id."'";
    $results = $this->driver->exec($query);
    return $titulacion->factory($results);
  }

  public function materias(){
    $materia = new Materia($this->driver);
    $query = "select * from Usuario,Materia,Materia_Usuario where
              Usuario.user_id = Materia_Usuario.user_id and
              Materia_Usuario.mat_id = Materia.mat_id and
              Usuario.user_id = '".$this->user_id."'";
    $results = $this->driver->exec($query);
    return $materia->factory($results);
  }

  public function tieneApuntes(){
    $apunte = new Apunte($this->driver);
    $query = "select Apunte.apunte_id,Apunte.mat_id,Apunte.anho_academico,Apunte.apunte_name,Apunte.ruta, Apunte.user_id from Usuario,Apunte,U_Tiene_A where
              Usuario.user_id = U_Tiene_A.user_id and
              U_Tiene_A.apunte_id = Apunte.apunte_id and
              Usuario.user_id = '".$this->user_id."'";
    $results = $this->driver->exec($query);
    return $apunte->factory($results);
  }
  public function apuntes(){
    $apunte = new Apunte($this->driver);
    $query = "select * from Usuario,Apunte where
              Usuario.user_id = Apunte.user_id and
              Usuario.user_id = '".$this->user_id."'";
    $results = $this->driver->exec($query);
    return $apunte->factory($results);
  }
  public function existeUsuario(){
    $query = 'select * from Usuario where Usuario.user_name ="'.$this->user_name.'"';
    return count($this->driver->exec($query)) > 0;
  }
}
?>
