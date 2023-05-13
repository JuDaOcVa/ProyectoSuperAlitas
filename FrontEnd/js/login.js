$(document).ready(function () {
  $("#login-btn").click(function () {
    console.log("ENTRA click login");
    event.preventDefault();
    var correo = $("#txtcorreo").val();
    var password = $("#txtpassword").val();
    $.ajax({
      url: "../BackEnd/funciones.php",
      method: "POST",
      data: {
        correo: correo,
        password: password,
      },
      beforeSend: function () {
        $("#login-btn").val("Connecting...");
      },
      success: function (data) {
        if (data.resultado == "SUCCESS") {
          console.log("POR FIN SUCCESS");
          window.location.href = "./dashboard.php";
        } else if (data.resultado == "ERROR") {
          console.log("MALDITO ERROR");
          console.log(data.mensaje);
        }
      },
    });
  });
});
