<div class="container bg-rosa" style="padding-top:5rem;">
    <h1 class="mb-4">Recomendaciones</h1>
    <?php
if ($params["num_generos"] > 0) {
    foreach ($params["recomendaciones"] as $genero => $libros) {
        echo '<div class="genero border-bottom d-flex flex-column  justify-content-center align-items-center">';
        echo '    <div class="align-self-start"><h3>' . ucfirst($genero) . '</h3></div>';
        echo '<div class="d-flex flex-row align-items-center">';
        for ($i = 0; $i < count($params["recomendaciones"][$genero]); $i++) {
            echo '<a href="index.php?ctl=book&id_libro=' . $libros[$i]['id_libro'] . '" class="link-div">';
            echo '    <div class="m-3">';
            echo '        <div class="d-flex justify-content-center"><img src="../app/archivos/img/libro/' . $libros[$i]['imagen_portada'] . '" class="flex-shrink-0" style="height: 150px; flex-shrink: 0;"></div>';
            echo '        <p>' . $libros[$i]['titulo'] . '</p>';
            echo '    </div>';
            echo '</a>';
        }
        
        echo '</div>';
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