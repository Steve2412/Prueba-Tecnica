<?php

// Establecer la zona horaria a 'America/Caracas'
date_default_timezone_set('America/Caracas');


// Incluir el archivo de conexión a la base de datos

require "../../conexion/conexion.php";


// Verificar si se ha enviado una solicitud POST
if (isset($_POST["action"])) {

    //verificar si la acción es "cambiar_estado"

    if ($_POST["action"] == "cambiar_estado") {

        //obtener los datos para cambiar el estado

        $id = $_POST["usuario_id"];
        $status = $_POST["nuevo_estado"];
        $fecha_actual = date('Y-m-d H:i:s');

        //Si el estado es 2 (siendo atendido) actualizar el estado y la fecha de atención

        if ($status == 2) {
            try {
                $pdo = $conectar->prepare("UPDATE usuario SET usuario_estatus = ?, usuario_fecha_atencion = ? WHERE usuario_id = ?");
                $pdo->bindParam(1, $status);
                $pdo->bindParam(2, $fecha_actual);
                $pdo->bindParam(3, $id);
                $pdo->execute();
                echo "Actualizado Correctamente";

                //si hay un error, mostrar mensaje de error
            } catch (PDOException $error) {
                echo 'Error';
            }
            exit;

            //Si el estado es 3 (atendido) actualizar el estado y la fecha de atención

        } else if ($status == 3) {
            try {
                $pdo = $conectar->prepare("UPDATE usuario SET usuario_estatus = ?, usuario_fecha_atendido = ? WHERE usuario_id = ?");
                $pdo->bindParam(1, $status);
                $pdo->bindParam(2, $fecha_actual);
                $pdo->bindParam(3, $id);
                $pdo->execute();
                echo "Actualizado Correctamente";

                //si hay un error, mostrar mensaje de error

            } catch (PDOException $error) {
                echo 'Error';
            }
            exit;
        }
    }
}
