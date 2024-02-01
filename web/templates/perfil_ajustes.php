<script type="module" src="../web/scripts/bGeneral.js"></script>
<script type="module" src="../web/scripts/validar_ajustes.js"></script>

<?php
$id = $_SESSION['id_user']

?>

<div class="container">
    <div class="header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2 mb-4">Modifica los datos que desees cambiar</h1>
    </div>
    <div class="body p-5 pt-0">
        <form action="index.php?ctl=registro" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="nombre" name="nombre" placeholder="nombre" pattern="[A-Za-z\sñÑçÇ]+" minlength="3" maxlength="60" />
                <label for="nombre">Nombre y Apellidos</label>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">@</span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="nick" placeholder="nick" name="nick" pattern="[A-Za-z\sñÑçÇ]+" />
                    <label for="nick">Nombre de Usuario</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="mail" placeholder="name@example.com" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                <label for="mail">Correo Electrónico</label>
            </div>
            <!-- <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="oldpass" placeholder="Password" name="oldpass" />
                <label for="oldpass">Contraseña Actual</label>
            </div>
            <small class="text-body-secondary mb-1">Mínimo: 8 caracteres, mayúsculas, minúsculas, y caracteres.</small>
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" pattern="(?=.*\d)(?=.*[a-zñç])(?=.*[A-ZÇÑ])(?=.*[$@¿?¡!_-])[a-zA-Z\d$@¿?¡!_-ñÑçÇ]{8,16}" />
                <label for="pass">Contraseña Nueva</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass2" placeholder="Password" name="pass2" />
                <label for="pass2">Repetir Contraseña Nueva</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control rounded-3" id="fecha" name="fecha" />
                <label for="fecha">Fecha de Nacimiento</label>
            </div> -->
            <div class="mb-5">
                <label for="f_perfil" class="form-label">Para modificar su foto de perfil seleccione una nueva:</label>
                <input class="form-control" type="file" id="f_perfil" name="f_perfil" accept="image/<?php $extensionesValidas?>" />
            </div>
            <small class="text-body-secondary mb-1">Máximo 300 caracteres.</small>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Añade una descripción" id="descripcion" style="height: 100px;" name="descripcion" maxlength="300"></textarea>
                <label for="descripcion">Descripción</label>
            </div>
            <hr class="my-4" />
            <h2 class="fs-5 fw-bold mb-3">Eres lector o escritor?</h2>
            <input type="radio" class="btn-check" id="lector" name="opcion_usuario" value="lector" checked autocomplete="off" />
            <label class="btn btn-outline-secondary" for="lector">Lector</label>
            <input type="radio" class="btn-check" id="escritor" name="opcion_usuario" value="escritor" autocomplete="off" />
            <label class="btn btn-outline-secondary" for="escritor">Escritor</label>
            <hr class="my-4" />

            <button class="w-100 my-2 btn btn-lg rounded-3 btn-primary" id="bAceptar" name="bAceptar" type="submit">Modificar datos</button>
        </form>
    </div>
</div>

<?php include 'layout.php'?>
<!--Poner el $extensionesValidas en el input de la foto de perfil-->