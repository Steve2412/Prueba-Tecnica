// obtener el elemento input de fecha y hora

const dateInput = document.getElementById("date");

// Obtener la fecha y hora actual
const now = new Date();

// Convertir a formato YYYY-MM-DDTHH:MM
const year = now.getFullYear(); //Año
const month = String(now.getMonth() + 1).padStart(2, "0"); //Mes (0-11, por eso se suma 1)
const day = String(now.getDate()).padStart(2, "0"); //Día
const hours = String(now.getHours()).padStart(2, "0"); //Horas
const minutes = String(now.getMinutes()).padStart(2, "0"); //Minutos

const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`; // Formato final

// Asignar al input
dateInput.min = minDateTime;

// prevenir insertar numeros en campos de texto y caracteres especiales
$("#name, #last_name").on("input", function () {
  this.value = this.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, "");
});

// prevenir insertar letras en campo telefono
$("#telf").on("input", function () {
  this.value = this.value.replace(/[^0-9]/g, "");
});

//limitar longitud del campo telefono a 11 caracteres
$("#telf").on("input", function () {
  if (this.value.length > 11) {
    this.value = this.value.slice(0, 11);
  }
});

// Función para mostrar mensajes en el modal
function showModalMessage(message) {
  $("#alertMessage").text(message);
  var modal = new bootstrap.Modal(document.getElementById("alertModal"));
  modal.show();
}

//Ocultar boton "Ver Cola" inicialmente
$("#btn-ver-cola").hide();

// Manejar el clic en el botón "Añadir para agregar usuario en lista de espera"
$(document).on("click", "#adding", function () {
  // Obtener los valores de los campos
  var action = "add";
  var name = $("#name").val();
  var last_name = $("#last_name").val();
  var email = $("#email").val();
  var telf = $("#telf").val();
  var date_cita = $("#date").val();

  // Formatear nombre y apellido para que la primera letra sea mayúscula y el resto minúscula
  name = name.charAt(0).toUpperCase() + name.slice(1).toLowerCase();
  last_name =
    last_name.charAt(0).toUpperCase() + last_name.slice(1).toLowerCase();

  // Validar campos vacíos

  if (
    name === "" ||
    last_name === "" ||
    email === "" ||
    telf === "" ||
    date_cita === ""
  ) {
    showModalMessage("Por favor, ingresa todos los datos");
    return; // Salimos si hay campos vacíos
  }

  // Validar fecha mínima
  if (date_cita < minDateTime) {
    showModalMessage("La fecha no puede ser anterior a la actual");
    return; // Salimos si la fecha es inválida
  }

  // Si todo es correcto, hacemos el AJAX
  $.ajax({
    url: "src/php/añadir_usuarios.php",
    type: "POST",
    data: {
      name: name,
      last_name: last_name,
      email: email,
      telf: telf,
      date_cita: date_cita,
      action: action,
    },
    success: function (data) {
      //De acuerdo a la respuesta, mostramos un mensaje u otro
      if (data.includes("Añadido correctamente")) {
        showModalMessage("Se insertaron los datos correctamente");

        //Verificar si el usuario está a punto de ser atendido
        if (data.includes("0")) {
          document.getElementById("info_cola").innerHTML =
            "Esta a punto de ser atendido";
          $("#btn-ver-cola").show(); // Mostrar el botón "Ver Cola"

          //Si hay cola, mostrar la posición en la cola
        } else {
          document.getElementById("info_cola").innerHTML = data;
        }
      } else if (data.includes("cita asignada")) {
        //Verificar si el usuario está a punto de ser atendido
        if (data.includes("0")) {
          document.getElementById("info_cola").innerHTML =
            "Esta a punto de ser atendido";
          $("#btn-ver-cola").show(); // Mostrar el botón "Ver Cola"
          //Si no hay error, mostrar la posición en la cola
        } else {
          document.getElementById("info_cola").innerHTML = data;
          $("#btn-ver-cola").show(); // Mostrar el botón "Ver Cola"
        }

        //Verificar si hay error al insertar datos
      } else if (data == "Error") {
        showModalMessage("Hubo un error al insertar los datos");
      } else {
        showModalMessage(data);
      }
    },
  });

  // Manejar el clic en el botón "Ver Cola"
  $("#btn-ver-cola").on("click", function () {
    // Hacer una solicitud AJAX para obtener la cola actualizada
    var name = $("#name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var telf = $("#telf").val();
    var date_cita = $("#date").val();
    var action = "ver_cola";

    // Validar que los campos no esten vacios

    if (
      name === "" ||
      last_name === "" ||
      email === "" ||
      telf === "" ||
      date_cita === ""
    ) {
      showModalMessage("Por favor, ingresa todos los datos para ver la cola");
      return; // Salimos si hay campos vacíos
    }

    // Hacer la solicitud AJAX
    $.ajax({
      url: "src/php/ver_cola_usuarios.php",
      type: "POST",
      data: { email: email, action: action },
      success: function (data) {
        //Verificar si el usuario está a punto de ser atendido
        if (data.includes("0")) {
          document.getElementById("info_cola").innerHTML =
            "Actualizado: Esta a punto de ser atendido";

          //Verificar si hay error al obtener la cola
        } else if (data.includes("Error")) {
          showModalMessage("Hubo un error al obtener la cola");
        } else {
          // Mostrar la posicion en la cola
          document.getElementById("info_cola").innerHTML = data;
        }
      },
    });
  });
});

// Manejar el clic en el botón "Regresar a la página principal"
$(document).on("click", "#return", function () {
  window.location.href = "index.html"; // Redirigir a la página principal
});
