<?php
// controllers/TicketController.php

// 1. Cargamos el modelo (Cuidado con las mayúsculas/minúsculas)
include_once("models/Ticket.php");


class TicketController
{
    public function listar_tick()
    {
        require_once("models/Categoria.php");
        // 2. Creamos el objeto Ticket (La clase en models/Ticket.php debe llamarse "Ticket")
        $tickObj = new Ticket();

        // 3. Obtenemos los datos
        $todosTickets = $tickObj->listar_ticket();

        // 4. Cargamos la vista pasándole la variable
        include_once("views/tickets/ticket_view.php");
    }

    public function mostrar_formulario()
    {
        require_once("models/Clientes.php");
        require_once("models/Categoria.php");

        $clienteModelo = new Cliente();
        $categoriaModelo = new Categoria();

        $clientes = $clienteModelo->listar();
        $categorias = $categoriaModelo->listar_categoria();

        // var_dump($clientes);
        // die();

        include_once("views/tickets/formulario_ticket.php");
    }


    public function guardar()
    {
        // 1. Recogemos los datos que envía el formulario por POST
        $titulo = $_POST['asunto'] ?? '';
        $id_cliente = $_POST['id_cliente'] ?? '';
        $id_categoria = $_POST['id_categoria'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';


        // 2. Lógica para elegir empleado AL AZAR
        require_once("models/Empleado.php");
        $empleadoModelo = new Empleado();
        $listaEmpleados = $empleadoModelo->listar_empleados();

        if (!empty($listaEmpleados)) {
            // Elegimos un índice al azar de la lista de empleados
            $indiceAzar = array_rand($listaEmpleados);
            $id_empleado_azar = $listaEmpleados[$indiceAzar]['id_emp'];
        } else {
            $id_empleado_azar = NULL; // Por si no tienes empleados en la BD
        }


        // 3. Llamamos al modelo para que lo guarde en la Base de Datos
        require_once("models/Ticket.php");
        $tickObj = new Ticket();
        $guardado = $tickObj->crear_ticket($titulo, $id_cliente, $id_categoria, $descripcion, $id_empleado_azar);


        // 4. Si se guarda bien, te mandamos automáticamente a la pantalla de "Ver Tickets"
        if ($guardado) {
            header("Location: index.php?action=ver_tickets");
            exit();
        } else {
            echo "Error al guardar el ticket en la base de datos.";
        }
    }
}
