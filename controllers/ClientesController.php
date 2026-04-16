<?php
// controllers/ClientesController.php

// Esto busca el modelo de forma segura
require_once("models/Clientes.php");

class ClientesController {
    public function index() {
        $clienteModel = new Cliente();
        $listaClientes = $clienteModel->listar();
        
        // Carga la vista de clientes
        require_once("views/clientes/clientes_view.php");
    }
}

?>