<section class="pb-5 pb-5" id="section-container">
    <div class="container">
      <div class="row">
        <form>
          <div class="col-lg-6 text-center col-md-8 ms-auto me-auto">
            <p><strong>Registrar Mesa</strong></p>
            <div class="input-group input-lg mt-4">


              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Seleciona una mesa</label>
                <select class="form-select" id="mesa">
                  <option selected>Opciones</option>
                  <option value="1">uno</option>
                  <option value="2">dos</option>
                  <option value="3">tres</option>
                </select>
              </div>

              <div class="input-group mb-3">
                <label for="input-group" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" placeholder="DD/MM/AAAA" id="fecha">
                </div>
              </div>
              <div class="input-group mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Horario</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" placeholder="HH/MM/SS" id="hora">
                </div>
              </div>


              <div class="input-group mb-3">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">comentario</label>
                <textarea class="form-control" id="txt" rows="4"></textarea>
              </div>
            </div>


            <div class="send-button mt-5">
              <button type="submit" class="btn btn-warning btn-round w-100 shadow  btn-lg mt-3">registrar</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </section>
  