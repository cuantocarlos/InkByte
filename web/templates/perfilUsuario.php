<script type="module" src="../web/scripts/perfilUsuario.js"></script>







        <div class="container d-flex pt-5 gap-3 justify-content-center mt-1 flex-column">

        <div class="p-3 ms-5">
          <div class="d-flex justify-content-center align-items-center mb-2">
        <input class="d-none" type="file" id="f_perfil" name="f_perfil" onchange="showPreview(this)">
        <label for="f_perfil" id="imagePreviewContainer">
          <img id="imagePreview" src='../app/archivos//img/perfil/<?php echo $_SESSION["foto_perfil"] ?>'>
        </label>


        </div>


        <div class="d-flex flex-column align-items-center justify-content-center mx-4">
          <h3><strong>@<?php echo $_SESSION["nombre"] ?></strong></h3>
          <h5><?php echo $_SESSION["nick"] ?></h5>
          </div>


        <div class="d-flex justify-content-start align-items-start mx-5 flex-column mt-5 mb-1">
          <h4>Descripción:</h4>
        <p style="overflow-wrap:break-word;" class="mx-3"><?php echo $_SESSION["descripcion"] ?></p>
        </div>


        <div class="d-flex justify-content-end">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Editar</button>
        </div>

      <!-- MODAL MODIFICACION PERFIL -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar el Perfil de Usuario:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?ctl=modificaUsuario" method="POST" class="p-4">

      <div class="row align-items-center me-5">
          <div class="input-group">
          <label for="nombre" class="col-form-label me-3">Nombre:</label>
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" id="nombre" value='<?php echo $_SESSION["nombre"]; ?>'>
          </div>
        </div>

        <div id="nombreMal" class="mb-5 text-danger mx-5"></div>

        <div class="row align-items-center mb-5">
          <div class="col-auto">
            <label for="nick" class="col-form-label">Sobrenombre:</label>
          </div>
          <div class="col-auto">
            <input type="text" name="nick" class="form-control" value='<?php echo $_SESSION["nick"]; ?>'>
          </div>
        </div>


            <label for="descripcion">Descripción:</label><br>
            <div class="d-flex justify-content-end">
            <small class="text-body-secondary mb-1">Máximo 300 caracteres.</small>
            </div>
              <div class="form-floating">
              <textarea class="form-control" id="descripcion" style="height: 100px" name="descripcion"><?php echo $_SESSION["descripcion"] ?></textarea>
              </div>

      <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-primary mt-4" value="Confirmar">
      </div>

      </form>
    </div>
</div>
</div>




        </div>

        <hr>

        <div class="d-flex align-items-center flex-column mt-3">
        <h2 class="fs-5 fw-bold mb-4">Eres lector o escritor?</h2>
        <div class="d-flex gap-3">
              <input type="radio" class="btn-check" id="lector" name="opcion_usuario" value="lector" checked autocomplete="off">
              <label class="btn btn-outline-success" for="lector">Lector</label>
              <input type="radio" class="btn-check" id="escritor" name="opcion_usuario" value="escritor" autocomplete="off">
              <label class="btn btn-outline-danger" for="escritor">Escritor</label>
              </div>

              </div>





        <hr class="mt-5">
        <div class="d-flex justify-content-center mt-1">
          <h2 class="h2 mt-3">Elige tus géneros favoritos</h2>
        </div>



        <div class="container d-flex pt-5 gap-3 justify-content-center mt-1">

        <div class="d-flex flex-column">
            <!--Terror -->
            <input type="checkbox" class="btn-check terror" id="terror" autocomplete="off" name="generoUsuario[]" value="terror">
            <label class="btn btn-outline-primary mb-5 terror-label" for="terror">Terror</label>
            <!-- Romance -->
            <input type="checkbox" class="btn-check romance" id="romance" autocomplete="off" name="generoUsuario[]" value="romance">
            <label class="btn btn-outline-primary mb-5 romance-label" for="romance">Romance</label>
          </div>



          <div class="d-flex flex-column">
            <!-- Fantasía -->
            <input type="checkbox" class="btn-check fantasia" id="fantasia" autocomplete="off" name="generoUsuario[]" value="fantasia">
            <label class="btn btn-outline-primary mb-5 fantasia-label" for="fantasia">Fantasía</label>
            <!-- Ciencia Ficción -->
            <input type="checkbox" class="btn-check cficcion" id="cficcion" autocomplete="off" name="generoUsuario[]" value="cficcion">
            <label class="btn btn-outline-primary mb-5 cficcion-label" for="cficcion">C.Ficción</label>
          </div>



          <div class="d-flex flex-column">
            <!-- Historia -->
            <input type="checkbox" class="btn-check historia" id="historia" autocomplete="off" name="generoUsuario[]" value="historia">
            <label class="btn btn-outline-primary mb-5 historia-label" for="historia">Historia</label>
            <!-- Arte -->
            <input type="checkbox" class="btn-check arte" id="arte" autocomplete="off" name="generoUsuario[]" value="arte">
            <label class="btn btn-outline-primary mb-5 arte-label" for="arte">Arte</label>

          </div>



          <div class="d-flex flex-column">
            <!-- Thriller -->
            <input type="checkbox" class="btn-check thriller" id="thriller" autocomplete="off" name="generoUsuario[]" value="thriller">
            <label class="btn btn-outline-primary mb-5 thriller-label" for="thriller">Thriller</label>
            <!-- Poesía -->
            <input type="checkbox" class="btn-check poesia" id="poesia" autocomplete="off" name="generoUsuario[]" value="poesia">
            <label class="btn btn-outline-primary mb-5 poesia-label" for="poesia">Poesía</label>
          </div>



          <div class="d-flex flex-column">
            <!-- Drama -->
            <input type="checkbox" class="btn-check drama" id="drama" autocomplete="off" name="generoUsuario[]" value="drama">
            <label class="btn btn-outline-primary mb-5 drama-label" for="drama">Drama</label>
            <!-- Biografía -->
            <input type="checkbox" class="btn-check biografia" id="biografia" autocomplete="off" name="generoUsuario[]" value="biografia">
            <label class="btn btn-outline-primary mb-5 biografia-label" for="biografia">Biografía</label>
          </div>



          <div class="d-flex flex-column">
            <!-- Misterio -->
            <input type="checkbox" class="btn-check misterio" id="misterio" autocomplete="off" name="generoUsuario[]" value="misterio">
            <label class="btn btn-outline-primary mb-5 misterio-label" for="misterio">Misterio</label>
            <!-- Policíaca -->
            <input type="checkbox" class="btn-check policiaca" id="policiaca" autocomplete="off" name="generoUsuario[]" value="policiaca">
            <label class="btn btn-outline-primary mb-5 policiaca-label" for="policiaca">Policíaca</label>
          </div>

        </div>

          </div>



<script>
function showPreview(input) {
  var fileInput = input;
  var imagePreview = document.getElementById('imagePreview');
  var imagePreviewContainer = document.getElementById('imagePreviewContainer');

  var file = fileInput.files[0];

  if (file) {
      var reader = new FileReader();

      reader.onload = function (e) {
          imagePreview.src = e.target.result;
      };

      reader.readAsDataURL(file);

      imagePreviewContainer.style.display = 'block';
  } else {
      imagePreviewContainer.style.display = 'none';
  }
}
</script>










<?php include('layout.php'); ?>