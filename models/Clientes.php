<?php
// Asegúrate de que la ruta es correcta según tu estructura
require_once "db.php"; 

class Cliente {
    private $db;

    public function __construct() {
        // Usamos el método estático de tu clase Db
        $this->db = Db::conectar();
    }

    public function listar() {
       
        $sql = "SELECT * FROM clientes";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        // fetchAll saca todos los registros de golpe
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>