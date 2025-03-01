<?php
    require_once __DIR__ . "/../Models/ConexionModel.php";
class LogsModel {

    // private $server = "localhost";
    // private $username = "root";
    // private $pass = "";
    // private $db = "logs";
    private $connection;

    // public function __construct() {
    //     try {
    //         $this->connection = new mysqli($this->server, $this->username, $this->pass, $this->db);
    //     }catch(Exception $ex){
    //         if($this->connection->connect_error){
    //             echo "ERROR en la conexion " . $this->connection->connect_error;
    //         }else{
    //             echo "Excepcion " . $ex->getMessage();
    //         }
    //         exit();
    //     }
    // }

   public function __construct() {
    $this->connection = (new ConexionModel())->getConnection();
   }

   public function addLog($tipo_consulta, $id){
        $consulta = "INSERT INTO logs (tipo_consulta, contacto_espect) VALUES (?, ?)";
        $stmt = $this->connection->prepare($consulta);
        $stmt->bind_param("ss", $tipo_consulta, $contacto);
        $stmt->execute();
   }
}
?>