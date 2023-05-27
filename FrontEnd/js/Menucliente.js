$(document).ready(function () {
  validarSesion();
});

function validarSesion() {
  $.ajax({
    url: "../BackEnd/funciones.php",
    type: "POST",
    data: { funcion: "validarSesion" },
    dataType: "json",
    success: function (response) {
      if (!response.success) {
        window.location.href = "./login.php";
      }
    },
    error: function (xhr, status, error) {
      console.log("Error en la petición AJAX:", error);
    },
  });
}

function cambiarAReservaciones() {
  var contenedor = document.getElementById("section-container");
  fetch("Reservacion.php")
    .then((response) => response.text())
    .then((data) => {
      contenedor.innerHTML = data;
      cargarMesasDisponibles();
    })
    .catch((error) => {
      console.error("Error al cargar el contenido de Reservacion.php:", error);
    });
}

function cambiarAMisReservas() {
  var contenedor = document.getElementById("section-container");
  fetch("Misreservas.php")
    .then((response) => response.text())
    .then((data) => {
      contenedor.innerHTML = data;
      cargarReservasUsuario();
    })
    .catch((error) => {
      console.error("Error al cargar el contenido de Reservacion.php:", error);
    });
}

function cargarReservasUsuario() {
  $.ajax({
    url: "../BackEnd/funciones.php",
    type: "POST",
    data: { funcion: "cargarReservasUsuario" },
    dataType: "json",
    success: function (response) {
      var tablaReservas = $("#tabla_reservas"); 
      tablaReservas.find("tbody").empty();
      $.each(response, function (index, reserva) {
        var fila = $("<tr>");
        fila.append($("<th>").attr("scope", "row").text(reserva.id));
        fila.append($("<td>").text(reserva.fecha_reserva));
        fila.append($("<td>").text(reserva.hora_reserva));
        fila.append($("<td>").text(reserva.observaciones_usuario));
        var acciones = $("<td>");
        var btnEditar = $("<a>")
          .addClass("btn btn-warning ms-md-3 editar-reserva")
          .attr("id", "editar-" + reserva.id)
          .text("Editar");
        var btnEliminar = $("<a>")
          .addClass("btn btn-danger ms-md-3 eliminar-reserva")
          .attr("id", "eliminar-" + reserva.id)
          .text("Eliminar");
        acciones.append(btnEditar, btnEliminar);
        fila.append(acciones);
        tablaReservas.find("tbody").append(fila);
      });
    },
    error: function (error) {
      console.error("Error al cargar las reservas de usuario:", error);
    },
  });
}


function cargarMesasDisponibles() {
  var fecha = $("#fechaReserva").val();
  if (fecha == "") {
    fecha = obtenerFechaActual();
  }
  $.ajax({
    url: "../BackEnd/funciones.php",
    type: "POST",
    data: { funcion: "cargarMesasDisponibles", fecha: fecha },
    dataType: "json",
    success: function (response) {
      $("#mesaReserva").empty();
      $.each(response, function (index, mesa) {
        $("#mesaReserva").append(
          '<option value="' + mesa.id + '">' + mesa.descripcion + "</option>"
        );
      });
    },
    error: function (error) {
      console.error("Error al cargar las mesas disponibles:", error);
    },
  });
}

function obtenerFechaActual() {
  var today = new Date();
  var year = today.getFullYear();
  var month = String(today.getMonth() + 1).padStart(2, "0");
  var day = String(today.getDate()).padStart(2, "0");
  return year + "-" + month + "-" + day;
}

function obtenerHoraActual() {
  var today = new Date();
  var hour = String(today.getHours()).padStart(2, "0");
  var minute = String(today.getMinutes()).padStart(2, "0");
  var second = String(today.getSeconds()).padStart(2, "0");
  return hour + ":" + minute + ":" + second;
}

$("#cerrarSesion").click(function () {
  $.ajax({
    url: "../BackEnd/funciones.php",
    method: "POST",
    data: { funcion: "cerrarSesion" },
    success: function () {
      window.location.href = "./login.php";
    },
  });
});

