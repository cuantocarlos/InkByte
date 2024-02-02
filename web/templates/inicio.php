<?php
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 1;

try {
    $cs = new Consultas();
    $librosRecomendadosPorGenero = $cs->obtenerLibrosRecomendadosPorGenero($id_user);
} catch (Exception $e) {
    echo '<div class="alert alert-danger" role="alert">';
    echo "Error: " . $e->getMessage();
    echo '</div>';
}
?>

<div class="container mt-4">
    <!-- <h2>Por Género:</h2> -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($librosRecomendadosPorGenero as $libro): ?>
            <div class="col">
                <div class="card recom-card">
                    <div class="card-img-container" style="background-color: #f5f5dc;">
                        <img src="../../../InkByte/app/archivos/img/libro/<?= $libro['imagen_portada'] ?>" class="card-img-top" alt="Portada del libro">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $libro['titulo'] ?></h5>
                        <p class="card-text"><?= $libro['sinopsis'] ?></p>
                        <button type="button" class="btn btn-outline-danger">Añadir a favoritos</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<hr>
<div class="container mt-4">
    <h2>Recomendaciones:</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        try {
            $cs = new Consultas();
            $librosMasVisitados = $cs->obtenerLibrosMasVisitados(6);

            foreach ($librosMasVisitados as $libro): ?>
                <div class="col">
                    <div class="card recom-card">
                        <img src="../app/archivos/img/libro/<?= $libro['imagen_portada'] ?>" class="card-img-top" alt="Portada del libro">
                        <div class="card-body">
                            <h5 class="card-title"><?= $libro['titulo'] ?></h5>
                            <p class="card-text"><?= $libro['sinopsis'] ?></p>
                            <button type="button" class="btn btn-outline-danger">Añadir a favoritos</button>
                            <button type="button" class="btn btn-outline-danger">Leer</button>
                            <button type="button" class="btn btn-outline-danger">Dejar reseña</button>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger" role="alert">';
            echo "Error al obtener libros más visitados: " . $e->getMessage();
            echo '</div>';
        }
        ?>
    </div>
</div>
<?php include 'layout.php' ?>
