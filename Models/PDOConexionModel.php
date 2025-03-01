<?php

class PDOConexionModel
{
    private $server = "localhost";
    private $username = "root";
    private $pass = "";
    private $db = "agenda";
    private $connectionPDO;

    public function __construct()
    {
        try {
            $this->connectionPDO = new PDO("mysql:host=$this->server;dbname=$this->db;charset=utf8", $this->username, $this->pass);
            $this->connectionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connectionPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $ex){
            throw new Exception("Error al conectar con agenda" . $ex->getMessage());
        }
    }

    public function getConnectionPDO(){
        return $this->connectionPDO;
    }
}
