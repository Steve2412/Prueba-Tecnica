<?php
//Realizar la conexion a la base de datos


try {
    $conectar = new PDO('mysql:host=localhost;port=3306;dbname=lista_espera', 'root', '');
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $conectar->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// En caso de error, se captura la excepcion
} catch (PDOException $error) {
    echo $error->getMessage();
    die;
}
