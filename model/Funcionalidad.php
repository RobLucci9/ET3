<<<<<<< HEAD
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Funcionalidad{

 public $driver;
 private $fun_id;
 private $fun_name;
 private $fun_desc;

 public function Funcionalidad($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->fun_id = null;
   $this->fun_name = null;
   $this->fun_desc = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setFun_id($arrayassoc['fun_id']);
  $this->setFun_name($arrayassoc['fun_name']);
  $this->setFun_desc($arrayassoc['fun_desc']);
 }

/* Getters... */
 public function getFun_id(){
   return $this->fun_id;
 }
 public function getFun_name(){
   return $this->fun_name;
 }
 public function getFun_desc(){
   return $this->fun_desc;
 }

/* Setters... */
 public function setFun_id($value){
   $this->fun_id = $value;
 }
 public function setFun_name($value){
   $this->fun_name = $value;
 }
 public function setFun_desc($value){
   $this->fun_desc = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Funcionalidad */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Funcionalidad($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Funcionalidad that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Funcionalidad
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Funcionalidad containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Funcionalidad';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Funcionalidad where
   fun_id = "'.$this->getFun_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Funcionalidad (fun_id,fun_name,fun_desc) values ("'.$this->getFun_id().'","'.$this->getFun_name().'","'.$this->getFun_desc().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Funcionalidad (fun_name,fun_desc) values ("'.$this->getFun_name().'","'.$this->getFun_desc().'")';
   $this->driver->exec($query);
}

}
?>
=======
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Funcionalidad{

 public $driver;
 private $fun_id;
 private $fun_name;
 private $fun_desc;

 public function Funcionalidad($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->fun_id = null;
   $this->fun_name = null;
   $this->fun_desc = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setFun_id($arrayassoc['fun_id']);
  $this->setFun_name($arrayassoc['fun_name']);
  $this->setFun_desc($arrayassoc['fun_desc']);
 }

/* Getters... */
 public function getFun_id(){
   return $this->fun_id;
 }
 public function getFun_name(){
   return $this->fun_name;
 }
 public function getFun_desc(){
   return $this->fun_desc;
 }

/* Setters... */
 public function setFun_id($value){
   $this->fun_id = $value;
 }
 public function setFun_name($value){
   $this->fun_name = $value;
 }
 public function setFun_desc($value){
   $this->fun_desc = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Funcionalidad */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Funcionalidad($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Funcionalidad that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Funcionalidad
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Funcionalidad containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Funcionalidad';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Funcionalidad where
   fun_id = "'.$this->getFun_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Funcionalidad (fun_id,fun_name,fun_desc) values ("'.$this->getFun_id().'","'.$this->getFun_name().'","'.$this->getFun_desc().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Funcionalidad (fun_name,fun_desc) values ("'.$this->getFun_name().'","'.$this->getFun_desc().'")';
   $this->driver->exec($query);
}

}
?>
>>>>>>> upstream/master
