<?php
// controllers/ClientesController.php

// Esto busca el modelo de forma segura
require_once("models/Clientes.php");

class ClientesController
{
    public function listar_clien()
    {
        $clienteModel = new Cliente();
        $listaClientes = $clienteModel->listar();

        // Carga la vista de clientes
        require_once("views/clientes/clientes_view.php");
    }

    //mostar el formulario del cliente
    public function mostrarformulario_cliente()
    {
        include_once("views/clientes/formulario_cliente.php");
    }

    public function guardar()
    {
        $nombre = $_POST['nombre_cliente'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $telefono = $_POST['telefono'] ?? '';

        // 2. Pequeño seguro por si llega vacío
        if (empty($nombre)) {
            echo "<div class='alert alert-warning'>El nombre del cliente es obligatorio.</div>";
            return;
        }

        // 3. Llamamos al modelo
        require_once("models/Clientes.php");
        $clienteObj = new Cliente();

        // 4. Se lo pasamos al modelo para que lo guarde
        $guardado = $clienteObj->crear_cliente($nombre, $correo, $telefono);

        // 5. Redirección a la tabla
        if ($guardado) {
            header("Location: index.php?action=ver_clientes");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error al guardar el cliente en la BD.</div>";
        }
    }

    public function eliminar()
    {
        $id = $_GET['id'] ?? null;

        if ($id) {
            require_once("models/Clientes.php");
            $clienteObj = new Cliente();
            $clienteObj->marcar_como_borrado($id);
        }

        // Al terminar, volvemos a la lista de clientes
        header("Location: index.php?action=ver_clientes");
        exit();
    }
}
