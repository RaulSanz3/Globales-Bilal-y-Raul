<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista departamentos</title>
</head>
<body>
    <h1>Departamentos del sistema</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre del departamento</th>
        </tr>
        <?php
        //este bucle hace por cada fila que enuentre en la lista la llama $dep y repite lo que sigue
            foreach ($todosDepartamentos as $dep): ?>
                <tr>
                    <!-- accedemos al valor de la columna id_dep de esa fila -->
                    <td><?php echo $dep['id_dep']; ?></td>
                    <td><?php echo $dep['nombre_dep']; ?></td>
                </tr>
            <!-- termina la repetición para esta fila, acontinuación empieza otra. -->
            <?php endforeach; ?>
    </table>
</body>
</html>