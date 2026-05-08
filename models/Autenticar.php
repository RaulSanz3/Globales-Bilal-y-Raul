<?php

require_once(__DIR__ . '/db.php'); 

class Autenticar {
    private $db;

    public function __construct() {
         try {
            $this->db = Db::conectar();
        } catch (Throwable $e) {
            echo "<h3 style='color:red;'>🚨 Error en Autenticar:</h3>";
            echo "<strong>Mensaje:</strong> " . $e->getMessage() . "<br>";
            echo "<strong>Archivo:</strong> " . $e->getFile() . " (Línea " . $e->getLine() . ")";
            exit();
        }
    }

    public function verificar_usuario($email, $password) {
        $email = trim($email);
        $password = trim($password);
        //buscamos primero en Empleados
        $sql1 = "SELECT id_emp AS id, nombre_completo AS nombre, rol, email, password 
                    FROM Empleados 
                        WHERE email = ? AND password = ?";
        $stmt1 = $this->db->prepare($sql1);
        $stmt1->execute([$email, $password]);
        $empleado = $stmt1->fetch(PDO::FETCH_ASSOC);

        if ($empleado) {
            //le añadimos una etiqueta para saber que es empleado
            $empleado['tipo'] = 'empleado'; 
            return $empleado; 
        }

        //si no es empleado, buscamos en Clientes
        $sql2 = "SELECT id_cliente AS id, nombre_cliente AS nombre, email, telefono, password, eliminado 
                    FROM Clientes 
                        WHERE email = ? AND password = ?";
        $stmt2 = $this->db->prepare($sql2);
        $stmt2->execute([$email, $password]);
        $cliente = $stmt2->fetch(PDO::FETCH_ASSOC);

        if ($cliente) {
            //los clientes no tienen rol en la BD
            $cliente['rol'] = 'cliente'; 
            $cliente['tipo'] = 'cliente';
            return $cliente;
        }

        return false;
    } 
    
    public function registrar_cliente($nombre, $email, $telefono, $password) {
        try {
            //comprobamos si el correo ya existe para no tener duplicados
            $sql_check = "SELECT id_cliente FROM Clientes WHERE email = ?";
            $stmt_check = $this->db->prepare($sql_check);
            $stmt_check->execute([$email]);
            if ($stmt_check->fetch()) {
                return false; //el correo ya existe fallamos a propósito
            }

            //si no existe, lo insertamos en la tabla
            //por defecto eliminado = 0
            $sql = "INSERT INTO Clientes (nombre_cliente, email, telefono, password, eliminado) VALUES (?, ?, ?, ?, 0)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$nombre, $email, $telefono, $password]);
            
        } catch (PDOException $e) {
            return false;
        }
    }

}
?>