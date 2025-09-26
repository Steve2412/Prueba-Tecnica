$("#loginForm").on("submit", function (e) {
  e.preventDefault();

  // Variables
  var email = $("#email").val().trim();
  var password = $("#password").val();
  var action = "login";

  // Validar campos vacíos
  if (email === "" || password === "") {
    $("#msg").text("Por favor, ingresa todos los datos");
    return; // Salimos si hay campos vacíos
  }

  //Si todo es correcto, hacemos el AJAX

  $.ajax({
    url: "src/php/login.php",
    type: "POST",
    data: {
      email: email,
      password: password,
      action: action,
    },

    success: function (data) {
      // De acuerdo a la respuesta, mostramos un mensaje u otro
      if (data.includes("Login correcto")) {
        window.location.href = "lista.php"; // Redirige si login OK
      } else if (
        data.includes("Campos vacíos") ||
        data.includes("Credenciales inválidas") ||
        data.includes("Error")
      ) {
        $("#msg").text(data); // Mostrar error en pantalla
      } else {
        $("#msg").text(data); // Mensaje genérico
      }
    },
    error: function () {
      $("#msg").text("Error en el servidor.");
    },
  });
});
