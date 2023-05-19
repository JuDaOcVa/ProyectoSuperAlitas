<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Proyecto Super Alitas</title>
    <meta charset="utf-8">
    <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet"
      href=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css ">
    <link rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="sweetalert2.min.css">
      <script src="sweetalert2.all.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-light bg-white  navbar-expand-md ">
      <div class="container">
        <div class="col-2 pl-md-0 text-left">
          <a href="#">
            <img src=" https://dummyimage.com/102x30/007bff/ffffff?text=logo"
              height="30" alt="image">
          </a>
        </div>
    </nav>
    <section class="pb-5 pt-5">
  <div class="container" id="container">
    <h1 class="text-center fw-bold">Ingresar a Super Alitas</h1>
    <div class="row">
      <form id="login-form">
        <div class="col-lg-4 text-center col-md-8 ms-auto me-auto">
          <div class="input-group input-lg mt-4">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i
                class="fa fa-envelope"></i></span><input type="text" id="txtcorreo"
                class="form-control" placeholder="Correo" name="txtcorreo"
                aria-label="Correo" aria-describedby="basic-addon1"></input>
            </div>
          </div>
          <div class="input-group input-lg mt-4">
            <span class="input-group-text" id="basic-addon2"><i
              class="fa fa-lock"></i></span><input type="password" id="txtcontrasena"
              class="form-control" name="contrasena" placeholder="Contraseña"
              aria-describedby="basic-addon2"></input>
          </div>
          <div class="send-button mt-5">
            <button type="submit" id="login-btn" class="btn btn-primary btn-round w-100 shadow btn-lg mt-3">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div id="error"></div> 
</section>

    <section class="fixed-bottom">
      <footer class="pt-4 pb-4 ">
        <div class="container">
          <div class="row text-center align-items-center">
            <div class="col-12 col-sm-6 col-md-4 text-sm-start">
              <img alt="image"
                src=" https://dummyimage.com/102x40/007bff/ffffff?text=L O G O"
                height="40">
            </div>
            <div
              class="col-12 col-sm-6 col-md-4 mt-4 mt-sm-0 text-center text-sm-end text-md-center">
              © 2013-2021 Bootstraptor
            </div>
            <div class="col-12 col-md-4 mt-4 mt-md-0 text-center text-md-end">
              <a href="#">
                <i class="fab fa-twitter" aria-hidden="true"></i>
              </a>&nbsp;&nbsp;
              <a href="#">
                <i class="fab fa-facebook" aria-hidden="true"></i>
              </a>&nbsp;&nbsp;
              <a href="#">
                <i class="fab fa-instagram" aria-hidden="true"></i>
              </a>&nbsp;&nbsp;
              <a href="#">
                <i class="fab fa-pinterest" aria-hidden="true"></i>
              </a>&nbsp;&nbsp;
              <a href="#">
                <i class="fab fa-google" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </footer>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
      <script src="js/login.js"></script>
  </body>
</html>