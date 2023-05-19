$(document).ready(function () {
  $("#login-btn").click(function (event) {
    event.preventDefault();
    var correo = $("#txtcorreo").val();
    var contrasena = $("#txtcontrasena").val();
    if (correo == '' || contrasena == '') {
      if (correo == '') {
        $("#txtcorreo").css("border", "1px solid red");
      }
      if (contrasena == '') {
        $("#txtcontrasena").css("border", "1px solid red");
      }
      Swal.fire({
        title: "Error",
        text: "Por favor, complete todos los campos.",
        icon: "error",
      });
    } else {
      $("#txtcorreo").css("border", "1px solid #ccc");
      $("#txtcontrasena").css("border", "1px solid #ccc");
      $.ajax({
        url: "../BackEnd/funciones.php",
        method: "POST",
        data: {
          funcion: 'login',
          correo: correo,
          contrasena: contrasena,
        },
        beforeSend: function () {
          $("#login-btn").val("Connecting...");
        },
        success: function (data) {
          if (data.resultado == "SUCCESS") {
            Swal.fire({
              title: "Bienvenido" + "\n" + data.nombre + "!",
              text: "Login exitoso.",
              icon: "success"
            }).then(() => {
              window.location.href = "./Menucliente.html";
            });
          } else if (data.resultado == "ERROR") {
            Swal.fire({
              title: "Error!",
              text: "Login no exitoso." + "\n" + data.mensaje + "!",
              icon: "error",
            });
          }
        },
      });
    }
  });

  $("#txtcorreo").on("input", function () {
    $(this).css("border", "1px solid #ccc");
  });

  $("#txtcontrasena").on("input", function () {
    $(this).css("border", "1px solid #ccc");
  });
});
