<<<<<<< HEAD
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Titulacion_usuario{

 public $driver;
 private $tit_id;
 private $user_id;

 public function Titulacion_usuario($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->tit_id = null;
   $this->user_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setTit_id($arrayassoc['tit_id']);
  $this->setUser_id($arrayassoc['user_id']);
 }

/* Getters... */
 public function getTit_id(){
   return $this->tit_id;
 }
 public function getUser_id(){
   return $this->user_id;
 }

/* Setters... */
 public function setTit_id($value){
   $this->tit_id = $value;
 }
 public function setUser_id($value){
   $this->user_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Titulacion_Usuario */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Titulacion_Usuario($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Titulacion_Usuario that key = value */
 public function findBy($key,$value){
   $arraytoret = array();
   $query='select *
     from Titulacion_Usuario
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Titulacion_Usuario containing all rows from db */
 public function all(){
   $arraytoret = array();
   $query='select *
     from Titulacion_Usuario';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Titulacion_Usuario where
   tit_id = "'.$this->getTit_id().'" and user_id = "'.$this->getUser_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Titulacion_Usuario (tit_id,user_id) values ("'.$this->getTit_id().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Titulacion_Usuario (tit_id,user_id) values ("'.$this->getTit_id().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}

}
?>
=======
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Titulacion_usuario{

 public $driver;
 private $tit_id;
 private $user_id;

 public function Titulacion_usuario($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->tit_id = null;
   $this->user_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setTit_id($arrayassoc['tit_id']);
  $this->setUser_id($arrayassoc['user_id']);
 }

/* Getters... */
 public function getTit_id(){
   return $this->tit_id;
 }
 public function getUser_id(){
   return $this->user_id;
 }

/* Setters... */
 public function setTit_id($value){
   $this->tit_id = $value;
 }
 public function setUser_id($value){
   $this->user_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Titulacion_Usuario */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Titulacion_Usuario($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Titulacion_Usuario that key = value */
 public function findBy($key,$value){
   $arraytoret = array();
   $query='select *
     from Titulacion_Usuario
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Titulacion_Usuario containing all rows from db */
 public function all(){
   $arraytoret = array();
   $query='select *
     from Titulacion_Usuario';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Titulacion_Usuario where
   tit_id = "'.$this->getTit_id().'" and user_id = "'.$this->getUser_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Titulacion_Usuario (tit_id,user_id) values ("'.$this->getTit_id().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Titulacion_Usuario (tit_id,user_id) values ("'.$this->getTit_id().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}

}
?>
>>>>>>> upstream/master
