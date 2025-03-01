<?php
class ConexionModel {
    private $server = "db5017183609.hosting-data.io";
    private $username = "dbu2549607";
    private $pass = "byB3TBYXaYT7ll";
    private $db = "dbs13803192";
    private $port = 3306;
    private $connection;

    public function __construct() {
        try {
            $this->connection = new mysqli($this->server, $this->username, $this->pass, $this->db, $this->port);
        }catch(Exception $ex){
            if($this->connection->connect_error){
                echo "Error en la conexion " . $this->connection->connect_error;
            }else{
                echo "Excepcion capturada " . $ex->getMessage();
            }
            exit();
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}
?>