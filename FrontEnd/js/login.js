$(document).ready(function () {
  $("#login-btn").click(function (event) {
    console.log("ENTRO");
    event.preventDefault();
    var username = $("#txtcorreo").val();
    var password = $("#txtpassword").val();

    // Enviar los datos al archivo funciones.php en el backend
    $.ajax({
      url: "../backEnd/funciones.php",
      type: "POST",
      dataType: "json",
      data: {
        username: username,
        password: password,
        action: "login",
      },
      beforeSend: function () {
        console.log("Enviando petición...");
        // Mostrar una alerta personalizada con una imagen de cargando
        var alert = '<div class="alert alert-info" role="alert">';
        alert +=
          '<img src="cargando.png" alt="Cargando..." style="width: 16px; height: 16px;">';
        alert += " Cargando...";
        alert += "</div>";
        $("#alert-container").html(alert);
      },
      success: function (data) {
        console.log(data);
        console.log(typeof data);
        if (data.exists) {
          window.location.href = "dashboard.php";
        } else {
          var alert = '<div class="alert alert-danger" role="alert">';
          alert +=
            '<img src="./error.png" alt="Error" style="width: 16px; height: 16px;">';
          alert += " Credenciales inválidas o usuario no existe.";
          alert += "</div>";
          $("#alert-container").html(alert);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log(xhr.responseText);
        // Mostrar una alerta personalizada con una imagen de error
        var alert = '<div class="alert alert-danger" role="alert">';
        alert += '<img src="./error.png" alt="Error" style="width: 16px; height: 16px;">';
        alert += ' Ocurrió un error al procesar la solicitud.';
        alert += '</div>';
        $('#alert-container').html(alert);
      },
      complete: function () {
        console.log("Petición AJAX completada.");
      },
    });
  });
});
