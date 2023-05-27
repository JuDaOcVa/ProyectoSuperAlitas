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
      $.each(response, function (index, reserva) {
        var fila = $("<tr>");
        fila.append($("<th>").attr("scope", "row").text(reserva.id));
        fila.append($("<td>").text(reserva.fecha_reserva));
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
        $("tbody").append(fila);
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
  console.log(
    fecha_solicitud,
    " ",
    hora_solicitud,
    " ",
    fechaReserva,
    " ",
    horarioReserva,
    " ",
    mesa
  );
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
  var reservaId = $(this).attr("id").split("-")[1];
  console.log("EDITA con ID:" + reservaId);
  $('#reserva_label').css("visibility", 'visible');
  var reserva = obtenerReservaPorId(reservaId);
  $("#id_reserva").html(reserva.id);
  $("#fecha_reserva").val(reserva.fecha_reserva);
  $("#hora_reserva").val(reserva.hora_reserva);
  $("#observaciones_reserva").val(reserva.observaciones_usuario);
});


$(document).on("click", ".eliminar-reserva", function() {
  var idReserva = $(this).attr("id").split("-")[1];
  console.log("ELIMINA con ID:"+idReserva)
});

function obtenerReservaPorId(reservaId) {
  var reserva;
  $.ajax({
    url: "../BackEnd/funciones.php",
    type: "POST",
    data: { funcion: "obtenerReservaPorId", reservaId: reservaId },
    dataType: "json",
    async: false,
    success: function(response) {
      reserva = response;
    },
    error: function(error) {
      console.error("Error al obtener la reserva:", error);
    }
  });
  return reserva;
}

