<script type="module" src="../web/scripts/generosUsuario.js"></script>







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


        <div class="d-flex justify-content-start align-items-start mx-5 flex-column mt-5 mb-5">
          <h4>Descripción:</h4>
        <p style="overflow-wrap:break-word;" class="mx-3"><?php echo $_SESSION["descripcion"] ?></p>
        </div>


        <div class="d-flex justify-content-end">
          <input type="button" class="btn btn-primary" value="Editar" >
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