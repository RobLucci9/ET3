<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Materia_usuario{

 public $driver;
 private $mat_id;
 private $user_id;

 public function Materia_usuario($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->mat_id = null;
   $this->user_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setMat_id($arrayassoc['mat_id']);
  $this->setUser_id($arrayassoc['user_id']);
 }

/* Getters... */
 public function getMat_id(){
   return $this->mat_id;
 }
 public function getUser_id(){
   return $this->user_id;
 }

/* Setters... */
 public function setMat_id($value){
   $this->mat_id = $value;
 }
 public function setUser_id($value){
   $this->user_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Materia_Usuario */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Materia_Usuario($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Materia_Usuario that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Materia_Usuario
     where '.$key.'='.$value;
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Materia_Usuario containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Materia_Usuario';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Materia_Usuario where
   mat_id = "'.$this->getMat_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Materia_Usuario (mat_id,user_id) values ("'.$this->getMat_id().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Materia_Usuario (user_id) values ("'.$this->getUser_id().'")';
   $this->driver->exec($query);
}

}
?>
