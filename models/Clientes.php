<?php
// models/Clientes.php
require_once("models/db.php"); 

class Cliente {
    private $db;

    public function __construct() {
        $this->db = Db::conectar();
    }

    public function listar() {
        $sql = "SELECT * FROM Clientes";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>