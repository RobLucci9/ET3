<?php
/* the ORM and activeRecord needs a driver. it should be named driver.php */
/* class generated automaticaly with Boroto */
/* Felipe Vieira, 2015 */

class User_fun{

 public $driver;
 private $user_id;
 private $fun_id;

 public function User_fun($driver) {
 /* BE CARE the ORM and activeRecord functionality of boroto generted classes needs an Drive Class with a function exec that executes SQL queries and returns arrayassoc or arrays of arrayassoc */
   $this->user_id = null;
   $this->fun_id = null;
   $this->driver = $driver;
 }

/* get an array_fetch from driver and fill the atributes of $this */
 public function fill($arrayassoc) {
  $this->setUser_id($arrayassoc['user_id']);
  $this->setFun_id($arrayassoc['fun_id']);
 }

/* Getters... */
 public function getUser_id(){
   return $this->user_id;
 }
 public function getFun_id(){
   return $this->fun_id;
 }

/* Setters... */
 public function setUser_id($value){
   $this->user_id = $value;
 }
 public function setFun_id($value){
   $this->fun_id = $value;
 }


/* factory method, takes an array of mysqli::array_fetch and returns a array of User_Fun */
 public function factory($arrayfetch){
   $arraytoret = Array();
   if($arrayfetch){
     foreach($arrayfetch as $fetch){
       $newObject = new User_Fun($this->driver);
       $newObject->fill($fetch);
       array_push($arraytoret,$newObject);
     }
   }
 return $arraytoret;
 }

 /* return an array containing all User_Fun that key = value */
 public function findBy($key,$value){ 
   $arraytoret = array();
   $query='select *
     from User_Fun
     where '.$key.'='.$value;
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* returns an array of User_Fun containing all rows from db */
 public function all(){ 
   $arraytoret = array();
   $query='select *
     from User_Fun';
   $results = $this->driver->exec($query);
   return $this->factory($results);
}

/* deletes from db */
 public function destroy(){
   $query = 'delete from User_Fun where
   user_id = "'.$this->getUser_id().'"';
   $this->driver->exec($query);
 }

/* saves to db */
 public function save() {
    $this->destroy();
   $query = 'insert into User_Fun (user_id,fun_id) values ("'.$this->getUser_id().'","'.$this->getFun_id().'")';
   $this->driver->exec($query);
}
 public function create() {
   $query = 'insert into User_Fun (fun_id) values ("'.$this->getFun_id().'")';
   $this->driver->exec($query);
}

}
?>
