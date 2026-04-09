<?php
define("DB_HOST", "db");
define("DB_NAME", "sistema_tickets");
define("DB_USER", "root");
define("DB_PASSWORD", "admin");

class Db {
    private $host;
    private $dbname;
    private $user;
    private $password;

    public $db_handler; // variable pública para manejar la conexión a la base de datos
						// necesaria si empleamos el constructor para la conexión

    
    public function __construct() {
    $this->host = DB_HOST;
    $this->dbname = DB_NAME;
    $this->user = DB_USER;
    $this->password = DB_PASSWORD;
                    
                    
    try {
        $dns = 'mysql:host='.$this->host.'; dbname='.$this->dbname;
        $this->db_handler = new PDO($dns, $this->user, $this->password);
        //echo "Conexión realizada";
    } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
    }
    }                    
                    
    public static function conectar() {
    
    try {
        $pdo = new PDO('mysql:host='. DB_HOST .'; dbname='. DB_NAME, DB_USER, DB_PASSWORD);
        //echo "Conexión realizada";
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $pdo;
        }
                    
}
                    
                    
/* 1 - Conectarnos con el constructor */
                    
$conexion = new Db();
// Si quisiérmanos tener la conexión podríamos acceder al atributo público $db_handler, veamos el siguiente ejemplo:
if ($conexion->db_handler!=null) {
    //echo "<br>Método constructor: Podemos trabajar con la conexión mediante su atributo público \$db_handler -
         // Confirmación de conexión realizada<br>";
}

//echo "**********************************************************************************<br>";
                    
/* 2 - Conectarnos con el método estático 'conectar' que retorna la conexión y en un principio no necesitamos
acceder al atributo público $db_handler.
/* ***************************************************************************************** */

$conexion = Db::conectar();
if ($conexion != null) {
//echo "<br>Método estático conectar - Confirmación de conexión realizada<br>";
}
         
?>