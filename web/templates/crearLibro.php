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

        <small class="text-body-secondary mb-1">Máximo 1000 caracteres.</small>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Añade una sinopsis" id="sinopsis" style="height: 100px"
                name="sinopsis"></textarea>
            <label for="sinopsis">Descripción</label>
        </div>

        <div class="form-group mb-3">
            <label for="generos">Selecciona los géneros:</label>
            <div class="ms-3">
                <label><input type="checkbox" name="generos[]" value="terror"> Terror</label>
                <label><input type="checkbox" name="generos[]" value="romance"> Romance</label>
                <label><input type="checkbox" name="generos[]" value="fantasia"> Fantasía</label>
                <label><input type="checkbox" name="generos[]" value="cficcion"> Ciencia Ficción</label>
                <label><input type="checkbox" name="generos[]" value="historia"> Historia</label>
                <label><input type="checkbox" name="generos[]" value="arte"> Arte</label>
                <label><input type="checkbox" name="generos[]" value="thriller"> Thriller</label>
                <label><input type="checkbox" name="generos[]" value="poesia"> Poesía</label>
                <label><input type="checkbox" name="generos[]" value="drama"> Drama</label>
                <label><input type="checkbox" name="generos[]" value="biografia"> Biografía</label>
                <label><input type="checkbox" name="generos[]" value="misterio"> Misterio</label>
                <label><input type="checkbox" name="generos[]" value="policiaca"> Novela Policiaca</label>
            </div>

        </div>

        <div class="form-group mb-3">
            <label for="tus_opciones">Selecciona la edad recomendada:</label>
            <div class="ms-3">
                <div>
                    <label>
                        <input type="radio" name="edad_recomendada" value="1"> Para todos los públicos
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="edad_recomendada" value="2"> Mayores de 12 años
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="edad_recomendada" value="3"> Mayores de 16 años
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="edad_recomendada" value="4"> Mayores de 18 años
                    </label>
                </div>
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