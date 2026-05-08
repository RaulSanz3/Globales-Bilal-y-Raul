<?php
class AuthController {

    //muestra la pantalla de login que hemos creado
    public function mostrar_login() {
        require_once("views/login.php");
    }

    //procesa el formulario
    public function procesar_login() {
        
        require_once("models/Autenticar.php");
        
        $authObj = new Autenticar(); 

        //recogemos los datos
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = $authObj->verificar_usuario($email, $password);

        require_once("models/Autenticar.php");
        $autenticarObj = new Autenticar();
        
        $usuario = $autenticarObj->verificar_usuario($email, $password);

        if ($usuario) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'] ?? $usuario['nombre_completo'] ?? $usuario['nombre_cliente'] ?? 'Usuario';
            $_SESSION['usuario_rol'] = strtolower($usuario['rol'] ?? 'cliente');
            $_SESSION['usuario_tipo'] = $usuario['tipo'];

            header("Location: index.php?action=inicio"); 
            exit();
        } else {
            header("Location: index.php?action=login&error=1");
            exit();
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }

    //muestra la pantalla del formulario
    public function mostrar_registro() {
        require_once("views/registro.php");
    }

    //recoge los datos del formulario y los guarda
    public function procesar_registro() {
        require_once("models/Autenticar.php");
        
        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $authObj = new Autenticar();
        $exito = $authObj->registrar_cliente($nombre, $email, $telefono, $password);

        if ($exito) {
            //si funciona bien, lo mandamos al login con un mensaje
            header("Location: index.php?action=login&registro_exito=1");
        } else {
            //si falla, lo devolvemos al registro
            header("Location: index.php?action=registro&error=1");
        }
        exit();
    }
}
?>