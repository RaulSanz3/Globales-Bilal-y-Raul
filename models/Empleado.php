<?php

class Empleado{

    private $db;

    public function __construct(){
        $this->db = Db::conectar();
    }

    //método para obtener datos
    public function listar_empleados(){
        //ingresamos todos los datos en una variable
        $sql = "SELECT E.*, D.nombre_dep 
                    FROM Empleados E
                        LEFT JOIN Departamentos D on TRIM(E.id_dep) = TRIM(D.id_dep)";

        //preparamos y ejecutamos la variable
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        //fetchAll() recoge todos los registros que tiene la tabla y los mete en un array
        //PDO::FETCH_ASSOC es la manera que dice a PHP de como organizar la información de cada fila
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

//GHGFJH

}



?>