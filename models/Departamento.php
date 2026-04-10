<?php

//incluir la conexión con la base de datos
include_once("db.php");

class Departamento {
    //guardamos la conexióna a la base de datos
    private $db;
    private $nombre_tabla = "Departamentos";

    //constructor
    public function __construct(){
        $this->db = Db::conectar();
    }

    //método para obtener datos
    public function listar(){
        //definimos la consula SQL
        $sql = "SELECT * FROM " . $this->nombre_tabla;

        //preparamos la consulta
        $stmt = $this->db->prepare($sql);

        //ejecutamos la consulta en la base de datos
        $stmt->execute();

        //fetchALL(PDO::ASSOC) convierte las filas de la tabla en un arreglo asociativo de PHP
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}





?>