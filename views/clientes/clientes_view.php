<!DOCTYPE html>
<html>

<head>
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Clientes</h2>
        <a href="index.php?action=nuevo_cliente" class="btn btn-primary shadow-sm">
            + Añadir Cliente
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover w-100 mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Verificamos si la variable existe y tiene datos
                        if (!empty($listaClientes)) {
                            foreach ($listaClientes as $c):
                        ?>
                                <tr>
                                    <td class="ps-3 fw-bold"><?php echo $c['id_cliente']; ?></td>
                                    <td><?php echo $c['nombre_cliente']; ?></td>
                                    <td><?php echo $c['correo']; ?></td>
                                    <td><?php echo $c['telefono']; ?></td>
                                    <td class="text-center">
                                        <a href="index.php?action=eliminar_cliente&id=<?php echo $c['id_cliente']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar este cliente?');">
                                            Borrar
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        } else {
                            ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    No hay clientes registrados todavía. ¡Añade el primero!
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>