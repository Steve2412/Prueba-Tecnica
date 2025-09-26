<?php

// Incluir el archivo de conexión a la base de datos
require "../../conexion/conexion.php";


// Verificar si se ha enviado una solicitud POST
if (isset($_POST["action"])) {

  //verificar si la acción es "fetch_atendidos"

  if ($_POST["action"] == "fetch_atendidos") {

    //Mostrar la lista de usuarios atendidos en una tabla
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
                <th>Fecha De Registro</th>
                <th>Fecha De Atención</th>
                <th>Fecha Finalización</th>
              </tr>
            </thead>
          <tbody>
    ';

    //obtener los usuarios atendidos de la base de datos
    $query = "SELECT * FROM usuario where usuario_estatus = 3 order by usuario_fecha_atendido asc";
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
                        <td>' . $row['usuario_fecha_atencion'] . '</td>
                        <td>' . $row['usuario_fecha_atendido'] . '</td>                   
                        </tr>
                ';
      }
      //si no hay usuarios atendidos, mostrar mensaje de no hay informacion
    } else {
      $output .= '
                <tr>
                    <td colspan="6" class="text-center text-muted">No hay informacion</td>
                </tr> 
            ';
    }
    $output .= '      </tbody>
              </table>
            </div>
          </div>';
    echo $output;
  }
}
