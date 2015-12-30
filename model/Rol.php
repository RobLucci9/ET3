<<<<<<< HEAD
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Rol{

 public $driver;
 private $rol_id;
 private $rol_name;
 private $rol_desc;

 public function Rol($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->rol_id = null;
   $this->rol_name = null;
   $this->rol_desc = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setRol_id($arrayassoc['rol_id']);
  $this->setRol_name($arrayassoc['rol_name']);
  $this->setRol_desc($arrayassoc['rol_desc']);
 }

/* Getters... */
 public function getRol_id(){
   return $this->rol_id;
 }
 public function getRol_name(){
   return $this->rol_name;
 }
 public function getRol_desc(){
   return $this->rol_desc;
 }

/* Setters... */
 public function setRol_id($value){
   $this->rol_id = $value;
 }
 public function setRol_name($value){
   $this->rol_name = $value;
 }
 public function setRol_desc($value){
   $this->rol_desc = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Rol */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Rol($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Rol that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Rol
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Rol containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Rol';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Rol where
   rol_id = "'.$this->getRol_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Rol (rol_id,rol_name,rol_desc) values ("'.$this->getRol_id().'","'.$this->getRol_name().'","'.$this->getRol_desc().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Rol (rol_name,rol_desc) values ("'.$this->getRol_name().'","'.$this->getRol_desc().'")';
   $this->driver->exec($query);
}

}
?>
=======
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Rol{

 public $driver;
 private $rol_id;
 private $rol_name;
 private $rol_desc;

 public function Rol($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->rol_id = null;
   $this->rol_name = null;
   $this->rol_desc = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setRol_id($arrayassoc['rol_id']);
  $this->setRol_name($arrayassoc['rol_name']);
  $this->setRol_desc($arrayassoc['rol_desc']);
 }

/* Getters... */
 public function getRol_id(){
   return $this->rol_id;
 }
 public function getRol_name(){
   return $this->rol_name;
 }
 public function getRol_desc(){
   return $this->rol_desc;
 }

/* Setters... */
 public function setRol_id($value){
   $this->rol_id = $value;
 }
 public function setRol_name($value){
   $this->rol_name = $value;
 }
 public function setRol_desc($value){
   $this->rol_desc = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Rol */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Rol($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Rol that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Rol
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Rol containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Rol';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Rol where
   rol_id = "'.$this->getRol_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Rol (rol_id,rol_name,rol_desc) values ("'.$this->getRol_id().'","'.$this->getRol_name().'","'.$this->getRol_desc().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Rol (rol_name,rol_desc) values ("'.$this->getRol_name().'","'.$this->getRol_desc().'")';
   $this->driver->exec($query);
}

}
?>
>>>>>>> upstream/master
