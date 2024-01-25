
    <script type="module" src="../scripts/bGeneral.js"></script>
    <script type="module" src="../scripts/validar_registro.js"></script>

    <div class="container">
          <div class="header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2 mb-4">Registrarse gratuitamente</h1>
          </div>
          <div class="body p-5 pt-0">
            <form action="index.php?ctl=registro" method="post" enctype="multipart/form-data">
            <div class="container d-flex justify-content-end my-2">
            <small class="text-body-secondary ">Los campos con * son obligatorios</small>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="nombre" name="nombre" placeholder="name" required>
                <label for="nombre">Nombre Único de Usuario*</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="nick" name="nick" placeholder="nick">
                <label for="nombre">Sobrenombre</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="mail" placeholder="name@example.com" name="mail" required>
                <label for="mail">Correo Electrónico*</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" required>
                <label for="pass">Contraseña*</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass2" placeholder="Password" name="pass2" required>
                <label for="pass2">Repita Contraseña*</label>
              </div>
              <div class="form-floating mb-3">
                <input type="date" class="form-control rounded-3" id="fecha" placeholder="Password" name="fecha" required>
                <label for="fecha">Fecha de Nacimiento*</label>
              </div>
              <div class="mb-5">
              <label for="f_perfil" class="form-label">Seleccioine una foto de perfil:</label>
              <input class="form-control" type="file" id="f_perfil" name="f_perfil">
              </div>
              <small class="text-body-secondary mb-1">Máximo 300 caracteres.</small>
              <div class="form-floating">
              <textarea class="form-control" placeholder="Añade una descripción" id="descripcion" style="height: 100px" name="descripcion"></textarea>
              <label for="descripcion">Descripción</label>
              </div>
              <hr class="my-4">
              <h2 class="fs-5 fw-bold mb-3">Eres lector o escritor?</h2>
              <input type="radio" class="btn-check" id="lector" name="opcion_usuario" value="lector" checked autocomplete="off">
              <label class="btn btn-outline-secondary" for="lector">Lector</label>
              <input type="radio" class="btn-check" id="escritor" name="opcion_usuario" value="escritor" autocomplete="off">
              <label class="btn btn-outline-secondary" for="escritor">Escritor</label>
              <hr class="my-4">
              <label class="mb-2" for="terminos"><input type="checkbox" id="terminos" name="terminos" value="1">
              <small class="text-body-secondary">Registrándote aceptas los términos y condiciones.*</small></label>
              <button class="w-100 my-2 btn btn-lg rounded-3 btn-primary" id="bAceptar" name="bAceptar" type="submit">Registrarse</button>
            </form>
          </div>
        </div>



<?php include 'layout.php' ?>