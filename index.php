<?php

require_once("models/db.php"); 
/*require_once("controllers/DepartamentoController.php");

$controller = new DepartamentoController();
$controller->listar();*/

require_once("controllers/EmpleadoController.php");

$controller = new EmpleadoController();
$controller->listar_emp();

?>
