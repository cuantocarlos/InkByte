<?php
include '../../app/modelo/classConsultas.php';

try {
    $consulta = new Consultas();
    $usuario = $consulta->obtenerTodoDeUsuario(1); //sacar de sesión
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}print_r($usuario);

$nombre = "Fulano de tal";
$email = "fco.carlos";
$cumple = "12/12/12";
$descripcionProfile = "Lorem ipsum dolor sit";

$rutaImagenPerfil = "https://picsum.photos/200/300";

?>
<div class="container mt-5">
    <div class="row">
        <!-- Sección de la foto de perfil -->
        <div class="col-md-4">
            <img src="<?php echo $rutaImagenPerfil; ?> " alt="Foto de Perfil" class="img-fluid rounded-circle" />
        </div>

        <!-- Sección de información del perfil -->
        <div class="col-md-8">
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
            <p></p>
        </div>
        <div class="col-md-3">
            <h3>Libros Pendientes</h3>
            <p></p>
        </div>
        <div class="col-md-3">
            <h3>Libros Publicados</h3>
            <p></p>
        </div>
    </div>
</div>
<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-csSR1II5TRV6zW2xIqC1l4C6IN5/xtz9F1qQjD8rA7C6MSQ63bAsHtkgqFMybzRc" crossorigin="anonymous"></script>
