<<<<<<< HEAD
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Materia{

 public $driver;
 private $mat_id;
 private $mat_name;
 private $tit_id;

 public function Materia($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->mat_id = null;
   $this->mat_name = null;
   $this->tit_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setMat_id($arrayassoc['mat_id']);
  $this->setMat_name($arrayassoc['mat_name']);
  $this->setTit_id($arrayassoc['tit_id']);
 }

/* Getters... */
 public function getMat_id(){
   return $this->mat_id;
 }
 public function getMat_name(){
   return $this->mat_name;
 }
 public function getTit_id(){
   return $this->tit_id;
 }

/* Setters... */
 public function setMat_id($value){
   $this->mat_id = $value;
 }
 public function setMat_name($value){
   $this->mat_name = $value;
 }
 public function setTit_id($value){
   $this->tit_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Materia */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Materia($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Materia that key = value */
 public function findBy($key,$value){
   $arraytoret = array();
   $query='select *
     from Materia
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Materia containing all rows from db */
 public function all(){
   $arraytoret = array();
   $query='select *
     from Materia';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Materia where
   mat_id = "'.$this->getMat_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Materia (mat_id,mat_name,tit_id) values ("'.$this->getMat_id().'","'.$this->getMat_name().'","'.$this->getTit_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Materia (mat_name,tit_id) values ("'.$this->getMat_name().'","'.$this->getTit_id().'")';
   $this->driver->exec($query);
}
public function nombreTitulacion(){
  $query = 'select Titulacion.tit_name from Titulacion, Materia where
  Materia.mat_id = "'.$this->getMat_id().'" and
  Titulacion.tit_id = Materia.tit_id';
  $result = $this->driver->exec($query);
  return $result[0]['tit_name'];
}
}
?>
=======
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Materia{

 public $driver;
 private $mat_id;
 private $mat_name;
 private $tit_id;

 public function Materia($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->mat_id = null;
   $this->mat_name = null;
   $this->tit_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setMat_id($arrayassoc['mat_id']);
  $this->setMat_name($arrayassoc['mat_name']);
  $this->setTit_id($arrayassoc['tit_id']);
 }

/* Getters... */
 public function getMat_id(){
   return $this->mat_id;
 }
 public function getMat_name(){
   return $this->mat_name;
 }
 public function getTit_id(){
   return $this->tit_id;
 }

/* Setters... */
 public function setMat_id($value){
   $this->mat_id = $value;
 }
 public function setMat_name($value){
   $this->mat_name = $value;
 }
 public function setTit_id($value){
   $this->tit_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Materia */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Materia($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Materia that key = value */
 public function findBy($key,$value){
   $arraytoret = array();
   $query='select *
     from Materia
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Materia containing all rows from db */
 public function all(){
   $arraytoret = array();
   $query='select *
     from Materia';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Materia where
   mat_id = "'.$this->getMat_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Materia (mat_id,mat_name,tit_id) values ("'.$this->getMat_id().'","'.$this->getMat_name().'","'.$this->getTit_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Materia (mat_name,tit_id) values ("'.$this->getMat_name().'","'.$this->getTit_id().'")';
   $this->driver->exec($query);
}
public function nombreTitulacion(){
  $query = 'select Titulacion.tit_name from Titulacion, Materia where
  Materia.mat_id = "'.$this->getMat_id().'" and
  Titulacion.tit_id = Materia.tit_id';
  $result = $this->driver->exec($query);
  return $result[0]['tit_name'];
}
}
?>
>>>>>>> upstream/master
