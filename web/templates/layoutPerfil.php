<?php
include '../../app/modelo/classModelo.php';
include '../../app/modelo/classConsultas.php';

try {
    // Datos del usuario
    $id_user = 1; // Deberías obtenerlo de la sesión
    $consulta = new Consultas();
    $usuario = $consulta->obtenerTodoDeUsuario($id_user);

    //Datos de los libros
    $librosLeidos = $consulta->obtenerLibrosPorUsuarioPRUEBA($id_user, "Leidos");
    $librosPendientes = $consulta->obtenerLibrosPorUsuarioPRUEBA($id_user, "Pendientes");
    $librosTerminados = $consulta->obtenerLibrosPorUsuarioPRUEBA($id_user, "Terminados");

    $imagenesLibrosLeidos = array();
    foreach ($librosLeidos as $libro) {
        $imagenesLibrosLeidos[] = $libro['imagen_portada'];
    }
    $imagenesLibrosPendientes = array();
    foreach ($librosPendientes as $libro) {
        $imagenesLibrosPendientes[] = $libro['imagen_portada'];
    }
    $imagenesLibrosTerminados = array();
    foreach ($librosTerminados as $libro) {
        $imagenesLibrosTerminados[] = $libro['imagen_portada'];
    }



} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Ruta de la imagen de perfil
$rutaImagenPerfil = $usuario['foto_perfil']; // Deberías comprobar si la imagen existe

// $rutaImagenPerfil = "https://picsum.photos/200/300";

?>
<div class="container mt-5">
    <div class="row">
        <!-- Sección de la foto de perfil -->
        <div class="col-md-4">
            <img src="<?php echo Config::$dir_usuarioLayoutPerfil . $usuario['foto_perfil'] ?>" alt="Foto de Perfil" class="img-fluid rounded-circle" />
        </div>
        <!-- Sección de información del perfil -->
        <div class="col-md-8">
            <?php echo $usuario['nombre']; ?>
            <p>
                Fecha de Nacimiento:
                <?php echo $usuario['f_nacimiento']; ?>
            </p>
            <p>
                Correo Electrónico:
                <?php echo $usuario['email']; ?>
            </p>
            <p>
                Descripción:
                <?php echo $usuario['descripcion']; ?>
            </p>
        </div>
    </div>
    <!-- Sección de los libros -->
    <div class="row mt-5">
        <div class="col-md-3">
            <h3>Libros Favoritos</h3>
            <!-- <p><?php echo $librosFavoritos; ?></p> -->
            <!-- Recorro cada libro favorito y pongo una card-->

            <!-- Pongo un slider con cards (los libros) -->
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="..." />
            </div>
        </div>
        <div class="col-md-3">
            <h3>Leidos</h3>
            <?php foreach ($imagenesLibrosLeidos as $imagen): ?>
            <div class="card w-200">
                <img src="<?php echo Config::$dir_portadaLibro . $imagen; ?>" class="card-img-top " alt="Portada del libro" />
            </div>
            <?php endforeach;?>
        </div>
        <div class="col-md-3">
            <h3>Pendientes</h3>
            <?php foreach ($imagenesLibrosPendientes as $imagen): ?>
            <div class="card w-200">
                <img src="<?php echo Config::$dir_portadaLibro . $imagen; ?>" class="card-img-top " alt="Portada del libro" />
            </div>
            <?php endforeach;?>
        </div>
        <div class="col-md-3">
            <h3>Terminados</h3>
            <?php foreach ($imagenesLibrosTerminados as $imagen): ?>
            <div class="card w-200">
                <img src="<?php echo Config::$dir_portadaLibro . $imagen; ?>" class="card-img-top " alt="Portada del libro" />
            </div>
            <?php endforeach;?>
    </div>
</div>
<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-csSR1II5TRV6zW2xIqC1l4C6IN5/xtz9F1qQjD8rA7C6MSQ63bAsHtkgqFMybzRc" crossorigin="anonymous"></script>

<?php include 'layout.php';?>