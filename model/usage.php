<?php
//ejemplo de interfaz: hallar las paginas pertenecientes a una funcionalidad
require 'Pagina.php';

$driver = Driver::getInstance();

$pagina = new Pagina($driver);

$paginas = $pagina->all();
foreach( $paginas as $item){
	echo $item->getPag_name()."<br/>";
}
?>
