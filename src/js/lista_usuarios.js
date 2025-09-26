$(document).ready(function () {
  // Cargar todas las listas en segundo plano
  load_list_espera();
  load_list_atencion();
  load_list_atendidos();

  // Funciones para cargar las listas

  // Lista de espera

  function load_list_espera() {
    var action = "fetch_espera";
    $.ajax({
      url: "src/php/lista_usuarios_espera.php",
      type: "POST",
      data: {
        action: action,
      },
      success: function (data) {
        $("#table_lista_espera").html(data);
      },
    });
  }

  // Lista en atención

  function load_list_atencion() {
    var action = "fetch_en_atencion";
    $.ajax({
      url: "src/php/lista_usuarios_en_atencion.php",
      type: "POST",
      data: {
        action: action,
      },
      success: function (data) {
        $("#table_lista_atencion").html(data);
      },
    });
  }

  // Lista de atendidos

  function load_list_atendidos() {
    var action = "fetch_atendidos";
    $.ajax({
      url: "src/php/lista_usuarios_atendidos.php",
      type: "POST",
      data: {
        action: action,
      },
      success: function (data) {
        $("#table_lista_atendidos").html(data);
      },
    });
  }

  // Función genérica para cambiar pestañas
  function showList(listId, button) {
    // Ocultar todas
    $(
      "#table_lista_espera, #table_lista_atencion, #table_lista_atendidos"
    ).addClass("hidden");
    // Mostrar solo la seleccionada
    $(listId).removeClass("hidden");
    // Resetear y activar botón
    $(".option-btn").removeClass("active");
    $(button).addClass("active");
  }

  // Eventos de los botones

  // Mostrar lista de espera por defecto
  $("#btn-espera").on("click", function () {
    showList("#table_lista_espera", this);
  });

  // Mostrar lista en atención

  $("#btn-atencion").on("click", function () {
    showList("#table_lista_atencion", this);
  });

  // Mostrar lista de atendidos

  $("#btn-atendidos").on("click", function () {
    showList("#table_lista_atendidos", this);
  });

  // Cambiar estado desde la lista de espera

  $(document).on("change", ".select-estado", function () {
    // Obtener datos
    var usuario_id = $(this).data("id");
    var nuevo_estado = $(this).val();
    var selectElement = $(this);
    var action = "cambiar_estado";

    // Mostrar modal
    $("#confirmMessage").text(`¿Deseas cambiar el estado del usuario?`);
    var confirmModal = new bootstrap.Modal(
      document.getElementById("confirmModal")
    );
    confirmModal.show();

    // Confirmar cambio
    $("#confirmChange")
      .off("click")
      .on("click", function () {
        $.ajax({
          url: "src/php/editar_usuarios.php",
          type: "POST",
          data: {
            usuario_id: usuario_id,
            nuevo_estado: nuevo_estado,
            action: action,
          },
          success: function (data) {
            //Si hay error mostrar alerta
            if (data == "Error") {
              alert(
                "Ocurrió un error al actualizar el estado. Por favor, intenta de nuevo."
              );
              selectElement.val(""); // vuelve al placeholder "Cambiar estado"
              selectElement.data("current", ""); // actualizar el estado actual
              confirmModal.hide();
              return;

              //Si se actualizó correctamente, recargar listas y mostrar mensaje
            } else if (data == "Actualizado Correctamente") {
              confirmModal.hide();
              alert(data); // puedes cambiar esto a un modal de éxito
              load_list_atencion(); // recarga lista de atención
              load_list_espera(); // recarga lista de espera
              load_list_atendidos(); // recarga lista de atendidos
              selectElement.data("current", nuevo_estado); // actualiza valor actual
            }
            s;
          },
        });
      });

    // Cancelar -> volver al valor anterior
    $("#cancelChange")
      .off("click")
      .on("click", function () {
        selectElement.val(""); // vuelve al placeholder "Cambiar estado"
        selectElement.data("current", ""); // actualizar el estado actual
      });
  });
});
