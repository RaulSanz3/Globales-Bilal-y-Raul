<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Sistema de Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
        }
    </style>
</head>

<body>

    <div class="card shadow-lg border-0 login-card p-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Soporte Técnico</h2>
            <p class="text-muted">Introduce tus credenciales para acceder</p>
        </div>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center">
                Correo o contraseña incorrectos. Inténtalo de nuevo.
            </div>
        <?php endif; ?>
        <!-- el formulario enviará los datos a nuestra nueva ruta procesar_login -->
        <form action="index.php?action=procesar_login" method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Correo Electrónico</label>
                <input type="email" name="email" class="form-control form-control-lg" required placeholder="ejemplo@correo.com">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Contraseña</label>
                <input type="password" name="password" class="form-control form-control-lg">
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-lg shadow-sm">Entrar al Sistema</button>
            
            <div class="text-center mt-3">
                <a href="index.php?action=registro" class="text-decoration-none">¿No tienes cuenta? Regístrate aquí</a>
            </div>
        </form>
    </div>

</body>

</html>