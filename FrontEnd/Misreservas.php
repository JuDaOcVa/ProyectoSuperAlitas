<section class="pt-5 pb-5 d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-4 justify-content-center d-flex ">
        <img src="imagenes/mesas.jpg" alt="" class="img-fluid mx-auto  d-block">
      </div>
      <div class="col-5">
        <form>
          <h1 class="mb-2 display-5 fw-bold">Gestiona tus reservas aqui!</h1>
          <p class="lead" style="visibility:collapse" id="reserva_label"><strong>Reservacion #</strong><strong id="id_reserva"></strong></p>
          <ol class="list-features lead list-l">
            <Li>
              <label for="input-group" class="col-sm-2 col-form-label">Fecha</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" placeholder="DD/MM/AAAA" id="fecha_reserva">
              </div>
            </Li>
            <li>
              <label for="inputPassword" class="col-sm-2 col-form-label">Horario</label>
              <div class="col-sm-10">
                <input type="time" class="form-control" placeholder="HH/MM/SS" id="hora_reserva">
              </div>
            </li>
            <li>
              <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Observaciones</label>
              <textarea class="form-control" id="observaciones_reserva" rows="2"></textarea>
            </li>
          </ol>
          <td><a class="btn btn-success ms-md-3" id="guardar_reserva" disabled>Guardar</a></td>
          <td><a class="btn btn-warning ms-md-3" id="limpiar_datos" disabled>Limpiar</a></td>
        </form>
      </div>
    </div>
</section>

<section class="pb-5 pt-5">
  <div class="container">
    <div class="row">
      <form>
        <div class="col-lg-6 text-center col-md-8 ms-auto me-auto">
          <p><strong>Mis Reservaciones</strong></p>
          <div class="input-group input-lg mt-4">
            <table class="table" id="tabla_reservas">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Horario</th>
                  <th scope="col">Observaciones</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>