
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

  <section class="pb-5 pt-5">
    <div class="container">
      <div class="row">
        <form>
          <div class="col-lg-6 text-center col-md-8 ms-auto me-auto">

            <p><strong>tabla de reservaciones</strong></p>

            <div class="input-group input-lg mt-4">

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">fecha</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Mostrar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>13/05/2023</td>
                    <td>se necesitan 8 sillas</td>
                    <td> <a class="btn btn-warning ms-md-3" href="Listaregistrarmesa.html">mostrar</a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>14/05/2023</td>
                    <td>se necesitan 4 sillas</td>
                    <td> <a class="btn btn-warning ms-md-3" href="Listaregistrarmesa.html">mostrar</a></td>
                  </tr>
                
                </tbody>
              </table>

              
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>