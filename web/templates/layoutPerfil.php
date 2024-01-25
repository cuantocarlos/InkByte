<?php
include '../../app/modelo/classConsultas.php';

try {
    // Saco los datos del usuario
    $id_user = 1; // borrar Sacar de sesión el ID
    $consulta = new Consultas();
    $usuario = $consulta->obtenerTodoDeUsuario($id_user);
    // Saco listas de libros del usuario
    $librosLeidos = $consulta->obtenerListaLibros($id_user, "Leidos");
    $librosPendientes = $consulta->obtenerListaLibros($id_user, "Pendientes");

    // Saco las imágenes de los libros favoritos
    $imagenesLibrosLeidos = array();
    $imagenesLibrosPendientes = array();

    $imagenesLibrosLeidos = obtenerImagenesLista("Leidos");
    $imagenesLibrosPendientes = obtenerImagenesLista("Pendientes");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$rutaImagenPerfil = "https://picsum.photos/200/300";

?>
<div class="container mt-5">
    <div class="row">
        <!-- Sección de la foto de perfil -->
        <div class="col-md-4">
            <img src="<?php echo $usuario['foto_perfil'] ?>" alt="Foto de Perfil" class="img-fluid rounded-circle" />
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
    <div class="row">
        <div class="col-md-3">
            <h3>Libros Favoritos</h3>
            <!-- <p><?php echo $librosFavoritos; ?></p> -->
            <!-- Recorro cada libro favorito y pongo una card-->

            <!-- Pongo un slider con cards (los libros) -->
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="..." />
            </div>
        </div>

        <!-- Listas -->
        <div class="col-md-3">
            <h3>Libros Leidos</h3>
            <?php foreach ($imagenesLibrosLeidos as $imagen): ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $imagen; ?>" class="card-img-top" alt="Portada del libro" />
            </div>
            <?php endforeach;?>
        </div>
        <div class="col-md-3">
            <h3>Libros Pendientes</h3>
            <?php foreach ($imagenesLibrosPendientes as $imagen): ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $imagen; ?>" class="card-img-top" alt="Portada del libro" />
            </div>
            <?php endforeach;?>
        </div>
        <div class="col-md-3">
            <h3>Libros Publicados</h3>
            <?php foreach ($imagenesLibrosPublicados as $imagen): ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $imagen; ?>" class="card-img-top" alt="Portada del libro" />
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-csSR1II5TRV6zW2xIqC1l4C6IN5/xtz9F1qQjD8rA7C6MSQ63bAsHtkgqFMybzRc" crossorigin="anonymous"></script>
