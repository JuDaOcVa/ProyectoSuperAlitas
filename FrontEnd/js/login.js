$(document).ready(function () {
  $("#login-btn").click(function () {
    event.preventDefault();
    var correo = $("#txtcorreo").val();
    var password = $("#txtpassword").val();
    $.ajax({
      url: "../BackEnd/funciones.php",
      method: "POST",
      data: {
        funcion:'login',
        correo: correo,
        password: password,
      },
      beforeSend: function () {
        $("#login-btn").val("Connecting...");
      },
      success: function (data) {
        if (data.resultado == "SUCCESS") {
          Swal.fire({
            title: "Bienvenido"+"\n" +data.nombre+"!",
            text: "Login exitoso.",
            icon: "success"
          }).then(() => {
            window.location.href = "./Menucliente.html";
          });
        } else if (data.resultado == "ERROR") {
          Swal.fire({
            title: "Error!",
            text: "Login no exitoso."+"\n"+data.mensaje+"!",
            icon: "error",
          });
        }
      },
    });
  });
});
