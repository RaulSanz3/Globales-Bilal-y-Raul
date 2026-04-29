<?php

require_once(__DIR__ . '/db.php');

class Ticket
{
    private $db;

    public function __construct()
    {
        $this->db = Db::conectar();
    }

    public function listar_ticket()
    {
        $sql = "SELECT Tickets.*, Clientes.nombre_cliente, Empleados.nombre_completo, Categorias.nom_cat 
                    FROM Tickets
                        LEFT JOIN Clientes on Tickets.id_cliente = Clientes.id_cliente
                            LEFT JOIN Empleados on Tickets.id_empleado_tecnico = Empleados.id_emp
                                LEFT JOIN Categorias on Tickets.id_categoria = Categorias.id_categoria";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
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
        // Ojo al orden: primero el empleado (que va al primer ?), luego el ticket (al segundo ?)
        return $stmt->execute([$id_empleado, $id_ticket]);
    }
}
