<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir</title>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
  <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
    <div class="d-flex align-items-center mb-4">
      <button class="btn btn-link text-decoration-none text-secondary me-2" id="return">
        <i class="fas fa-arrow-left"></i>
      </button>
      <h1 class="mb-0 flex-grow-1 text-center">Añadir a la lista de espera</h1>
    </div>

      <!-- Formulario para añadir usuarios -->

    <form>
      <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3">
        <label for="last_name" class="form-label">Apellido:</label>
        <input type="text" class="form-control" id="last_name" name="last_name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="telf" class="form-label">Teléfono:</label>
        <input type="text" class="form-control" id="telf" name="telf">
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Fecha:</label>
        <input type="datetime-local" class="form-control" id="date" name="date">
      </div>
      <div class="text-center">
        <input type="button" class="btn btn-primary w-100" id="adding" name="adding"
          value="Unirse a la lista de espera">
      </div>
    </form>

    <div id="info_cola" class="text-center mt-3 text-muted"></div>
    <br><br>
    <button class="btn btn-secondary w-100" id="btn-ver-cola">Ver Cola</button>
  </div>

  <!-- Modal Bootstrap para mensajes -->
  <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alertModalLabel">Mensaje</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body" id="alertMessage">
          <!-- Aquí se inserta el mensaje -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</body>

<!-- Scripts -->
<script src="src/js/añadir_usuarios.js"></script>

</html>