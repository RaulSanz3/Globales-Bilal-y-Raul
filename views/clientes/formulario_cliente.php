<!DOCTYPE html>
<html>
<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">🏢 Registrar Nueva Empresa / Cliente</h4>
    </div>
    <div class="card-body">
        <form action="index.php?action=guardar_cliente" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Nombre de la Empresa/Cliente</label>
                <input type="text" name="nombre_cliente" class="form-control" required placeholder="Ej: Globales Informática">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Correo Electrónico</label>
                    <input type="email" name="correo" class="form-control" required placeholder="contacto@empresa.com">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" required placeholder="Ej: 900 123 456">
                </div>
            </div>

            <div class="text-end mt-3">
                <a href="index.php?action=ver_clientes" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">💾 Guardar Cliente</button>
            </div>
        </form>
    </div>
</div>

</html>