<script type="module" src="../web/scripts/bGeneral.js"></script>

<div class="bg-body-secondary p-4 py-md-5">
    <div class="rounded-4 shadow">
        <div class="p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2">Ponte en contacto con nosotros</h1>
            <label class="mb-2" for="terminos">
                <small class="text-body-secondary">Danos detalles de tu asunto y te contactaremos lo antes
                    posible.</small>
            </label>
        </div>

        <div class="p-5 pt-0">
            <form method="post" action="">
                <!-- Contenido del formulario -->
                <div class="form-floating mb-3">
                <label for="name">Nombre</label>
                    <input type="text" class="form-control rounded-3" id="name" placeholder="Nombre"
                        pattern="[A-Za-z\s]+" minlength="3" maxlength="60" required>
                </div>
                <div class="form-floating mb-3">
                <label for="asunto">Asunto</label>
                    <input type="text" class="form-control rounded-3" name="asunto" id="asunto" placeholder="Asunto" minlength="3"
                        maxlength="50" required>
                </div>
                <div class="form-floating mb-3">
                <label for="description">Explica el motivo de tu contacto</label>
                    <input type="text" class="form-control rounded-3" name="description" id="description" placeholder="Explica el motivo de tu contacto" minlength="3" maxlength="500">
                </div>
                <div class="form-floating mb-3">
                <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control rounded-3" id="mail" placeholder="name@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                        required>
                </div>
                <div class="form-floating mb-3">
                <label for="telephone">Teléfono</label>
                    <input type="tel" class="form-control rounded-3" name="telephone" id="telephone"
                        pattern="[0-9]{9}" maxlength="9" placeholder="Teléfono">
                </div>
                <div class="form-floating mb-3">
                    <label for="horario">A que hora prefieres que nos pongamos en contacto</label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="1" selected>Mañana</option>
                        <option value="2">Mediodía</option>
                        <option value="3">Noche</option>
                    </select>
                </div>
                <label class="mb-2" for="terminos">
                    <input type="checkbox" id="terminos" value="terminos" required>
                    <small class="text-body-secondary">Aceptas los términos y condiciones.</small></label>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>

<!-- Incluye los scripts de Bootstrap y jQuery al final del cuerpo del documento -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
