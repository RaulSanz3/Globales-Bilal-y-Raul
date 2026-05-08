<div class="card shadow-lg border-0">

    <div class="card-header bg-primary text-white p-3">
        <h4 class="mb-0">Nuevo Reporte de Incidencia</h4>
    </div>

    <div class="card-body p-4">
        <form action="index.php?action=guardar_ticket" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Asunto del problema</label>
                <input type="text" name="asunto" class="form-control" placeholder="Ej: No funciona la impresora" required>
            </div>


            <div class="row">
                <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] === 'admin'): ?>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Cliente</label>
                        <select name="id_cliente" class="form-select" required>
                            <option value="">Selecciona al cliente...</option>

                            <?php foreach ($clientes as $c): ?>
                                <option value="<?= $c['id_cliente'] ?>"><?= $c['nombre_cliente'] ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                <?php else: ?>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Remitente</label>
                        <input type="hidden" name="id_cliente" value="<?= $_SESSION['usuario_id'] ?>">
                        
                        <input type="text" class="form-control text-muted bg-light" value="<?= $_SESSION['usuario_nombre'] ?>" disabled>
                        <small class="text-muted">El ticket se registrará automáticamente a tu nombre.</small>
                    </div>

                <?php endif; ?>



                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Categoría</label>
                    <select name="id_categoria" class="form-select" required>
                        <option value="">¿De qué tipo es?</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= $cat['id_categoria'] ?>"><?= $cat['nom_cat'] ?> <?= $cat['prioridad'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descripción detallada</label>
                    <textarea name="descripcion" class="form-control" rows="4" placeholder="Describe qué ha pasado..."></textarea>
                </div>

                <div class="text-end">
                    <button type="reset" class="btn btn-light">Limpiar</button>
                    <button type="submit" class="btn btn-primary px-5">Enviar Ticket</button>
                </div>
        </form>
    </div>
</div>