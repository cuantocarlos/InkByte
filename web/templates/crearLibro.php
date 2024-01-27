<div class="container d-flex flex-column mt-5">
        <div class="header p-5 ps-0 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2 mb-4">Crea tu libro</h1>
        </div>
        <form action="index.php?ctl=subirCapitulo" method="post" enctype="multipart/form-data">
            <div class="container d-flex justify-content-end my-2">
                <small class="text-body-secondary">Los campos con * son obligatorios</small>
            </div>



            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="titulo_lib" name="titulo_lib"
                    placeholder="Título del capítulo*">
                <label for="nombre">Título*</label>
            </div>

            <small class="text-body-secondary mb-1">Máximo 300 caracteres.</small>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Añade una descripción" id="descripcion"
                    style="height: 100px" name="descripcion"></textarea>
                <label for="descripcion">Descripción</label>
            </div>

            <div class="form-group mb-3">
                <label for="tus_opciones">Selecciona la edad recomendada:</label>
                <div class="ms-3">
                    <div>
                        <label>
                            <input type="radio" name="tus_opciones" value="1"> Para todos los públicos
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="tus_opciones" value="2"> Mayores de 12 años
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="tus_opciones" value="3"> Mayores de 16 años
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="tus_opciones" value="4"> Mayores de 18 años
                        </label>
                    </div>
                </div>

            </div>

            <div class="mb-5">
                <label for="portadaLibro" class="form-label">Seleccione la portada:</label>
                <input class="form-control" type="file" id="portadaLibro" name="portadaLibro">
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary mt-4" type="submit" name="bAceptar">Crear libro</button>
        </form>

    </div>

    <?php include 'layout.php' ?>