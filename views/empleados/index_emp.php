<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- <? var_dump($todosEmpleados); ?> -->
    <div class="container mt-5">
    <div class="card-shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="text-center">Gestión de empleados</h1>
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Departamento</th>
                            <th>Nombre Departamento</th>
                        </tr>
                    </thead>
                    <tbody class="bg-info">
                        <?
                        if(!empty($todosEmpleados)):
                            foreach($todosEmpleados as $emp):?>
                            <tr>
                                <td><? echo $emp['id_emp']; ?></td>
                                <td><? echo $emp['nombre_completo'] ?></td>
                                <td><? echo $emp['email'] ?></td>
                                <td><? echo $emp['id_dep'] ?></td>
                                <td>
                                    <!-- <? echo $emp['nombre_dep'] ?> -->
                                    <?= !empty($emp['nombre_dep']) ? $emp['nombre_dep'] : 'Sin asignar' ?>
                                </td>
                            </tr>
                            <? 
                            endforeach;  
                        else: ?>
                            <tr>
                                <td colspan="5" class="text-center p-5">No hay empleados.</td>
                            </tr>
                        <?
                        endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
</html>