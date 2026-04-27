<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Soporte Técnico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-menu {
            transition: transform 0.3s;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .card-menu:hover {
            transform: translateY(-10px);
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-5 shadow">
        <div class="container">
            <span class="navbar-brand mb-0 h1">SISTEMA DE TICKETS</span>
        </div>
    </nav>

    <div class="container text-center">
        <h2 class="mb-5 fw-bold">¿Qué quieres gestionar hoy?</h2>

        <div class="row g-4 justify-content-center">
            <div class="col-md-3">
                <a href="index.php?action=nuevo_ticket" class="card card-menu shadow-sm border-primary h-100 p-4">
                    <div class="display-4 text-primary">📩</div>
                    <h3 class="h5 mt-3">Reportar Problema</h3>
                    <p class="text-muted small">Registra una incidencia nueva</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="index.php?action=ver_tickets" class="card card-menu shadow-sm h-100 p-4">
                    <div class="display-4 text-warning">📋</div>
                    <h3 class="h5 mt-3">Ver Todos los Tickets</h3>
                    <p class="text-muted small">Consulta el estado de las tareas</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="index.php?action=ver_clientes" class="card card-menu shadow-sm h-100 p-4">
                    <div class="display-4 text-info">👤</div>
                    <h3 class="h5 mt-3">Gestión de Clientes</h3>
                    <p class="text-muted small">Administrar base de clientes</p>
                </a>
            </div>

            <div class="col-md-3">
                <a href="index.php?action=ver_empleados" class="card card-menu shadow-sm h-100 p-4">
                    <div class="display-4 text-success">👥</div>
                    <h3 class="h5 mt-3">Gestión de Personal</h3>
                    <p class="text-muted small">Lista de técnicos y departamentos</p>
                </a>
            </div>
        </div>

        <hr class="my-5">

        <div class="row">
            <div class="col-12 text-start">
                <?php
                try {
                    $action = $_GET['action'] ?? 'inicio';

                    switch ($action) {
                        case 'nuevo_ticket':
                            require_once("controllers/TicketController.php");
                            (new TicketController())->mostrar_formulario();
                            break;
                            
                        case 'guardar_ticket':
                            require_once("controllers/TicketController.php");
                            (new TicketController())->guardar();
                            break;

                        case 'ver_tickets':
                            require_once("controllers/TicketController.php");
                            (new TicketController())->listar_tick();
                            break;
                            
                        case 'ver_empleados':
                            require_once("controllers/EmpleadoController.php");
                            (new EmpleadoController())->listar_emp();
                            break;

                        // NUEVOS: Casos para Clientes
                        case 'ver_clientes':
                            require_once("controllers/ClientesController.php");
                            (new ClientesController())->listar_clien();
                            break;


                        case 'eliminar_cliente':
                            require_once("controllers/ClientesController.php");
                            (new ClientesController())->eliminar();
                             break;

                            case 'nuevo_cliente':
                             require_once("controllers/ClientesController.php");
                            (new ClientesController())->mostrarformulario_cliente();
                            break;

                            case 'guardar_cliente':
                                require_once("controllers/ClientesController.php");
                                (new ClientesController())->guardar();
                                break;

                        default:
                            echo '<div class="alert alert-info text-center">Selecciona una opción arriba para empezar.</div>';
                            break;
                    }
                } catch (Throwable $e) {
                    echo "<div class='alert alert-danger p-4 shadow'>";
                    echo "<h4 class='text-danger fw-bold'>🚨 ¡Ups! Algo ha fallado al cargar esta sección</h4>";
                    echo "<strong>Error exacto:</strong> " . $e->getMessage() . "<br><br>";
                    echo "<strong>Archivo culpable:</strong> " . $e->getFile() . "<br>";
                    echo "<strong>Línea:</strong> " . $e->getLine();
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>