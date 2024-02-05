<div class="container border-start border-end" style="margin-top:5rem;">
<?php
for ($i = 0; $i < count($libros); $i++) {
    $libro = $libros[$i];
    $autor = $nombresAutores[$i];
    echo '<div class="container border mt-1 d-flex">';
    echo '    <img src="../app/archivos/img/libro/' . $libro["imagen_portada"] . '" style="height: 150px;">';
    echo '    <div class="ms-2">';
    // Contenido adicional dentro del div
    echo '        <h4>' . $libro["titulo"] . '</h4>';
    echo '        <h5>Autor: ' . $autor . '</h5>';
    echo '        <p>' . $libro["sinopsis"] . '</p>';
    echo '    </div>';
    echo '</div>';
}
?>



</div>

<?php include('layout.php'); ?>