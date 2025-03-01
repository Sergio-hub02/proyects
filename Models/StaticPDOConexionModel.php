<?php
class StaticPDOConexionModel
{
    private static $server = "localhost";
    private static $username = "root";
    private static $pass = "";
    private static $db = "agenda";
    private static $staticPDOConnection;

    public static function getStaticPDOConnection(){
        if(self::$staticPDOConnection === null){
            self::$staticPDOConnection = new PDO("mysql:host=". self::$server . ",dbname=". self::$db .";charset=utf8", self::$username, self::$pass);
            self::$staticPDOConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$staticPDOConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            if(self::$staticPDOConnection->errorCode()){
                die("Error de conexion " . self::$staticPDOConnection->errorCode());
            }
        }
        return self::$staticPDOConnection;
    }
}
