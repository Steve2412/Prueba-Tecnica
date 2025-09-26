<?php

// Incluir el archivo de conexión a la base de datos
require "../../conexion/conexion.php";

// Verificar si se ha enviado una solicitud POST

if (isset($_POST["action"])) {

    //verificar si la acción es "fetch_espera"

    if ($_POST["action"] == "fetch_espera") {

        //Mostrar la lista de usuarios en espera en una tabla
        $output = '
        <div class="d-flex flex-column flex-wrap">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle" style="font-size:14px;">
                    <thead class="table-light text-center">
                        <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                 <tbody>
';
        //obtener los usuarios en espera de la base de datos
        $query = "SELECT * FROM usuario where usuario_estatus = 1 order by usuario_fecha_cita asc";
        $result = $conectar->query($query)->fetchAll(PDO::FETCH_BOTH);
        if ($result) {
            foreach ($result as $row) {
                $output .= '
                    <tr>
                        <td>' . $row['usuario_nombre'] . '</td> 
                        <td>' . $row['usuario_apellido'] . '</td>
                        <td>' . $row['usuario_correo'] . '</td>
                        <td>' . $row['usuario_telefono'] . '</td>
                        <td>' . $row['usuario_fecha_cita'] . '</td>
                        <td>
                            <select class="form-select form-select-sm select-estado"
                                    data-id="' . $row['usuario_id'] . '">
                                <option value="" selected hidden>Cambiar estado</option>
                                <option value="2" ' . ($row['usuario_estatus'] == 2 ? 'selected' : '') . '>En atención</option>
                            </select>
                        </td>                    
                        </tr>
                ';
            }
            //si no hay usuarios en espera, mostrar mensaje de no hay informacion
        } else {
            $output .= '
                <tr>
                    <td colspan="6" class="text-center text-muted">No hay informacion</td>
                </tr> 
            ';
        }
        $output .= '</tbody>
                </table>
            </div>
        </div>';
        echo $output;
    }
}
