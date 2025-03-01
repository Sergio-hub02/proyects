<?php
    require_once __DIR__ . "/../Models/AgendaModel.php";
    require_once __DIR__ . "/../Models/LogsModel.php";
    class AgendaController {
        private $agendaModel;

        private $logsModel;

        private $connection;

        private $cliente;

        public function __construct() {
            $this->agendaModel = new AgendaModel();
            $this->logsModel = new LogsModel();
            $this->connection = $this->agendaModel->getConnection();
            $options = [
                "location" => "http://localhost/api_soap/server.php",
                "uri" => "http://localhost/api_soap"
            ];
            $this->cliente = new SoapClient(null, $options);
        }

        public function addContact($nombre, $email, $telefono, $direccion){
            return $this->agendaModel->addContact($nombre, $email, $telefono, $direccion);
        }

        public function addLog($tipo_consulta, $contacto){
            return $this->logsModel->addLog($tipo_consulta, $contacto);
        }

        public function updateContact($id, $nombre, $email, $telefono, $direccion){
            return $this->agendaModel->updateContact($id, $nombre, $email, $telefono, $direccion);
        }

        public function retrieveContacts(){
            // return $this->cliente->retrieveContacts();
            return $this->agendaModel->retrieveContacts();
        }
        public function retrieveContact($id){
            return $this->agendaModel->retrieveContact($id);
        }
        public function deleteAllContacts(){
            $consulta = $this->agendaModel->retrieveNumOfContacts();
            if($consulta->num_rows === 0){
                echo "Contactos ya eliminados";
            }else {
                $this->agendaModel->deleteAllContacts();
            }
        }

        public function deleteContact($id){
            try {
                $this->connection->begin_transaction();
                $this->agendaModel->deleteContact($id);
                $this->connection->commit();
                Echo "hecho";
            }catch(Exception){
                if($this->connection->commit()){ 
                    echo "<br>Error en la transaccion<br>";
                }else{ 
                    if($this->connection->rollback()){
                        echo "<br>Rollback ejecutado correctamente";
                    }else{
                        echo "<br>Error al ejecutar el rollback";
                    }
                }
            }  
        }
    }
?>