<?php
class StaticConexionModel
{

    private static $server = "localhost";
    private static $username = "root";
    private static $pass = "";
    private static $db = "agenda";
    private static $staticConnection;

    public static function staticConnection(){
        if(self::$staticConnection === null) {
            self::$staticConnection = new mysqli(self::$server, self::$username, self::$pass, self::$db);
            if(self::$staticConnection->connect_error){
                die("Error de conexion " . self::$staticConnection->connect_error);
            }
        }
        return self::$staticConnection;
    }
}
