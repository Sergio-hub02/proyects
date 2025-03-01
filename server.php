<?php
require_once("ContactosServices.php");
$uri = "http://localhost/api_soap/";

$options = [
    "uri" => $uri,
    "exceptions" => null,
    "trace" => true
];

$server = new SoapServer(null, $options);
$server->setClass("ContactosServices");
$server->handle();
?>