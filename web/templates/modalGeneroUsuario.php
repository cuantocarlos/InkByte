<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  GenerosUsuario
</button>

<!-- Modal GenerosUsuario -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Selecciona tus generos favoritos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
        <div class="container d-flex pt-5 py-3 gap-3 justify-content-center">



          <div class="d-flex flex-column gap-3">
          <!--Terror -->
          <input type="checkbox" class="btn-check terror" id="terror" autocomplete="off" name="generoUsuario[]" value="terror">
          <label class="btn btn-outline-primary mb-5 terror-label" for="terror">Terror</label>
          <!-- Romance -->
          <input type="checkbox" class="btn-check romance" id="romance" autocomplete="off" name="generoUsuario[]" value="romance">
          <label class="btn btn-outline-primary mb-5 romance-label" for="romance">Romance</label>
          <!-- Fantasía -->
          <input type="checkbox" class="btn-check fantasia" id="fantasia" autocomplete="off" name="generoUsuario[]" value="fantasia">
          <label class="btn btn-outline-primary mb-5 fantasia-label" for="fantasia">Fantasía</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Ciencia Ficción -->
          <input type="checkbox" class="btn-check cficcion" id="cficcion" autocomplete="off" name="generoUsuario[]" value="cficcion">
          <label class="btn btn-outline-primary mb-5 cficcion-label" for="cficcion">C.Ficción</label>
          <!-- Historia -->
          <input type="checkbox" class="btn-check historia" id="historia" autocomplete="off" name="generoUsuario[]" value="historia">
          <label class="btn btn-outline-primary mb-5 historia-label" for="historia">Historia</label>
          <!-- Arte -->
          <input type="checkbox" class="btn-check arte" id="arte" autocomplete="off" name="generoUsuario[]" value="arte">
          <label class="btn btn-outline-primary mb-5 arte-label" for="arte">Arte</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Thriller -->
          <input type="checkbox" class="btn-check thriller" id="thriller" autocomplete="off" name="generoUsuario[]" value="thriller">
          <label class="btn btn-outline-primary mb-5 thriller-label" for="thriller">Thriller</label>
          <!-- Poesía -->
          <input type="checkbox" class="btn-check poesia" id="poesia" autocomplete="off" name="generoUsuario[]" value="poesia">
          <label class="btn btn-outline-primary mb-5 poesia-label" for="poesia">Poesía</label>
          <!-- Biografía -->
          <input type="checkbox" class="btn-check biografia" id="biografia" autocomplete="off" name="generoUsuario[]" value="biografia">
          <label class="btn btn-outline-primary mb-5 biografia-label" for="biografia">Biografía</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Misterio -->
          <input type="checkbox" class="btn-check misterio" id="misterio" autocomplete="off" name="generoUsuario[]" value="misterio">
          <label class="btn btn-outline-primary mb-5 misterio-label" for="misterio">Misterio</label>
          <!-- Policíaca -->
          <input type="checkbox" class="btn-check policiaca" id="policiaca" autocomplete="off" name="generoUsuario[]" value="policiaca">
          <label class="btn btn-outline-primary mb-5 policiaca-label" for="policiaca">Policíaca</label>
          <!-- Drama -->
          <input type="checkbox" class="btn-check drama" id="drama" autocomplete="off" name="generoUsuario[]" value="drama">
          <label class="btn btn-outline-primary mb-5 drama-label" for="drama">Drama</label>
          </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="bAceptar" name="bAceptar">Guardar</button>
          </div>



  </form>

    </div>
  </div>
</div>

<?php include('layout.php'); ?>