<?php
// controllers/TicketController.php

// 1. Cargamos el modelo (Cuidado con las mayúsculas/minúsculas)
include_once("models/Ticket.php");


class TicketController {
    public function listar_tick(){

        require_once("models/Categoria.php");

        //creamos el objeto Ticket
        $tickObj = new Ticket();

        //obtenemos los datos
        $todosTickets = $tickObj->listar_ticket();

        //cargamos la vista pasándole la variable
        include_once("views/tickets/ticket_view.php");
    }

    public function mostrar_formulario() {
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


    public function guardar() {
        //recogemos los datos que envía el formulario por POST
        $titulo = $_POST['asunto'] ?? '';
        $id_cliente = $_POST['id_cliente'] ?? '';
        $id_categoria = $_POST['id_categoria'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';

        $id_empleado_asignado = NULL;

        //llamamos al modelo para que lo guarde en la Base de Datos
        require_once("models/Ticket.php");
        $tickObj = new Ticket();

        $guardado = $tickObj->crear_ticket($titulo, $id_cliente, $id_categoria, $descripcion, $id_empleado_asignado);


        //si se guarda bien se manda automáticamente a la pantalla de "Ver Tickets"
        if ($guardado) {
            header("Location: index.php?action=ver_tickets");
            exit();
        } else {
            echo "Error al guardar el ticket en la base de datos.";
        }
    }

    //muestra la pantalla para elegir técnico
    public function pantalla_asignar() {
        $id_ticket = $_GET['id'] ?? null;

        if (!$id_ticket) {
            echo "Error: Falta el ID del ticket.";
            return;
        }

        //aquí traemos a los empleados para rellenar el menú desplegable
        require_once("models/Empleado.php");
        $empObj = new Empleado();
        $empleados = $empObj->listar_empleados(); //usamos la función de listar empleados

        include_once("views/tickets/asignar_tecnico.php");
    }

    //guarda el cambio en la base de datos
    public function guardar_asignacion() {
        $id_ticket = $_POST['id_ticket'];
        $id_empleado = $_POST['id_empleado'];

        require_once("models/Ticket.php");
        $tickObj = new Ticket();

        // Llamamos a la función mágica que haremos en el Paso 4
        $tickObj->asignar_empleado($id_ticket, $id_empleado);

        // Volvemos a la lista
        header("Location: index.php?action=ver_tickets");
        exit();
    }

    public function marcar_cerrado() {
        $id_ticket = $_GET['id'] ?? null;
        
        if ($id_ticket) {
            require_once("models/Ticket.php");
            $tickObj = new Ticket();
            $tickObj->cerrar_ticket($id_ticket);
        }
        
        // Volvemos a la lista para ver el cambio instantáneo
        header("Location: index.php?action=ver_tickets");
        exit();
    }
}
