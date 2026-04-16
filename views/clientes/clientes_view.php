<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin: 20px auto; font-family: sans-serif; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Clientes - Base de Datos qaqg503</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
        </tr>
        <?php foreach ($listaClientes as $c): ?>
        <tr>
            <td><?= $c['id_cliente'] ?></td>
            <td><?= $c['nombre_cliente'] ?></td>
            <td><?= $c['correo'] ?></td>
            <td><?= $c['telefono'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>