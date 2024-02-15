<script type="module" src="../web/scripts/bGeneral.js"></script>
<script type="module" src="../web/scripts/validar_contacto.js"></script>


<div class="container-md mt-5">
    <div class="header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2 mb-4">Ponte en contacto con nosotros</h1>
    </div>

        <div class=" body p-5 pt-0">
            <form method="post" action="">
                <label class="mb-2" for="terminos">
                    <small class="text-body-secondary">Danos detalles de tu asunto y te contactaremos lo antes posible.</small>
                </label>
                <!-- Contenido del formulario -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-3" id="name" placeholder="Nombre" pattern="[A-Za-z\s]+" minlength="3" maxlength="60"  /><!--required-->
                    <label for="name" >Nombre</label>
                </div>
                <div id="nombreMal" class="mb-3 text-danger mx-5"></div>

                <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="asunto" id="asunto" placeholder="Asunto" minlength="3" maxlength="50"  /><!--required-->
                    <label for="asunto">Asunto</label>
                </div>
                <div id="asuntoMal" class="mb-3 text-danger mx-5"></div>


                <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" name="description" id="description" placeholder="Explica el motivo de tu contacto" minlength="3" maxlength="500" />
                    <label for="description">Explica el motivo de tu contacto</label>
                </div>

                <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="mail" placeholder="name@example.com" /><!--required-->
                    <label for="email">Correo Electrónico</label>
                </div>
                <div id="mailMal" class="mb-3 text-danger"></div>


                <div class="form-floating mb-3">
                <input type="tel" class="form-control rounded-3" name="telephone" id="telephone" pattern="[0-9]{9}" maxlength="9" placeholder="Teléfono" />
                    <label for="telephone">Teléfono</label>
                </div>
                <div id="telephoneMal" class="mb-3 text-danger"></div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="horario" aria-label="Default select example">
                        <option value="1" selected>Mañana</option>
                        <option value="2">Mediodía</option>
                        <option value="3">Noche</option>
                    </select>
                    <label for="horario">A que hora prefieres que nos pongamos en contacto</label>
                </div>
                <label class="mb-2" for="terminos">
                    <input type="checkbox" id="terminos" value="terminos"  />
                    <small class="text-body-secondary">Aceptas los términos y condiciones.</small>
                </label>
                <div id="terminosMal" class="mb-3 text-danger"></div>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" id="bAceptar">Enviar</button>
            </form>
        </div>
    </div>
</div>


<?php include 'layout.php'?>