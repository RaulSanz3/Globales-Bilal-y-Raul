<?php

session_start();

$action = $_GET['action'] ?? 'inicio';

if (!isset($_SESSION['usuario_id']) && !in_array($action, ['login', 'procesar_login', 'registro', 'procesar_registro'])) {
    header("Location: index.php?action=login");
    exit();
}

if ($action === 'registro') {
    require_once("controllers/AutenticacionController.php");
    (new AuthController())->mostrar_registro();
    exit();
}
if ($action === 'procesar_registro') {
    require_once("controllers/AutenticacionController.php");
    (new AuthController())->procesar_registro();
    exit();
}

if ($action === 'login') {
    require_once("controllers/AutenticacionController.php");
    (new AuthController())->mostrar_login();
    exit();
}
if ($action === 'procesar_login') {
    require_once("controllers/AutenticacionController.php");
    (new AuthController())->procesar_login();
    exit();
}
if ($action === 'logout') {
    require_once("controllers/AutenticacionController.php");
    (new AuthController())->logout();
    exit();
}

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
        <div class="container d-flex justify-content-between align-items-center">
            <span class="navbar-brand mb-0 h1">SISTEMA DE TICKETS</span>
            
            <!-- botón para cerrar sesión -->
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <div>
                    <span class="text-white me-3">
                        Hola, <?php echo $_SESSION['usuario_nombre']?>
                    </span>
                    <a href="index.php?action=logout" style="display: inline-block; padding: 10px 15px; background-color: #ff4d4d; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">Cerrar Sesión</a>
                </div>
            <?php endif; ?>

        </div>
    </nav>

    <div class="container text-center">
        <?php if ($action === 'inicio'): ?>

            <h2 class="mb-5 fw-bold">¿Qué quieres gestionar hoy?</h2>
            
            <hr class="my-5">

        <?php else: ?>
            <div class="text-start mb-4">
                <a href="index.php?action=inicio" class="btn btn-outline-secondary">← Volver al Menú Principal</a>
            </div>
        <?php endif; ?>

        <div class="row g-4 justify-content-center">
            <?php if ($_SESSION['usuario_tipo'] === 'cliente' || $_SESSION['usuario_rol'] === 'admin'): ?>
            <div class="col-md-3">
                <a href="index.php?action=nuevo_ticket" class="card card-menu shadow-sm border-primary h-100 p-4">
                    <div class="display-4 text-primary">📩</div>
                    <h3 class="h5 mt-3">Reportar Problema</h3>
                    <p class="text-muted small">Registra una incidencia nueva</p>
                </a>
            </div>
            <?php endif; ?>

            <div class="col-md-3">
                <a href="index.php?action=ver_tickets" class="card card-menu shadow-sm h-100 p-4">
                    <div class="display-4 text-warning">📋</div>
                    <h3 class="h5 mt-3">
                        <?php echo ($_SESSION['usuario_tipo'] === 'cliente') ? 'Mis Tickets' : 'Ver Todos los Tickets'; ?>
                    </h3>
                    <p class="text-muted small">Consulta el estado de las tareas</p>
                </a>
            </div>

            <?php if ($_SESSION['usuario_rol'] === 'admin'): ?>
            <div class="col-md-3">
                <a href="index.php?action=ver_clientes" class="card card-menu shadow-sm h-100 p-4">
                    <div class="display-4 text-info">👤</div>
                    <h3 class="h5 mt-3">Gestión de Clientes</h3>
                    <p class="text-muted small">Administrar base de clientes</p>
                </a>
            </div>
            <?php endif; ?>

            <?php if ($_SESSION['usuario_rol'] === 'admin'): ?>
            <div class="col-md-3">
                <a href="index.php?action=ver_empleados" class="card card-menu shadow-sm h-100 p-4">
                    <div class="display-4 text-success">👥</div>
                    <h3 class="h5 mt-3">Gestión de Personal</h3>
                    <p class="text-muted small">Lista de técnicos y departamentos</p>
                </a>
            </div>
            <?php endif; ?>

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
                            if ($_SESSION['usuario_rol'] !== 'admin') {
                                echo "<div class='alert alert-danger text-center shadow'>Acceso denegado. Solo administradores.</div>";
                                break;
                            }
                            require_once("controllers/EmpleadoController.php");
                            (new EmpleadoController())->listar_emp();
                            break;

                        case 'ver_clientes':
                            require_once("controllers/ClientesController.php");
                            (new ClientesController())->listar_clien();
                            break;


                        case 'eliminar_cliente':
                            if ($_SESSION['usuario_rol'] !== 'admin') {
                                echo "<div class='alert alert-danger text-center shadow'>Acceso denegado. Solo administradores.</div>";
                                break;
                            }
                            require_once("controllers/ClientesController.php");
                            $clienteController = new ClientesController();
                            if ($action === 'ver_clientes') $clienteController->listar_clien();
                            if ($action === 'nuevo_cliente') $clienteController->mostrarformulario_cliente();
                            if ($action === 'guardar_cliente') $clienteController->guardar();
                            if ($action === 'eliminar_cliente') $clienteController->eliminar();
                            break;

                        case 'nuevo_cliente':
                            require_once("controllers/ClientesController.php");
                            (new ClientesController())->mostrarformulario_cliente();
                            break;

                        case 'guardar_cliente':
                            require_once("controllers/ClientesController.php");
                            (new ClientesController())->guardar();
                            break;

                        case 'asignar_tecnico':
                            require_once("controllers/TicketController.php");
                            (new TicketController())->pantalla_asignar();
                            break;

                        case 'guardar_asignacion':
                            require_once("controllers/TicketController.php");
                            (new TicketController())->guardar_asignacion();
                            break;

                        case 'cerrar_ticket':
                            require_once("controllers/TicketController.php");
                            (new TicketController())->marcar_cerrado();
                            break;

                        default:
                            echo '<div class="alert alert-info text-center">Selecciona una opción arriba para empezar.</div>';
                            break;
                    }
                } catch (Throwable $e) {
                    //se ha usado estas líneas para encontrar los errores que nos salían
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