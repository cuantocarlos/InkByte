
<?php
include 'layout.php';
include '../../app/modelo/classModelo.php';
include '../../app/modelo/classConsultas.php';

try {
    // Datos del usuario
    $id_user = 1; // Deberías obtenerlo de la sesión
    $consulta = new Consultas();
    $usuario = $consulta->obtenerTodoDeUsuario($id_user);

    //Datos de los libros
    $librosSeguidos = $consulta->obtenerLibrosPorUsuario($id_user, "Seguidos");
    $librosLeidos = $consulta->obtenerLibrosPorUsuario($id_user, "Leidos");
    $librosPendientes = $consulta->obtenerLibrosPorUsuario($id_user, "Pendientes");
    $librosTerminados = $consulta->obtenerLibrosPorUsuario($id_user, "Terminados");

    $imagenesLibrosSeguidos = array();
    foreach ($librosSeguidos as $libro) {
        $imagenesLibrosSeguidos[] = $libro['imagen_portada'];
    }
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
    <div class="row ">
        <!-- Sección de la foto de perfil -->
        <div class="col-md-4">
            <img src="<?php echo Config::$dir_usuarioLayoutPerfil . $usuario['foto_perfil'] ?>" alt="Foto de Perfil" class="img-fluid rounded" />
        </div>
        <!-- Sección de información del perfil -->
            <div class="col-md-8">
                <div class="d-flex">
                    <h1><?php echo $usuario['nombre']; ?></h1>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/></svg>
                    </a>
                </div>
                <p>
                    Usuario:
                    <?php echo $usuario['nick']; ?>
                </p>
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
    <div class="row mt-4">
        <h3>Seguidos</h3>
        <div class="row mt-4">
            <?php foreach ($imagenesLibrosSeguidos as $imagen): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo Config::$dir_portadaLibro . $imagen; ?>" class="card-img-top " alt="Portada del libro" />
                    </div>
                </div>
                <?php endforeach;?>
        </div>
    </div>

    <div class="row mt-4">
        <h3>Leidos</h3>
        <div class="row mt-4">
            <?php foreach ($imagenesLibrosLeidos as $imagen): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo Config::$dir_portadaLibro . $imagen; ?>" class="card-img-top " alt="Portada del libro" />
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>

    <div class="row mt-4">
        <h3>Pendientes</h3>
        <div class="row mt-4">
            <?php foreach ($imagenesLibrosPendientes as $imagen): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo Config::$dir_portadaLibro . $imagen; ?>" class="card-img-top " alt="Portada del libro" />
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="row mt-4">
        <h3>Terminados</h3>
        <div class="row mt-4">
            <?php foreach ($imagenesLibrosTerminados as $imagen): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo Config::$dir_portadaLibro . $imagen; ?>" class="card-img-top " alt="Portada del libro" />
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-csSR1II5TRV6zW2xIqC1l4C6IN5/xtz9F1qQjD8rA7C6MSQ63bAsHtkgqFMybzRc" crossorigin="anonymous"></script>
