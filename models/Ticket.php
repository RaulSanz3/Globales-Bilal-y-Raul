<?php

require_once(__DIR__ . '/db.php');

class Ticket
{
    private $db;

    public function __construct()
    {
        $this->db = Db::conectar();
    }

    public function listar_ticket($id_usuario, $rol, $tipo)
    {
        if ($rol === 'admin') {
            //el admin puede ver todos los tickets
            $sql = "SELECT * FROM Tickets ORDER BY id_ticket DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            
        } elseif ($tipo === 'empleado') {
            //el empelado ve solo los que le han asignado
            $sql = "SELECT * FROM Tickets WHERE id_empleado_tecnico = ? ORDER BY id_ticket DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_usuario]);
            
        } else {
            //el cliente ve solo los que él mismo ha creado
            $sql = "SELECT * FROM Tickets WHERE id_cliente = ? ORDER BY id_ticket DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id_usuario]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function crear_ticket($titulo, $id_cliente, $id_categoria, $descripcion, $id_empleado)
    {

        $fecha_creacion = date('Y-m-d H:i:s');
        $sql = "INSERT INTO Tickets (titulo, estado, descripcion, fecha_creacion, id_cliente, id_empleado_tecnico, id_categoria) 
                VALUES (?, 'Abierto', ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        //ejecutamos pasando los datos
        return $stmt->execute([
            $titulo,
            $descripcion,
            $fecha_creacion,
            $id_cliente,
            $id_empleado,
            $id_categoria
        ]);
    }


    public function cerrar_ticket($id_ticket) {
        $sql = "UPDATE Tickets SET estado = 'Cerrado' WHERE id_ticket = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_ticket]);
    }

    
    public function asignar_empleado($id_ticket, $id_empleado)
    {
        $sql = "UPDATE Tickets SET id_empleado_tecnico = ? WHERE id_ticket = ?";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([$id_empleado, $id_ticket]);
    }
}
