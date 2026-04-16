<?php

class Categoria{
    //guardamos la conexión de la base de datos
    private $db;

    //constructor
    public function __construct(){
        $this->db = Db::conectar();
    }

    public function listar_categoria(){
        //seleccionar todos los datos de la tabla
        $sql = "SELECT * FROM Categorias";

        //preparamos y ejecutamos la variable
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        //recogemos los datos de la tabla en un array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }

}

?>