<?php
//variables de sesión
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$id = $_SESSION['id_user'];
//variables para la base de datos
$cumple;
$descripcionProfile;
$rutaImagenPerfil;

$librosFavoritos;
$librosLeidos;
$librosPendientes;
$librosPublicados;
//una vez ya tengo el nombre y el email, hago la consulta para sacar el resto de datos
$consulta = "SELECT * FROM usuarios WHERE id_user = $id";
$resultado = $conexion->query($consulta);
?>
<div class="container mt-5">
    <div class="row">
        <!-- Sección de la foto de perfil -->
        <div class="col-md-4">
            <img src="<?php echo $rutaImagenPerfil; ?> " alt="Foto de Perfil" class="img-fluid rounded-circle" />
        </div>

        <!-- Sección de información del perfil -->
        <div class="col-md-8">
            <h2>
                <?php echo $nombre; ?>
                <p>
                    Fecha de Nacimiento:
                    <?php echo $cumple; ?>
                </p>
                <p>
                    Correo Electrónico:
                    <?php echo $email; ?>
                </p>
                <p>
                    Descripción:
                    <?php echo $descripcionProfile; ?>
                </p>
            </h2>
        </div>
    </div>
    <!-- Sección de los libros -->
    <div class="row">
        <div class="col-md-3">
            <h3>Libros Favoritos</h3>
            <!-- <p><?php echo $librosFavoritos; ?></p> -->
            <!-- Pongo un slider con cards (los libros) -->
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h3>Libros Leidos</h3>
            <p><?php echo $librosLeidos; ?></p>
        </div>
        <div class="col-md-3">
            <h3>Libros Pendientes</h3>
            <p><?php echo $librosPendientes; ?></p>
        </div>
        <div class="col-md-3">
            <h3>Libros Publicados</h3>
            <p><?php echo $librosPublicados; ?></p>
        </div>
    </div>
</div>
<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-csSR1II5TRV6zW2xIqC1l4C6IN5/xtz9F1qQjD8rA7C6MSQ63bAsHtkgqFMybzRc" crossorigin="anonymous"></script>
