<<<<<<< HEAD
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Notificacion{

 public $driver;
 private $notificacion_id;
 private $fecha;
 private $contenido;
 private $user_id;

 public function Notificacion($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->notificacion_id = null;
   $this->fecha = null;
   $this->contenido = null;
   $this->user_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setNotificacion_id($arrayassoc['notificacion_id']);
  $this->setFecha($arrayassoc['fecha']);
  $this->setContenido($arrayassoc['contenido']);
  $this->setUser_id($arrayassoc['user_id']);
 }

/* Getters... */
 public function getNotificacion_id(){
   return $this->notificacion_id;
 }
 public function getFecha(){
   return $this->fecha;
 }
 public function getContenido(){
   return $this->contenido;
 }
 public function getUser_id(){
   return $this->user_id;
 }

/* Setters... */
 public function setNotificacion_id($value){
   $this->notificacion_id = $value;
 }
 public function setFecha($value){
   $this->fecha = $value;
 }
 public function setContenido($value){
   $this->contenido = $value;
 }
 public function setUser_id($value){
   $this->user_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Notificacion */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Notificacion($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Notificacion that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Notificacion
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Notificacion containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Notificacion';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Notificacion where
   notificacion_id = "'.$this->getNotificacion_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Notificacion (notificacion_id,fecha,contenido,user_id) values ("'.$this->getNotificacion_id().'","'.$this->getFecha().'","'.$this->getContenido().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Notificacion (fecha,contenido,user_id) values ("'.$this->getFecha().'","'.$this->getContenido().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}

}
?>
=======
<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class Notificacion{

 public $driver;
 private $notificacion_id;
 private $fecha;
 private $contenido;
 private $user_id;

 public function Notificacion($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->notificacion_id = null;
   $this->fecha = null;
   $this->contenido = null;
   $this->user_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setNotificacion_id($arrayassoc['notificacion_id']);
  $this->setFecha($arrayassoc['fecha']);
  $this->setContenido($arrayassoc['contenido']);
  $this->setUser_id($arrayassoc['user_id']);
 }

/* Getters... */
 public function getNotificacion_id(){
   return $this->notificacion_id;
 }
 public function getFecha(){
   return $this->fecha;
 }
 public function getContenido(){
   return $this->contenido;
 }
 public function getUser_id(){
   return $this->user_id;
 }

/* Setters... */
 public function setNotificacion_id($value){
   $this->notificacion_id = $value;
 }
 public function setFecha($value){
   $this->fecha = $value;
 }
 public function setContenido($value){
   $this->contenido = $value;
 }
 public function setUser_id($value){
   $this->user_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of Notificacion */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new Notificacion($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all Notificacion that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from Notificacion
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of Notificacion containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from Notificacion';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from Notificacion where
   notificacion_id = "'.$this->getNotificacion_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into Notificacion (notificacion_id,fecha,contenido,user_id) values ("'.$this->getNotificacion_id().'","'.$this->getFecha().'","'.$this->getContenido().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into Notificacion (fecha,contenido,user_id) values ("'.$this->getFecha().'","'.$this->getContenido().'","'.$this->getUser_id().'")';
   $this->driver->exec($query);
}

}
?>
>>>>>>> upstream/master
