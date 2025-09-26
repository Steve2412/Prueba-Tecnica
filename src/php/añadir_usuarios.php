<?php

// Incluir el archivo de conexión a la base de datos
require "../../conexion/conexion.php";


// Verificar si se ha enviado una solicitud POST
if (isset($_POST["action"])) {

    //verificar si la acción es "add"

    if ($_POST["action"] == "add") {

        //obtener los datos del formulario

        $name = $_POST["name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $telf = $_POST["telf"];
        $date_cita = $_POST["date_cita"];
        $status = 1;

        //verificar si el usuario ya existe

        try {
            $query = "SELECT * FROM usuario WHERE usuario_correo = '$email' AND (usuario_estatus = 1 OR usuario_estatus = 2)";
            $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);

            //si el usuario ya existe, mostrar mensaje de cuantos usuarios hay en la lista de espera

            if ($result) {
                $query_2 = "SELECT * FROM usuario WHERE (usuario_estatus = 1 OR usuario_estatus = 2) AND usuario_correo != '$email'";
                $result_2 = $conectar->query($query_2)->fetchAll(PDO::FETCH_BOTH);
                echo 'Ya tiene una cita asignada, se encuentra en la posición ' . count($result_2) . ' de la lista de espera';
                exit;

                //Añadir usuario a la base de datos y mostrar mensaje de cuantos usuarios hay en la lista de espera
            } else {
                try {
                    $pdo = $conectar->prepare("INSERT INTO usuario (usuario_nombre, usuario_apellido, usuario_correo, usuario_telefono, usuario_fecha_cita, usuario_estatus) VALUES (?, ?, ?, ?, ?, ?)");
                    $pdo->bindParam(1, $name);
                    $pdo->bindParam(2, $last_name);
                    $pdo->bindParam(3, $email);
                    $pdo->bindParam(4, $telf);
                    $pdo->bindParam(5, $date_cita);
                    $pdo->bindParam(6, $status);
                    $pdo->execute();
                    $query_3 = "SELECT * FROM usuario WHERE (usuario_estatus = 1 OR usuario_estatus = 2) AND usuario_correo != '$email'";
                    $result_3 = $conectar->query($query_3)->fetchAll(PDO::FETCH_BOTH);
                    echo "Añadido correctamente, se encuentra en la posicion " . count($result_3) . " de la lista de espera";

                    //si hay un error, mostrar mensaje de error
                } catch (PDOException $error) {
                    echo 'Error';
                }
            }

            //si hay un error, mostrar mensaje de error
        } catch (PDOException $error) {
            echo 'Error';
        }
    }
}
