<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <div class="card-shadow ">
            <div class="card-header bg-dark text-center text-white border ">
                <h1>Categorías</h1>
            </div>
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>ID_Cat</th>
                            <th>Nombre_cat</th>
                            <th>Prioridad</th>
                        </tr>
                    </thead>
                    <tbody class="bg">
                        <?php
                        if(!empty($todasCategorias)):
                            foreach($todasCategorias as $cat):?>
                            <tr>
                                <td> <? echo $cat['id_categoria'] ?> </td>
                                <td> <? echo $cat['nom_cat'] ?> </td>
                                <td> <? echo $cat['prioridad'] ?> </td>
                            </tr>
                            <?
                            endforeach;
                        else: ?>    
                            <tr>
                                <td colspan="3">No hay categorias</td>
                            </tr>
                        <?
                        endif; ?>     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>