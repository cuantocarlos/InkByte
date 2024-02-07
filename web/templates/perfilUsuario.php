<script type="module" src="../web/scripts/perfilUsuario.js"></script>

<div class="container" style="background-color: rgba(255, 228, 225, 0.3);margin-top:100px;">
        <div class="p-3 ps-5 pt-3">

        <div class="d-flex" >
        <div class= "d-flex px-5" style="border: 2px solid rgba(255, 228, 225, 0.9);">
          <div class="d-flex justify-content-center align-items-center mb-4 me-2">
        <label for="foto_perfil" id="imagePreviewContainer" style="cursor:default;">
          <img id="imagePreview" src='../app/archivos/img/perfil/<?php echo $_SESSION["foto_perfil"] ?>'>
        </label>
        </div>


        <div class="d-flex flex-column align-items-center justify-content-center mx-4 me-5">
          <h3><strong>@<?php echo $_SESSION["nombre"] ?></strong></h3>
          <h5><?php echo $_SESSION["nick"] ?></h5>
          </div>

          <div class="d-flex align-items-center justify-content-center ms-5">
        <div class="d-flex gap-3 flex-column">
              <input type="radio" class="btn-check" id="lector" name="opcion_usuario" value="lector" autocomplete="off">
              <label class="btn btn-outline-success" for="lector">Lector</label>
              <input type="radio" class="btn-check" id="escritor" name="opcion_usuario" value="escritor" autocomplete="off">
              <label class="btn btn-outline-danger" for="escritor">Escritor</label>
              </div>

              <div class="d-none" id="nivel_usuario"><?php echo $_SESSION["nivel"] ?></div>

              </div>
              </div>

              <div class="flex-grow-1"></div>
        </div>

        </div>

      <div class="d-flex gap-5 ms-5" >
        <div class="d-flex justify-content-start align-items-start p-3 flex-column mt-5 flex-grow-1" style="border: 2px solid rgba(255, 228, 225, 0.9);">
          <h4>Descripción:</h4>
        <p style="overflow-wrap:break-word;"><?php echo $_SESSION["descripcion"] ?></p>
      </div>


      <div class="d-flex flex-column justify-content-end gap-3 mx-3 pb-2">
          <button class="button button-pink" data-bs-toggle="modal" data-bs-target="#modal">Editar</button>
          <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalPass">Cambiar contraseña</button>
        </div>


        </div>





    <hr style="border: 1px solid #ff65a3;" class="mt-5">




      <!-- MODAL CAMBIO CONTRASEÑA -->
      <div class="modal fade" id="modalPass" tabindex="-1" aria-labelledby="modalPass" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Cambiar contraseña:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?ctl=cambiaPass" method="POST" class="mt-4">
            <div class="form-floating mx-5">
                  <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" required>
                  <label for="pass">Nueva Contraseña</label>
                  <div class="mb-4 mx-5-md mx-5-lg">La contraseña debe contener: <span id="mayus" class="">1 Mayúscula</span>, <span id="minus" class="">1 minúscula</span>, <span id="num" class="">1 número</span>, <span id="especial" class="">1 carácter especial</span>. <span id="longitud" class="">Entre 8 y 16 caracteres</span></div>
                </div>

                <div class="form-floating mx-5">
                  <input type="password" class="form-control rounded-3" id="pass2" placeholder="Password" name="pass2" required>
                  <label for="pass2">Repita Nueva Contraseña</label>
                </div>

                <div id="pass2Mal" class="mb-4 text-danger mx-5 px-3"></div>

                <hr>

                <div class="h5 mx-5 mt-4">Escribe tu antigua contraseña:</div>
                <div class="form-floating mx-5">
                  <input type="password" class="form-control rounded-3" placeholder="Password" name="oldPass" id="oldPass" required>
                  <label for="oldPass">Contraseña</label>
                </div>

                <?php if($_SESSION["mensaje"]!=="") :?>
                  <div id="oldMal" class="mb-4 text-danger mx-5 px-3"><?php echo $_SESSION["mensaje"]; ?></div>
                <?php endif; ?>

                <div class="my-3 d-flex justify-content-end me-5">
                  <input type="submit" name="bAceptar" class="btn btn-primary " value="Confirmar">
                </div>
            </form>

      </div>
    </div>
  </div>

      <!-- MODAL MODIFICACION PERFIL -->

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar el Perfil:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="index.php?ctl=modificaUsuario" method="POST" class="p-4 " enctype=multipart/form-data>

    <div class="d-flex flex-row me-4 mb-2">
      <div class="d-flex align-items-center mb-4 me-4">
        <input class="d-none" type="file" id="f_perfil" name="f_perfil" onchange="showPreview(this)">
        <label for="f_perfil" id="contenedorImagen">
          <img id="vistaImagen" src='../app/archivos/img/perfil/<?php echo $_SESSION["foto_perfil"] ?>'>
        </label>
        </div>


        <div class="d-flex justify-content-center align-items-center flex-column">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" id="nombre" value='<?php echo $_SESSION["nombre"]; ?>'>
          </div>

        <div id="nombreMal" class="mb-3 text-danger"></div>

            <input type="text" name="nick" class="form-control" value='<?php echo $_SESSION["nick"]; ?>'>
      </div>
      </div>

            <div class="d-flex justify-content-end">
              <small class="text-body-secondary mb-1">Máximo 300 caracteres.</small>
            </div>
              <div class="form-floating">
              <textarea class="form-control" placeholder="descripción" id="descripcion" style="height: 100px" name="descripcion"><?php echo $_SESSION["descripcion"] ?></textarea>
              <label for="descripcion">Descripción</label>
              </div>

      <div class="d-flex justify-content-end">
      <input type="submit" class="btn btn-primary mt-4" name="bAceptar" value="Confirmar">
      </div>

      </form>


</div>
</div>
        </div>


        <!-- GENEROS DE USUARIO -->


        <div class="d-flex justify-content-center mt-1" >
          <h2 class="h2 mt-3">Tus géneros favoritos</h2>
        </div>
        <div class="container d-flex pt-3 gap-3 justify-content-center mt-1" >

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
  var imagePreview = document.getElementById('vistaImagen');
  var imagePreviewContainer = document.getElementById('contenedorImagen');

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