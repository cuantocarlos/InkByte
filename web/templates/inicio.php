<div class="bg-rosa container" style="margin-top:6rem;">
  <div class="d-none d-xl-block">
    <h2 class="fw-bold">
      Últimas publicaciones
    </h2>
      <div class="justify-content-evenly d-flex">
      <?php
        for($i = count($params["ultimos"])-1; $i >= 0; $i--){
            echo '<a href="index.php?ctl=book&id_libro=' . $params['ultimos'][$i]['id_libro'] . '" class="link-div text-decoration-none text-black">';
            echo '    <div class="m-3 d-flex flex-column align-items-center">';
            echo '        <div class="d-flex justify-content-center"><img src="../app/archivos/img/libro/' . $params['ultimos'][$i]['imagen_portada'] . '" class="flex-shrink-0" style="height: 10rem; flex-shrink: 0;"></div>';
            echo '        <p>' . $params['ultimos'][$i]['titulo'] . '</p>';
            echo '    </div>';
            echo '</a>';
        }
      ?>
      </div>
  </div>
  <div class="row flex-wrap-reverse flex-md-nowrap">
        <div class="flex flex-column col-12 col-md-6">
          <h2 class="fw-bold">Mejor valorados</h2>
          <?php 
            for($i = 0; $i < count($params["top_rated"]); $i++){
              $libro = $params["top_rated"][$i];
              $autor = $params["nombres_autores"][$i];
              
              echo '<div class="container border mt-1 d-flex p-2 align-items-center">';
              echo '    <img src="../app/archivos/img/libro/' . $libro["imagen_portada"] . '" class="border" style="height: 10rem;">';
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
              echo '                    Autor: ' . $autor;
              echo '            </h5>';
              echo '        </form>';
              
              echo '        <p>Valoración: ' . $libro["valoracion"] . '</p>';
              
              echo '    </div>';
              echo '</div>';
            }
          ?>

        </div>
        <div class="flex flex-column col-12 col-md-6">
          <h2 class="fw-bold mb-3">Podría interesarte</h2>
          <a href="index.php?ctl=book&id_libro=<?php echo $params["recomendacion"]["id_libro"] ?> " class="link-div text-decoration-none text-black">
          <div class="d-flex flex-column align-items-center">
            <img src="../app/archivos/img/libro/<?php echo $params['recomendacion']["imagen_portada"]; ?>" style="height: 20rem;">
            <h3 class="m-2"><?php echo $params['recomendacion']["titulo"]; ?></h3>
            <p class="m-2"><?php echo $params['recomendacion']["sinopsis"]; ?></p>
          </div>
          </a>

        </div>
  </div>
</div>


<?php include('layout.php'); ?>