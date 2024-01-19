    <script type="module" src="../../app/libs/bGeneral.js"></script>
    <script type="module" src="../../app/modelo/validar_registro.js"></script>
    <!--BOTON REGISTRO-->
    <button type="button" class="btn btn-PRIMARY" data-toggle="modal" data-target="#modalSignup">Regístrate</button>

    <!--MODAL-->
    <div class="modal fade bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignup" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2">Registrarse gratuitamente</h1>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-5 pt-0">
            <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="nombre" name="nombre" placeholder="name" required>
                <label for="nombre">Nombre</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="mail" placeholder="name@example.com" name="mail" required>
                <label for="mail">Correo Electrónico</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" required>
                <label for="pass">Contraseña</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass2" placeholder="Password" name="pass2" required>
                <label for="pass2">Repita Contraseña</label>
              </div>
              <div class="form-floating mb-3">
                <input type="date" class="form-control rounded-3" id="fecha" placeholder="Password" name="fecha" required>
                <label for="fecha">Fecha de Nacimiento</label>
              </div>
              <hr class="my-4">
              <h2 class="fs-5 fw-bold mb-3">Eres lector o escritor?</h2>
              <input type="radio" class="btn-check" id="lector" value="lector" checked>
              <label class="btn btn-outline-secondary" for="lector">Lector</label>
              <input type="radio" class="btn-check" id="escritor" value="escritor">
              <label class="btn btn-outline-secondary" for="escritor">Escritor</label>
              <hr class="my-4">
              <label class="mb-2" for="terminos"><input type="checkbox" id="terminos" name="terminos" value="1">
              <small class="text-body-secondary">Registrándote aceptas los términos y condiciones.</small></label>
              <button class="w-100 my-2 btn btn-lg rounded-3 btn-primary" id="bAceptar" name="bAceptar" type="submit">Registrarse</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>