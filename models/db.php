<?php
define("DB_HOST", "lldn559.servidoresdns.net");
define("DB_NAME", "qaqg503");
define("DB_USER", "qaqg503");
define("DB_PASSWORD","+fSS97a@LKUV#VY");

class Db {
    public static function conectar() {
        try {
            // 2. Arreglado el espacio del charset
            $dns = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            $pdo = new PDO($dns, DB_USER, DB_PASSWORD);
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;
            
        } catch (PDOException $e) {
            //si algo falla, nos lo dirá en pantalla
            die("<h2 style='color:red;'>Error de Base de Datos: " . $e->getMessage() . "</h2>");
        }
    }
}
         
?>