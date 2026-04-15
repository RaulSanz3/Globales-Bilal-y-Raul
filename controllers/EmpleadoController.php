<?php

include_once("models/Empleado.php");

class EmpleadoController{
    //instanciamos el modelo
    public function listar_emp(){
        $empObj = new Empleado();

        $todosEmpleados = $empObj->listar_empleados(); //la variable viene del modelo para obetener los datos de la base de datos

        include_once("views/empleados/index_emp.php");
    }
    
}


?>