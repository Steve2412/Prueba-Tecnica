<?php

// Incluir el archivo de conexión a la base de datos
require "../../conexion/conexion.php";

// Verificar si se ha enviado una solicitud POST

if (isset($_POST["action"])) {

    //verificar si la acción es "ver_cola"

    if ($_POST["action"] == "ver_cola") {

        //obtener el correo del usuario

        $email = $_POST["email"];

        // Consultar la base de datos para obtener la lista de usuarios en cola

        try {
            $query = "SELECT * FROM usuario WHERE (usuario_estatus = 1 OR usuario_estatus = 2) AND usuario_correo != :email";
            $stmt = $conectar->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);
            echo 'Se encuentra en la posición ' . count($result) . ' en la lista de espera';

            //si hay un error, mostrar mensaje de error
        } catch (PDOException) {
            echo 'Error';
        }
    }
}
