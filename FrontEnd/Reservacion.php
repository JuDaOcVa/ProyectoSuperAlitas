<section class="pb-5 pb-5" id="section-container">
    <div class="container">
      <div class="row">
        <form>
          <div class="col-lg-6 text-center col-md-8 ms-auto me-auto">
            <p><strong>Realizar Reservación</strong></p>
            <div class="input-group input-lg mt-4">
              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Selecciona una mesa</label>
                <select class="form-select" id="mesaReserva">
                <option value="-1" selected>Opciones</option>
                </select>
              </div>
              <div class="input-group mb-3">
                <label for="input-group" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" placeholder="DD/MM/AAAA" id="fechaReserva">
                </div>
              </div>
              <div class="input-group mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Horario</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" id="horaReserva">
                </div>
              </div>
              <div class="input-group mb-3">
                <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label">Observaciones</label>
                <textarea class="form-control" id="observacionReserva" rows="4"></textarea>
              </div>
            </div>
            <div class="send-button mt-5">
              <button type="button" class="btn btn-warning btn-round w-100 shadow  btn-lg mt-3" id="btnReservar">Reservar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  