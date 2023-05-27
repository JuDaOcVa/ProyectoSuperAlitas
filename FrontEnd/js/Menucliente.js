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
    })
    .catch((error) => {
      console.error("Error al cargar el contenido de Reservacion.php:", error);
    });
}

function cargarMesasDisponibles() {
  var fecha = $("#fechaReserva").val();
  if (fecha == "") {
    fecha = obtenerFechaActual();
  }
  console.log("FECHA==>", fecha);
  $.ajax({
    url: "../BackEnd/funciones.php",
    type: "POST",
    data: { funcion: "cargarMesasDisponibles", fecha: fecha },
    dataType: "json",
    success: function (response) {
      console.log(response);
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
    console.log("SI ENTRA");
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

$(document).on("focus", "#fechaReserva", function () {
  $(this).css("border", "1px solid #ccc");
});

$(document).on("change", "#fechaReserva", function () {
  cargarMesasDisponibles();
});

$(document).on("focus", "#horaReserva", function () {
  $(this).css("border", "1px solid #ccc");
});
