<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Nuevo Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card shadow p-4" style="width: 100%; max-width: 500px;">
        <h2 class="text-center mb-4 text-primary">Crear Cuenta</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center">
                El correo electrónico ya está registrado o hubo un error.
            </div>
        <?php endif; ?>

        <form action="index.php?action=procesar_registro" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Nombre Completo</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ej: Bilal El Kadi" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Correo Electrónico</label>
                <input type="email" name="email" class="form-control" placeholder="tu@email.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Teléfono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Ej: 600 123 456" required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold mb-3">Registrarme</button>
            
            <div class="text-center">
                <a href="index.php?action=login" class="text-decoration-none">¿Ya tienes cuenta? Inicia sesión aquí</a>
            </div>
        </form>
    </div>

</body>
</html>