    <script type="module" src="../scripts/bGeneral.js"></script>
    <script type="module" src="../scripts/validar_inicio_sesion.js"></script>
          <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2">Inicio de Sesión</h1>
          </div>
          <div class="modal-body p-5 pt-0">
            <form method="post" action="">
              <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="mail" placeholder="name@example.com" name="mail" required>
                <label for="email">Correo Electrónico</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" required>
                <label for="pass">Contraseña</label>
              </div>
              <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary mt-4" type="submit" name="bAceptar">Iniciar Sesión</button>
            </form>
          </div>

<?php include 'layout.php' ?>