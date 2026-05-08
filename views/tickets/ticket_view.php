<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-dark">Lista de Tickets</h1>
            <a href="index.php?action=nuevo_ticket" class="btn btn-primary shadow-sm">+ Nuevo Ticket</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="ps-3">#</th>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                                <th>Fecha Creación</th>
                                <th>Cliente</th>
                                <th>Técnico</th>
                                <th>Categoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            foreach ($todosTickets as $t):
                                //comprobamos si el ticket está cerrado
                                $esCerrado = (strtolower($t['estado']) == 'cerrado');
                            ?>
                                <!-- si está cerrado, le bajamos un poco la opacidad a toda la fila 
                                 para que se muestre la intención de no estar ya disponible -->
                                <tr class="<?php echo $esCerrado ? 'text-muted opacity-75' : ''; ?>">

                                    <td class="ps-3 fw-bold text-primary"><?php echo $num++; ?></td>
                                    <td class="text-muted small">#<?php echo $t['id_ticket']; ?></td>
                                    <td class="fw-semibold"><?php echo $t['titulo']; ?></td>

                                    <td class="<?php echo $esCerrado ? 'text-white fw-bold' : ''; ?>">
                                        <?php if ($esCerrado): ?>

                                            <span class="badge bg-danger">Cerrado</span>
                                        <?php else: ?>
                                            <span class="badge bg-info text-dark"><?php echo $t['estado']; ?></span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="text-truncate" style="max-width: 200px;"><?php echo $t['descripcion']; ?></td>
                                    <td class="small text-secondary"><?php echo date('d/m/Y H:i', strtotime($t['fecha_creacion'])); ?></td>
                                    <td><?php echo $t['id_cliente']; ?></td>

                                    <td>
                                        <?php if (empty($t['id_empleado_tecnico'])): ?>

                                            <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?>                        
                                            <a href="index.php?action=asignar_tecnico&id=<?php echo $t['id_ticket']; ?>" class="btn btn-warning btn-sm shadow-sm">
                                                Asignar Técnico
                                            </a>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Sin asignar</span>
                                            <?php endif; ?>

                                        <?php else: ?>

                                            <span class="fw-bold text-success d-block mb-1">Técnico: <?php echo $t['id_empleado_tecnico']; ?></span>
                                            
                                            <!-- botón para cerrar el ticket (solo sale si no está cerrado ya) -->
                                            <?php if (!$esCerrado): ?>
                                                <?php if ($_SESSION['usuario_tipo'] === 'empleado' || (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin')): ?>
                                                    <a href="index.php?action=cerrar_ticket&id=<?php echo $t['id_ticket']; ?>"
                                                        class="btn btn-dark btn-sm shadow-sm"
                                                        onclick="return confirm('¿Estás seguro de marcar este ticket como finalizado?');">
                                                        ✓ Terminar
                                                    </a>
                                                <?php else: ?>
                                                    <span class="badge bg-info">En proceso</span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <td>
                                        <span class="badge border text-dark bg-light">
                                            <?php echo $t['id_categoria']; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3 text-end text-muted small">
            Total de tickets encontrados: <?php echo count($todosTickets); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>