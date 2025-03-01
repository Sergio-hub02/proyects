<?php

    require_once __DIR__ . "/../Models/ConexionModel.php";
class AgendaModel {
    private $connection;

    public function __construct() {
        $this->connection = (new ConexionModel())->getConnection();
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
    public function retrieveNumOfContacts(){
        return $this->connection->query("SELECT * FROM contactos");
        // return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteContact($id){
        $consulta = "DELETE FROM contactos WHERE id_contacto = ?";
        $stmt = $this->connection->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    public function deleteAllContacts(){
        $consulta = "DELETE FROM contactos";
        $stmt = $this->connection->prepare($consulta);
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

    public function getConnection(){
        return $this->connection;
    }
}
?>