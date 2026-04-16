<?php

require_once("models/db.php"); 
/*require_once("controllers/DepartamentoController.php");

$controller = new DepartamentoController();
$controller->listar();*/

/*require_once("controllers/EmpleadoController.php");

$controller = new EmpleadoController();
$controller->listar_emp();*/

/*include_once("controllers/CategoriaController.php");

$controller = new CategoriaController();
$controller->listar_cat();*/

include_once("controllers/ClientesController.php");

$controller = new ClientesController();
$controller->index();


?>
