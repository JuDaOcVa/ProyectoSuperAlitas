
  <section class="pt-5 pb-5 d-flex align-items-center justify-content-center">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-4 justify-content-center d-flex ">
          <img src="imagenes/mesas.jpg" alt="" class="img-fluid mx-auto  d-block">
        </div>
        <div class="col-5">
          <h1 class="mb-2 display-5 fw-bold">Reservacion #</h1>
          <p class="lead"><strong> cambia o elimina tus reservaciones</strong> </p>
          <ol class="list-features lead list-l">
            <Li>
              <label for="inputPassword" class="col-sm-2 col-form-label">Horario</label>
              <div class="col-sm-10">
                <input type="time" class="form-control" placeholder="HH/MM/SS" id="hora">
              </div>
            </Li>


            <li>
              <label for="input-group" class="col-sm-2 col-form-label">Fecha</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" placeholder="DD/MM/AAAA" id="fecha">
              </div>
            </li>
            <li>
              <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">comentario</label>
              <textarea class="form-control" id="txt" rows="2"></textarea>
            </li>

          </ol>
          <table class="table div" class="formulario d-sm-none">
            
          </div>
            <thead>
              <tr>

                <th scope="col">modificar</th>
                <th scope="col">eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr>

                <td> <a class="btn btn-warning ms-md-3" href="Listaregistrarmesa.html">editar</a></td>
                <td> <a class="btn btn-warning ms-md-3" href="Listaregistrarmesa.html">eliminar</a></td>
              </tr>
            </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>