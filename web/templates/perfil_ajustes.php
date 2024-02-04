<script type="module" src="../scripts/bGeneral.js"></script>
<!--<script type="module" src="../scripts/validar_ajustes.js"></script>-->

<?php
session_start();
$_SESSION['id_user'] = 1;
$_SESSION['nombre'] = "falfredo";
$_SESSION['nick'] = "anastasio";
$_SESSION['email'] = "garcia@endesa.es";
$_SESSION['descripcion'] = "descripcioooooooooooooooon";
$_SESSION['f_nacimiento'] = "1999-12-12";
$_SESSION['f_perfil'] = "foto.jpg";
$_SESSION['nivel'] = 1;
//saco un usuario de la base de datos y lo guardo en la sesion


function marcarNivel($opcion)
{
    if ($opcion == $_SESSION['nivel']) {
        echo "checked";
    }
}

echo "<pre>";
print_r($_SESSION);
if (isset($_SESSION['params']['errores']['nombre'])) {
    print_r($_SESSION['params']['errores']['nombre']);
}
echo "</pre>";



print_r($_SESSION);

?>

<div class="container-md mt-5">
    <div class="header p-5 pb-4 border-bottom-0">
        <h1 class="fw-bold mb-0 fs-2 mb-4">Modifica los datos que desees</h1>
    </div>
    <div class="body p-5 pt-0">
        <form action="../index.php?ctl=perfilAjustes" method="post" enctype="multipart/form-data" id="">

            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3" id="nombre" name="nombre" placeholder="nombre" pattern="[A-Za-z\sñÑçÇ]+" minlength="3" maxlength="60" value="<?php echo $_SESSION['nombre']; ?>" />
                <label for="nombre">Nombre y Apellidos</label>
            </div>
            <div id="nombreMal" class="mb-3 text-danger mx-5 " ><?php echo isset($_SESSION['params']['errores']['nombre']) ? $_SESSION['params']['errores']['nombre'] : '' ?></div>

            <div class="input-group mb-3">
                <span class="input-group-text">@</span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="nick" placeholder="nick" name="nick" pattern="[A-Za-z\sñÑçÇ]+" value="<?php echo $_SESSION['nick']; ?>"/>
                    <label for="nick">Nombre de Usuario</label>
                </div>
            </div>
            <div id="nickMal" class="mb-3 text-danger"></div>


            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3" id="mail" placeholder="name@example.com" name="mail" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" value="<?php echo $_SESSION['email']; ?>" />
                <label for="mail">Correo Electrónico</label>
            </div>
            <div id="mailMal" class="mb-3 text-danger mx-5"></div>


            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\d\s]).{8,16}$" />
                <label for="pass">Contraseña Nueva</label>
            </div>
            <small class="text-body-secondary mb-1">Mínimo: <span id="mayus" class="">1 Mayúscula</span>, <span id="minus" class="">1 minúscula</span>, <span id="num" class="">1 número</span>, <span id="especial" class="">1 carácter especial</span>. <span id="longitud" class="">Entre 8 y 16 caracteres</span></small>

            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="pass2" placeholder="Password" name="pass2" />
                <label for="pass2">Repetir Contraseña Nueva</label>
            </div>
            <div id="pass2Mal" class="mb-3 text-danger "></div>
            <!--<div id="fechaMal" class="mb-3 text-danger"></div>
                <div class="form-floating mb-3">
                <input type="date" class="form-control rounded-3" id="fecha" name="fecha" />
                <label for="fecha">Fecha de Nacimiento</label>
            </div> -->
            <div class="mb-5">
                <label for="f_perfil" class="form-label">Para modificar su foto de perfil seleccione una nueva:</label>
                <input class="form-control" type="file" id="f_perfil" name="f_perfil" accept="image/<?php $extensionesValidas?>" />
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Añade una descripción" id="descripcion" style="height: 100px;" name="descripcion" maxlength="300"><?php echo $_SESSION['descripcion']; ?></textarea>
                <label for="descripcion">Descripción</label>
            </div>
            <small class="text-body-secondary mb-1">Máximo 300 caracteres.</small>
            <hr class="my-4" />
            <h2 class="fs-5 fw-bold mb-3">Eres lector o escritor?</h2>
            <input type="radio" class="btn-check" id="lector" name="opcion_usuario" value="1" <?php marcarNivel(1)?> autocomplete="off" />
            <label class="btn btn-outline-secondary" for="lector">Lector</label>
            <input type="radio" class="btn-check" id="escritor" name="opcion_usuario" value="2" <?php marcarNivel(2)?> autocomplete="off" />
            <label class="btn btn-outline-secondary" for="escritor">Escritor</label>
            <hr class="my-4" />

            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3" id="oldpass" placeholder="Password" name="oldpass" />
                <label for="oldpass">Contraseña Actual</label>
            </div>


            <?php
                $mensaje = ''; // Valor por defecto
                if (isset($_SESSION['params']['mensaje']['tipo'])) {
                    $class = $_SESSION['params']['mensaje']['tipo'] == 'error' ? 'alert alert-danger' : 'alert alert-success';
                    $mensaje = $_SESSION['params']['mensaje']['texto'] == "ok" ? "Datos modificados correctamente" : $_SESSION['params']['mensaje']['texto'];
                }
            ?>

            <div class="<?php echo $class ?>"><?php echo $mensaje ?></div>

            <button class="w-100 my-2 btn btn-lg rounded-3 btn-primary" id="bAceptar" name="bAceptar" type="submit">Modificar datos</button>
        </form>
    </div>
</div>

<?php include 'layout.php'?>
<!--Poner el $extensionesValidas en el input de la foto de perfil-->