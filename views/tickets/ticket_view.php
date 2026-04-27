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
                            foreach ($todosTickets as $t): ?>
                                <tr>
                                    <td class="ps-3 fw-bold text-primary"><?php echo $num++; ?></td>

                                    <td class="text-muted small">#<?php echo $t['id_ticket']; ?></td>

                                    <td class="fw-semibold"><?php echo $t['titulo']; ?></td>

                                    <td>
                                        <span class="badge bg-info text-dark">
                                            <?php echo $t['estado']; ?>
                                        </span>
                                    </td>

                                    <td class="text-truncate" style="max-width: 200px;">
                                        <?php echo $t['descripcion']; ?>
                                    </td>

                                    <td class="small text-secondary">
                                        <?php echo date('d/m/Y H:i', strtotime($t['fecha_creacion'])); ?>
                                    </td>

                                    <td><?php echo $t['id_cliente']; ?></td>

                                    <td>
                                        <?php echo $t['id_empleado_tecnico'] ?: '<span class="text-danger italic">Sin asignar</span>'; ?>
                                    </td>

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