 <?php
/* Test unit para comprobar los metodos de la clase DBManager
 * Puede generar un monton de usuarios dummys que deberan de ser eliminados en su dia
 * Felipe Vieira
 */
 session_start();
  require_once "DBManager.php";
  require_once "../views/renderTable.php";
  require_once("../cancerbero.php");
  $can = new Cancerbero("testUnit");
  $can->handleAuto();
  $table = new RenderTable;
  $man =  DBManager::getInstance();
  $man1 = DBManager::getInstance();
  $man2 = DBManager::getInstance();
  $man3 = DBManager::getInstance();
  $man2->connect();
  $man3->connect();
  $man1->connect();
  function say_error($correct){
    if($correct){
      echo "creacion realizada correctamente<br/>";
    }else{
      echo "Ya existia un dato asi en la base de datos<br/>";
    }
  }

  if($man->connect()){
    say_error($man->insertarRol("rolDummy1","rol de test unit"));
    say_error($man1->insertarFun("funDummy1","funcion de test unit"));
    say_error($man2->insertarPag("pagDummy1","pagina de test unit"));
    say_error($man3->insertarUser("userDummy1","12345","usuario de test unit","dummy@dummy"));

    say_error($man3->insertarRol("rolDummy2","rol de test unit"));
    say_error($man->insertarFun("funDummy2","funcion de test unit"));
    say_error($man2->insertarPag("pagDummy2","pagina de test unit"));
    say_error($man->insertarUser("userDummy2","12345","usuario de test unit","dummy@dummy"));
    $result = $man->listRolesByUser("userDummy1");
    $result = $man->listRolesByFun("userDummy1");
    $result = $man->listUsersByRol("rolDummy1");
    foreach ($result as $item) {
      echo reset($item);
    }
  }
  $table->tableRolByUser("benis");
  echo "test pased";
?>
