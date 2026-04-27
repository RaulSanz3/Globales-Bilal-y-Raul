<?php

//incluir la conexión con la base de datos
// include_once("db.php");

class Departamento
{
    //guardamos la conexióna a la base de datos
    private $db;

    //constructor
    public function __construct()
    {
        $this->db = Db::conectar();
    }

    //método para obtener datos
    public function listar()
    {
        try {
            $sql = "SELECT * FROM Departamentos";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }

    }
}
?>