$(document).on("click", "#btnReservar", function () {
  var fecha_solicitud = obtenerFechaActual();
  var hora_solicitud = obtenerHoraActual();
  var fechaReserva = $("#fechaReserva").val();
  var horarioReserva = $("#horaReserva").val();
  var mesa = $("#mesaReserva").val();
  var observaciones = $("#observacionReserva").val();
  if (fechaReserva == "" || horarioReserva == "") {
    if (fechaReserva == "") {
      $("#fechaReserva").css("border", "1px solid red");
    }
    if (horarioReserva == "") {
      $("#horaReserva").css("border", "1px solid red");
    }
  } else {
    $.ajax({
      url: "../BackEnd/funciones.php",
      method: "POST",
      data: {
        funcion: "crearReserva",
        fecha_solicitud: fecha_solicitud,
        hora_solicitud: hora_solicitud,
        fechaReserva: fechaReserva,
        horarioReserva: horarioReserva,
        mesa: mesa,
        observaciones: observaciones,
      },
      success: function (data) {
        if (data.resultado == "SUCCESS") {
          Swal.fire({
            title: "Reservacion con codigo: " + "\n" + data.reservaId + "!",
            text: "Reserva Exitosa",
            icon: "success",
          }).then(() => {
            window.location.href = "./Menucliente.php";
          });
        } else if (data.resultado == "ERROR") {
          Swal.fire({
            title: "Reservacion " + data.mensaje + " !",
            text: "Se produjo un error con la reserva",
            icon: "error",
          });
        }
      },
    });
  }
});

$(document).on("change", "#fechaReserva", function () {
  $(this).css("border", "1px solid #ccc");
});

$(document).on("change", "#fechaReserva", function () {
  cargarMesasDisponibles();
});

$(document).on("change", "#horaReserva", function () {
  $(this).css("border", "1px solid #ccc");
});

$(document).on("click", ".editar-reserva", function() {
  $('#reserva_label').css("visibility", 'visible');
  var fila = $(this).closest("tr");
  var idReserva = fila.find("th").text();
  var fecha = fila.find("td:nth-child(2)").text();
  var hora = fila.find("td:nth-child(3)").text();
  var observaciones = fila.find("td:nth-child(4)").text();
  $("#id_reserva").text(idReserva);
  $("#fecha_reserva").val(fecha);
  $("#hora_reserva").val(hora);
  $("#observaciones_reserva").val(observaciones);
});

$(document).on("click", ".eliminar-reserva", function() {
  var idReserva = $(this).attr("id").split("-")[1];
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar la reserva?",
    text: "Esta acción no se puede deshacer",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../BackEnd/funciones.php",
        method: "POST",
        data: {
          funcion: "eliminarReserva",
          id: idReserva,
        },
        success: function(data) {
          if (data.resultado == "SUCCESS") {
            Swal.fire({
              title: "Reservación eliminada",
              text: "La reservación ha sido eliminada correctamente",
              icon: "success",
            }).then(() => {
              limpiarDatos();
              cargarReservasUsuario();
            });
          } else if(data.resultado == "ERROR") {
            Swal.fire({
              title: "Error al eliminar reservación",
              text: "Se produjo un error al eliminar la reservación",
              icon: "error",
            });
          }
        },
        error: function(error) {
          console.error("Error al eliminar la reservación:", error);
          // Mostrar mensaje de error si ocurrió un error en la petición AJAX
          Swal.fire({
            title: "Error",
            text: "Se produjo un error al eliminar la reservación",
            icon: "error",
          });
        },
      });
    }
  });
});


$(document).on("click", ".eliminar-reserva", function() {
  var idReserva = $(this).attr("id").split("-")[1];
});

$(document).on("click", "#limpiar_datos", limpiarDatos);

function limpiarDatos() {
  $('#reserva_label').css("visibility", 'collapse');
  $("#id_reserva").text("");
  $("#fecha_reserva").val("");
  $("#hora_reserva").val("");
  $("#observaciones_reserva").val("");
}

$(document).on("click", "#guardar_reserva", function() {
  var id = $("#id_reserva").text();
  var fecha = $("#fecha_reserva").val();
  var hora = $("#hora_reserva").val();
  var observaciones = $("#observaciones_reserva").val();
  $.ajax({
    url: "../BackEnd/funciones.php",
    method: "POST",
    data: {
      funcion: "actualizarReserva",
      id: id,
      fechaReserva: fecha,
      horarioReserva: hora,
      observaciones: observaciones,
    },
    success: function(data) {
      if (data.resultado == "SUCCESS") {
        Swal.fire({
          title: "Reservacion con codigo: " + "\n" + data.reservaId + "!",
          text: "Reserva Actualizada Exitosamente",
          icon: "success",
        }).then(() => {
          limpiarDatos();
          cargarReservasUsuario();
        });
      } else if (data.resultado == "ERROR") {
        Swal.fire({
          title: "Reservacion " + data.mensaje + " !",
          text: "Se produjo un error actualizando la reserva",
          icon: "error",
        });
      }
    },
  });
});






