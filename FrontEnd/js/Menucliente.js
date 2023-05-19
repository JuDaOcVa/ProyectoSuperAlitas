function cambiarAReservaciones() {
    var contenedor = document.getElementById("section-container");
    fetch("Reservacion.php")
      .then(response => response.text())
      .then(data => {
        contenedor.innerHTML = data;
      })
      .catch(error => {
        console.error("Error al cargar el contenido de Reservacion.php:", error);
      });
  }

  function cambiarAMisReservas() {
    var contenedor = document.getElementById("section-container");
    fetch("Misreservas.php")
      .then(response => response.text())
      .then(data => {
        contenedor.innerHTML = data;
      })
      .catch(error => {
        console.error("Error al cargar el contenido de Reservacion.php:", error);
      });
  }