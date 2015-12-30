<<<<<<< HEAD
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Pagina{

 public $driver;
 private $pag_id;
 private $pag_name;
 private $pag_desc;

 public function Pagina($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->pag_id = null;
   $this->pag_name = null;
   $this->pag_desc = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setPag_id($arrayassoc['pag_id']);
  $this->setPag_name($arrayassoc['pag_name']);
  $this->setPag_desc($arrayassoc['pag_desc']);
 }

/* Getters... */
 public function getPag_id(){
   return $this->pag_id;
 }
 public function getPag_name(){
   return $this->pag_name;
 }
 public function getPag_desc(){
   return $this->pag_desc;
 }

/* Setters... */
 public function setPag_id($value){
   $this->pag_id = $value;
 }
 public function setPag_name($value){
   $this->pag_name = $value;
 }
 public function setPag_desc($value){
   $this->pag_desc = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Pagina */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Pagina($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Pagina that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Pagina
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Pagina containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Pagina';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Pagina where
   pag_id = "'.$this->getPag_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Pagina (pag_id,pag_name,pag_desc) values ("'.$this->getPag_id().'","'.$this->getPag_name().'","'.$this->getPag_desc().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Pagina (pag_name,pag_desc) values ("'.$this->getPag_name().'","'.$this->getPag_desc().'")';
   $this->driver->exec($query);
}

}
?>
=======
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Pagina{

 public $driver;
 private $pag_id;
 private $pag_name;
 private $pag_desc;

 public function Pagina($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->pag_id = null;
   $this->pag_name = null;
   $this->pag_desc = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setPag_id($arrayassoc['pag_id']);
  $this->setPag_name($arrayassoc['pag_name']);
  $this->setPag_desc($arrayassoc['pag_desc']);
 }

/* Getters... */
 public function getPag_id(){
   return $this->pag_id;
 }
 public function getPag_name(){
   return $this->pag_name;
 }
 public function getPag_desc(){
   return $this->pag_desc;
 }

/* Setters... */
 public function setPag_id($value){
   $this->pag_id = $value;
 }
 public function setPag_name($value){
   $this->pag_name = $value;
 }
 public function setPag_desc($value){
   $this->pag_desc = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Pagina */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Pagina($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Pagina that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Pagina
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Pagina containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Pagina';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Pagina where
   pag_id = "'.$this->getPag_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Pagina (pag_id,pag_name,pag_desc) values ("'.$this->getPag_id().'","'.$this->getPag_name().'","'.$this->getPag_desc().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Pagina (pag_name,pag_desc) values ("'.$this->getPag_name().'","'.$this->getPag_desc().'")';
   $this->driver->exec($query);
}

}
?>
>>>>>>> upstream/master
