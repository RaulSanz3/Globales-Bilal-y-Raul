<div class="container mt-5" style="max-width: 500px;">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">👨‍🔧 Asignar Técnico al Ticket #<?php echo $id_ticket; ?></h4>
        </div>
        <div class="card-body">
            <form action="index.php?action=guardar_asignacion" method="POST">
                
                <!-- ocultamos el ID para que el Controlador sepa qué ticket actualizar -->
                <input type="hidden" name="id_ticket" value="<?php echo $id_ticket; ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">Selecciona el Técnico Disponible:</label>
                    <select name="id_empleado" class="form-select" required>
                        <option value="">-- Elige un técnico --</option>
                        <?php foreach($empleados as $emp): ?>
                            <!-- Ajusta 'id_empleado' y 'nombre' según las columnas de tu tabla de personal -->
                            <option value="<?php echo $emp['id_emp']; ?>">
                                <?php echo $emp['nombre_completo']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="text-end mt-4">
                    <a href="index.php?action=ver_tickets" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Asignación</button>
                </div>
            </form>
        </div>
    </div>
</div>
