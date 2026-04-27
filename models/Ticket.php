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
        // Usamos * para evitar errores de nombres de columnas por ahora
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
        // Hacemos el INSERT. Ponemos el estado 'Abierto' por defecto al crearlo.
        $sql = "INSERT INTO Tickets (titulo, estado, descripcion, fecha_creacion, id_cliente, id_empleado_tecnico, id_categoria) 
                VALUES (?, 'Abierto', ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        // Ejecutamos pasando los datos limpios (así evitamos hackeos)
        return $stmt->execute([
            $titulo,
            $descripcion,
            $fecha_creacion,
            $id_cliente,
            $id_empleado,
            $id_categoria
        ]);
    }
}
