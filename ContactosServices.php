<?php

class ContactosServices{
    private $connection;

    public function __construct() {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "agenda";

        try {
            $this->connection = new mysqli($server, $username, $pass, $db);
        }catch(Exception $ex){
            if($this->connection->connect_error){
                echo "Error en la conexion " . $this->connection->connect_error;
            }else{
                echo "Excepcion capturada " . $ex->getMessage();
            }
            exit();
        }
    }

    public function addContact($nombre, $email, $telefono, $direccion){
        $consulta = "INSERT INTO contactos (nombre, email, tlf, direccion) VALUES (?,?,?,?)";
        $stmt = $this->connection->prepare($consulta);
        $stmt->bind_param("ssss", $nombre, $email, $telefono, $direccion);
        $stmt->execute();
    }

    public function retrieveContacts(){
        $consulta = "SELECT * FROM contactos";
        $stmt = $this->connection->prepare($consulta);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteContact($id){
        $consulta = "DELETE FROM contactos WHERE id_contacto = ?";
        $stmt = $this->connection->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function retrieveContact($id){
        $consulta = "SELECT * FROM contactos WHERE id_contacto = ?";
        $stmt = $this->connection->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function updateContact($id, $nombre, $email, $telefono, $direccion){
        $consulta = "UPDATE contactos SET nombre = ?, email = ?, tlf = ?, direccion = ? WHERE id_contacto = ?"; 
        $stmt = $this->connection->prepare($consulta);
        $stmt->bind_param("ssssi", $nombre, $email, $telefono, $direccion, $id);
        $stmt->execute();
    }
}

?>