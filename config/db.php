<?php
    class db{
    private static $instance;
    private $host="localhost";
    private $dbname="proyect";
    private $user="root";
    private $password="";

    private function __construct() {
        // Constructor privado para evitar la creación de instancias desde fuera de la clase
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function conexion(){
        try {
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
?>