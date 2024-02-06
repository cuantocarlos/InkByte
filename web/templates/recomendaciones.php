<div class="container border bg-rosa" style="padding-top:5rem;">
    <h1 class="mb-4">Recomendaciones</h1>
    <?php
    if (count($librosSeguidos) > 0) {
        for ($i = 0; $i < count($librosSeguidos)-1; $i++) {
            $libro = $librosSeguidos[$i];
            $autor = $nombresAutores[$i];
            
            echo '<div class="container border mt-1 d-flex p-2 align-items-center">';
            echo '    <img src="../app/archivos/img/libro/' . $libro["imagen_portada"] . '" class="border" style="height: 150px;">';
            echo '    <div class="ms-2">';
            echo '        <form action="index.php?ctl=book&id_libro=' . $libro["id_libro"] . '" method="post">';
            echo '            <h4>';
            echo '                <input type="hidden" name="id_libro" value="' . $libro["id_libro"] . '">';
            echo '                <button type="submit" class="btn-link" style="border: none; padding: 0; background: none; text-decoration: none;">';
            echo '                    ' . $libro["titulo"];
            echo '                </button>';
            echo '            </h4>';
            echo '        </form>';
            echo '        <form action="index.php?ctl=perfil&id_user=' . $libro["id_user"] . '" method="post">';
            echo '            <h5>';
            echo '                <input type="hidden" name="id_autor" value="' . $libro["id_user"] . '">';
            echo '                <button type="submit" class="btn-link" style="border: none; padding: 0; background: none; text-decoration: none;">';
            echo '                    Autor: ' . $autor;
            echo '                </button>';
            echo '            </h5>';
            echo '        </form>';
            
            echo '        <p>Valoración: ' . $libro["valoracion"] . '</p>';
            echo '        <p>' . $libro["sinopsis"] . '</p>';
            
            echo '    </div>';
            echo '</div>';
        }
    } else {
        echo '<div class="container border d-flex flex-column p-4 justify-content-center align-items-center">';
        echo '    <img src="../app/archivos/img/iconos/no-fav.png" class="border" style="height: 400px;">';
        echo ' <h3 class="m-5">Vaya, parece que no hay ningún libro con ese nombre</h3>';
    echo '</div>';
    }
    ?>
</div>

<?php
include('layout.php');
?>