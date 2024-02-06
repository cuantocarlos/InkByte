<div class="container border bg-rosa" style="padding-top:5rem;">
    <h1 class="mb-4">Recomendaciones</h1>
    <?php
if ($params["num_generos"] > 0) {
    foreach ($params["recomendaciones"] as $genero => $libros) {
        echo '<div class="genero border d-flex flex-column align-items-center">';
        echo '    <h3>' . ucfirst($genero) . '</h3>';
        for ($i = 0; $i < 1; $i++) {
            echo '    <div class="libro border d-flex flex-column ">';
            echo '        <img src="../app/archivos/img/libro/' . $libros[$i]['imagen_portada'] . '" class="flex-shrink-0" style="height: 150px;">';
            echo '        <p>'. $libros[$i]['titulo'] .'</p>';
            echo '    </div>';
        }
        echo '</div>';
    }
} else {
    echo '<div class="container border d-flex flex-column p-4 justify-content-center align-items-center">';
    echo '    <img src="../app/archivos/img/iconos/no-fav.png" class="border" style="height: 400px;">';
    echo '    <h3 class="m-5">Vaya, parece que no hay ningún libro con ese nombre</h3>';
    echo '</div>';
}
?>

</div>

<?php
include('layout.php');
?>