<?php
//Realizar la conexion a la base de datos

//Datos de conexion

$host = "localhost";
$port = "3306";
$usuario = "root";
$password = "";
$base_de_datos = "lista_espera";

//Intentar la conexiongi

try {
    $conectar = new PDO("mysql:host=$host;port=$port;dbname=$base_de_datos", $usuario, $password);
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $conectar->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// En caso de error, se captura la excepcion
} catch (PDOException $error) {
    echo $error->getMessage();
    die;
}
