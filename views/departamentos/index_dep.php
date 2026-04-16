<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h1 class="h3 mb-0">Departamentos del sistema</h1>
            </div>

            <div class="card-body">
                <table class="table table-hover table-striped mb-0 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre del departamento</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (!empty($todosDepartamentos)):
                            //este bucle hace por cada fila que enuentre en la lista la llama $dep y repite lo que sigue
                            foreach ($todosDepartamentos as $dep): ?>
                                <tr>
                                    <!-- accedemos al valor de la columna id_dep de esa fila -->
                                    <td class="fw-bold"><?php echo $dep['id_dep']; ?></td>
                                    <td><?php echo $dep['nombre_dep']; ?></td>
                                </tr>
                                <!-- termina la repetición para esta fila, acontinuación empieza otra. -->
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2" class="text-center text-muted p-4">
                                    No hay departemntos registrados o la conexión falló.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>