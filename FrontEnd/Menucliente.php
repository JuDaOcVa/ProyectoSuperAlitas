<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menu Cliente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.0/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css ">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-light bg-white  navbar-expand-md ">
    <div class="container">
      <div class="col-2 pl-md-0 text-left">
        <a href="">
          <img src="imagenes/logo.jpg" height="50" alt="image">
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-1"
        aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center col-md-8 navbar-collapse-1">
        <ul class="navbar-nav justify-content-center ">
          <li class="nav-item">
            <a class="nav-link  btn-warning" href=""><strong>Principal</strong></a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end col-md-2 navbar-collapse-1 pr-md-0">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="btn btn-warning ms-md-3" id="cerrarSesion">Cerrar Sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="pt-5 pb-5" id="section-container">
    <div class="container ">
      <div class="row   justify-content-center d-flex ">
        <div class="col-md-4 mx-auto mb-3">
          <div class="card">
            <img class="card-img-top shadow" src="imagenes/mesas.jpg" alt="Profile">
            <div class="card-body text-center">
              <h3 class="card-title">Reservaciones</h3>
              <p class="mt-1">
                <a class="btn btn-warning" role="button" id="reservacionbtn" onclick="cambiarAReservaciones()">Ingresar</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4 mx-auto mb-3">
          <div class="card">
            <img class="card-img-top shadow" src="imagenes/bebidas.jpg" alt="Profile">
            <div class="card-body text-center">
              <h3 class="card-title">Mis Reservas</h3>

              <p class="mt-1">
                <a class="btn btn-warning" role="button" id="misreservasbtn" onclick="cambiarAMisReservas()">Ingresar</a>

              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="">
    <footer class="pt-4 pb-4 ">
      <div class="container">
        <div class="row text-center align-items-center">
          <div class="col-12 col-sm-6 col-md-4 text-sm-start">
            <img alt="image" src="imagenes/logo.jpg" height="50">
          </div>
          <div class="col-12 col-sm-6 col-md-4 mt-4 mt-sm-0 text-center text-sm-end text-md-center">
            © 2023-2024
          </div>
          <div class="col-12 col-md-4 mt-4 mt-md-0 text-center text-md-end">
            <a href="#">
              <i class="fab fa-twitter btn-warning" aria-hidden="true"></i>
            </a>&nbsp;&nbsp;
            <a href="#">
              <i class="fab fa-facebook btn-warning" aria-hidden="true"></i>
            </a>&nbsp;&nbsp;
            <a href="#">
              <i class="fab fa-instagram btn-warning" aria-hidden="true"></i>
            </a>&nbsp;&nbsp;

          </div>
        </div>
      </div>
    </footer>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <script src="js/Menucliente.js"></script>
</body>
</html>