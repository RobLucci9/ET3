<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class User_pag{

 public $driver;
 private $user_id;
 private $pag_id;

 public function User_pag($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->user_id = null;
   $this->pag_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setUser_id($arrayassoc['user_id']);
  $this->setPag_id($arrayassoc['pag_id']);
 }

/* Getters... */
 public function getUser_id(){
   return $this->user_id;
 }
 public function getPag_id(){
   return $this->pag_id;
 }

/* Setters... */
 public function setUser_id($value){
   $this->user_id = $value;
 }
 public function setPag_id($value){
   $this->pag_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of User_Pag */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new User_Pag($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all User_Pag that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from User_Pag
     where '.$key.'="'.$value.'"';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of User_Pag containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from User_Pag';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from User_Pag where
   user_id = "'.$this->getUser_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into User_Pag (user_id,pag_id) values ("'.$this->getUser_id().'","'.$this->getPag_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into User_Pag (pag_id) values ("'.$this->getPag_id().'")';
   $this->driver->exec($query);
}

}
?>
