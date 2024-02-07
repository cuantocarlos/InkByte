<div class="container border bg-rosa" style="padding-top:4rem;">
<?php
if($libros['mono']){
    echo '<div class="container border d-flex flex-column p-4 justify-content-center align-items-center">';
        echo '    <img src="../app/archivos/img/iconos/mono.avif" class="border" style="height: 400px;">';
        echo ' <h3 class="m-5">Vaya, parece que no hay ningún libro con ese nombre</h3>';
    echo '</div>';
} else {
    for ($i = 0; $i < count($libros)-1; $i++) {
        $libro = $libros[$i];
        $autor = $nombresAutores[$i];
        
        echo '<div class="container border mt-1 d-flex p-2 align-items-center">';
        echo '    <img src="../app/archivos/img/libro/' . $libro["imagen_portada"] . '" class="border" style="height: 10rem;">';
        echo '    <div class="ms-2">';
        echo '        <form action="index.php?ctl=book&id_libro=' . $libro["id_libro"] . '" method="post">';
        echo '            <h4>';
        echo '                <input type="hidden" name="id_libro" value="' . $libro["id_libro"] . '">';
        echo '                <button type="submit" class="btn-link" style="border: none; padding: 0; background: none; text-decoration: none;">';
        echo '                    <p class="text-start">' . $libro["titulo"] . '</p>'; 
        echo '                </button>';
        echo '            </h4>';
        echo '        </form>';
        echo '            <h5>';
        echo '                    Autor: ' . $autor;
        echo '            </h5>';
        
        echo '        <p>Valoración: ' . $libro["valoracion"] . '</p>';
        echo '        <p>' . $libro["sinopsis"] . '</p>';
        
        echo '    </div>';
        echo '</div>';
    }
}
?>




</div>

<?php include('layout.php'); ?>