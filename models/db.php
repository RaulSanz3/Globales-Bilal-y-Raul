<?php
define("DB_HOST", "lldn559.servidoresdns.net");
define("DB_NAME", "qaqg503");
define("DB_USER", "qaqg503");
define("DB_PASSWORD","+fSS97a@LKUV#VY");

class Db {
    // Usaremos preferiblemente el método estático para el MVC
    public static function conectar() {
        try {
            // Añadimos el charset utf8 para que las tildes y eñes se vean bien
            $dns = 'mysql:host='.DB_HOST .';dbname='.DB_NAME.'; charset=utf8';
            $pdo = new PDO($dns, DB_USER, DB_PASSWORD);
            
            // Esto es vital para que PHP te avise si hay errores en tus SQL
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;
        } catch (PDOException $e) {
            // Si falla, te dirá exactamente por qué
            die("Error de conexión: " . $e->getMessage());
        }
    }
}   
         
?>