<?php

//Iniciar Sesión y verificar si el usuario está autenticado
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit;
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Diseños -->
    <link href="src/css/lista.css" rel="stylesheet">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light vh-100 d-flex flex-column">
    <div class="d-flex align-items-center my-4 container">
        <div class="d-flex align-items-center justify-content-center mb-4">
            <!-- Botón logout estilo flecha -->
            <a href="src/php/logout.php" class="btn btn-outline-secondary me-2">
                <span class="me-1">&larr;</span> Salir
            </a>
        </div>
        <h1 class="mb-0 flex-grow-1 text-center">Gestor de Lista</h1>
    </div>

    <!-- Botones en línea con flexbox -->
    <div class="container mb-4">
        <div class="d-flex flex-wrap">
            <button class="option-btn active" id="btn-espera">En Espera</button>
            <button class="option-btn" id="btn-atencion">En Atención</button>
            <button class="option-btn" id="btn-atendidos">Atendidos</button>
        </div>
    </div>

    <!-- Contenido de las listas -->
    <div class="container">
        <div id="table_lista_espera" class="table-responsive"></div>
        <div id="table_lista_atencion" class="table-responsive hidden"></div>
        <div id="table_lista_atendidos" class="table-responsive hidden"></div>
    </div>

    <!-- Modal para confirmar cambio de estado -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar cambio de estado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body" id="confirmMessage"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancelChange" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmChange">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Scripts -->
<script src="src/js/lista_usuarios.js"></script>

</html>