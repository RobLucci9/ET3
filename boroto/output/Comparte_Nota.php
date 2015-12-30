<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Comparte_nota{

 public $driver;
 private $nota_id;
 private $user_id;

 public function Comparte_nota($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->nota_id = null;
   $this->user_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setNota_id($arrayassoc['nota_id']);
  $this->setUser_id($arrayassoc['user_id']);
 }

/* Getters... */
 public function getNota_id(){
   return $this->nota_id;
 }
 public function getUser_id(){
   return $this->user_id;
 }

/* Setters... */
 public function setNota_id($value){
   $this->nota_id = $value;
 }
 public function setUser_id($value){
   $this->user_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Comparte_Nota */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Comparte_Nota($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Comparte_Nota that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Comparte_Nota
     where '.$key.'='.$value;
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Comparte_Nota containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Comparte_Nota';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Comparte_Nota where
   nota_id = "'.$this->getNota_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Comparte_Nota (nota_id,user_id) values ("'.$this->getNota_id().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Comparte_Nota (user_id) values ("'.$this->getUser_id().'")';
   $this->driver->exec($query);
}

}
?>
