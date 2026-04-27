<?php
// models/Clientes.php
require_once(__DIR__ . '/db.php'); 

class Cliente {
    private $db;

    public function __construct() {
        $this->db = Db::conectar();
    }

    public function marcar_como_borrado($id) {
        //usamos update
        $sql = "UPDATE Clientes SET eliminado = 1 WHERE id_cliente = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function listar() {
        $sql = "SELECT * FROM Clientes WHERE eliminado = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_cliente($nombre, $correo, $telefono){
        $sql = "INSERT INTO Clientes (nombre_cliente, correo, telefono) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$nombre, $correo, $telefono]);
    }
}
?>