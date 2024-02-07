
<div class="container d-flex flex-column mt-5">
    <div class="header p-5 ps-0 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2 mb-4">Crea tu libro</h1>
    </div>
    <form action="index.php?ctl=crearLibro" method="post" enctype="multipart/form-data">
        <div class="container d-flex justify-content-end my-2">
            <small class="text-body-secondary">Los campos con * son obligatorios</small>
        </div>



        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="titulo_lib" name="titulo_lib"
                placeholder="Título del capítulo*">
            <label for="nombre">Título*</label>
        </div>

        <small class="text-body-secondary mb-1">Máximo 500 caracteres.</small>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Añade una sinopsis" id="sinopsis" style="height: 100px"
                name="sinopsis"></textarea>
            <label for="sinopsis">Descripción</label>
        </div>

        <div class="form-group">
            <label for="generos">Selecciona los géneros:</label>
            <div class="mt-3 d-xl-flex gap-3 justify-content-center">
                <input type="checkbox" class="btn-check terror" id="terror" autocomplete="off" name="genero[]" value="terror">
                <label class="btn btn-outline-primary mb-3 terror-label" for="terror">Terror</label>
                <input type="checkbox" class="btn-check romance" id="romance" autocomplete="off" name="genero[]" value="romance">
                <label class="btn btn-outline-primary mb-3 romance-label" for="romance">Romance</label>
                <input type="checkbox" class="btn-check fantasia" id="fantasia" autocomplete="off" name="genero[]" value="fantasia">
                <label class="btn btn-outline-primary mb-3 fantasia-label" for="fantasia">Fantasía</label>
                <input type="checkbox" class="btn-check cficcion" id="cficcion" autocomplete="off" name="genero[]" value="cficcion">
                <label class="btn btn-outline-primary mb-3 cficcion-label" for="cficcion">C.Ficción</label>
                <input type="checkbox" class="btn-check historia" id="historia" autocomplete="off" name="genero[]" value="historia">
                <label class="btn btn-outline-primary mb-3 historia-label" for="historia">Historia</label>
                <input type="checkbox" class="btn-check arte" id="arte" autocomplete="off" name="genero[]" value="arte">
                <label class="btn btn-outline-primary mb-3 arte-label" for="arte">Arte</label>
                <input type="checkbox" class="btn-check thriller" id="thriller" autocomplete="off" name="genero[]" value="thriller">
                <label class="btn btn-outline-primary mb-3 thriller-label" for="thriller">Thriller</label>
                <input type="checkbox" class="btn-check poesia" id="poesia" autocomplete="off" name="genero[]" value="poesia">
                <label class="btn btn-outline-primary mb-3 poesia-label" for="poesia">Poesía</label>
                <input type="checkbox" class="btn-check biografia" id="biografia" autocomplete="off" name="genero[]" value="biografia">
                <label class="btn btn-outline-primary mb-3 biografia-label" for="biografia">Biografía</label>
                <input type="checkbox" class="btn-check misterio" id="misterio" autocomplete="off" name="genero[]" value="misterio">
                <label class="btn btn-outline-primary mb-3 misterio-label" for="misterio">Misterio</label>
                <input type="checkbox" class="btn-check policiaca" id="policiaca" autocomplete="off" name="genero[]" value="policiaca">
                <label class="btn btn-outline-primary mb-3 policiaca-label" for="policiaca">Policíaca</label>
                <input type="checkbox" class="btn-check drama" id="drama" autocomplete="off" name="genero[]" value="drama">
                <label class="btn btn-outline-primary mb-3 drama-label" for="drama">Drama</label>
            </div>

        </div>

        <div class="mb-5">
            <label for="portadaLibro" class="form-label">Seleccione la portada:</label>
            <input class="form-control" type="file" id="portadaLibro" name="portadaLibro">
        </div>

        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary mt-4" type="submit" name="bAceptar">Crear
            libro</button>
    </form>

</div>

<?php include 'layout.php' ?>