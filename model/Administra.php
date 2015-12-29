<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Administra{

 public $driver;
 private $user_id;
 private $mat_id;

 public function Administra($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->user_id = null;
   $this->mat_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setUser_id($arrayassoc['user_id']);
  $this->setMat_id($arrayassoc['mat_id']);
 }

/* Getters... */
 public function getUser_id(){
   return $this->user_id;
 }
 public function getMat_id(){
   return $this->mat_id;
 }

/* Setters... */
 public function setUser_id($value){
   $this->user_id = $value;
 }
 public function setMat_id($value){
   $this->mat_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Administra */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Administra($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Administra that key = value */
 public function findBy($key,$value){
   $arraytoret = array();
   $query='select *
     from Administra
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Administra containing all rows from db */
 public function all(){
   $arraytoret = array();
   $query='select *
     from Administra order by user_id'; //Añadido order by, importante en un tabla
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Administra where
   user_id = "'.$this->getUser_id().'" and mat_id = "'.$this->getMat_id().'"';
   $this->driver->exec($query);
 }
//FUNCION NECESARIA AdministradoresMateria NO ELIMINAR
 public function existe($user, $mat){
   $query = 'select count(*) as ret from Administra where user_id='.$user.' and mat_id='.$mat.'';
   if($this->driver->exec($query)[0]["ret"]>0){
     return true;
   }else {
     return false;
   }
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Administra (user_id,mat_id) values ("'.$this->getUser_id().'","'.$this->getMat_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Administra (user_id,mat_id) values ("'.$this->getUser_id().'","'.$this->getMat_id().'")';
   $this->driver->exec($query);
}

}
?>
