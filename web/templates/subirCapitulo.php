
    <script type="module" src="../web/scripts/bGeneral.js"></script>
    <script type="module" src="../web/scripts/validar_subirCapitulo.js"></script>
<div class="container d-flex flex-column mt-5">
          <div class="header p-5 ps-0 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2 mb-4">Sube tu capítulo</h1>
          </div>
          <form action="index.php?ctl=subirCapitulo" method="post" enctype="multipart/form-data">
                <div class="container d-flex justify-content-end my-2">
                    <small class="text-body-secondary">Los campos con * son obligatorios</small>
                </div>

                <div class="form-group mb-3">
                    <label for="tus_opciones">Selecciona un libro:</label>
                    <select class="form-control rounded-3 pt-3 pb-3" id="tus_opciones" name="tus_opciones">
                        <?php
                            for ($i = 0; $i < count($titulos); $i++) {
                                echo '<option value='. $ids[$i] . '>' . $titulos[$i] . '</option>';
                            }                    
                        ?>
                    </select>
                </div>

                <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="titulo_cap" name="titulo_cap" placeholder="Título del capítulo*">
                <label for="nombre">Título*</label>
              </div>

              <div class="mb-5">
              <label for="archivoPDF" class="form-label">Seleccione su capítulo:</label>
              <input class="form-control" type="file" id="archivoPDF" name="archivoPDF" accept=".pdf">
              </div>

                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary mt-4" type="submit" name="bAceptar">Subir capítulo</button>
            </form>

    </div>



<?php include('layout.php'); ?>