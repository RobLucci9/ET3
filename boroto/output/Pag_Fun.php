<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Pag_fun{

 public $driver;
 private $pag_id;
 private $fun_id;

 public function Pag_fun($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->pag_id = null;
   $this->fun_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setPag_id($arrayassoc['pag_id']);
  $this->setFun_id($arrayassoc['fun_id']);
 }

/* Getters... */
 public function getPag_id(){
   return $this->pag_id;
 }
 public function getFun_id(){
   return $this->fun_id;
 }

/* Setters... */
 public function setPag_id($value){
   $this->pag_id = $value;
 }
 public function setFun_id($value){
   $this->fun_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Pag_Fun */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Pag_Fun($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Pag_Fun that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Pag_Fun
     where '.$key.'='.$value;
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Pag_Fun containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Pag_Fun';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Pag_Fun where
   pag_id = "'.$this->getPag_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Pag_Fun (pag_id,fun_id) values ("'.$this->getPag_id().'","'.$this->getFun_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Pag_Fun (fun_id) values ("'.$this->getFun_id().'")';
   $this->driver->exec($query);
}

}
?>
