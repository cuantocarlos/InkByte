<?php
  $id_libro = isset($_POST["id_libro"]) ? $_POST["id_libro"] : null;
  $_SESSION["id_libro"]=$id_libro;
?>

    


    <!--seccion libro-->

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content mt-5" style="background-color: #fff4f4; width: 100%; height: 460px;">
                        <div class="row justify-content-around">
                            <!-- Columna para la imagen -->
                            <div class="col-md-4 position-relative mt-md-0 mt-3">
                                <img src="../app/archivos/img/libro/<?php echo($params['imagen_portada']) ?>" alt="banner" class="banner-image position-absolute top-0 start-0" style=" height: 450px; margin-left: 60px;">
                            </div>
                            <!-- Columna para el texto -->
                            <div class="col-md-6 mt-md-2 mt-3 ms-md-2">
                                <!-- Título, autor y valoración -->
                                <div class="mb-3 ">
                                    <h1 class="fw-bold"><?php echo($params['titulo']); ?></h1>
                                    <p style="margin-left: 8px;";> Autor: <?php echo($params['autor']); ?></p>
                                    <section id="contador-de-capitulos" >
                                        <div class="container mt-3 ">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="" method="post">
                                                        <label for="capituloDropdown" class="form-label">Selecciona un capítulo</label>
                                                        <div class="d-flex">
                                                        <select id="capituloDropdown" class="form-select" name="contador_capitulos">
                                                            
                                                            <?php 
                                                                $i = 1;
                                                                foreach($capitulos as $capitulo){
                                                                    echo '<option value='. $i . '> Capítulo ' . $i . ' - ' . $capitulo["titulo"] . '</option>';
                                                                    $i++;
                                                                }
                                                            ?>
                                                        </select>
                                                        <div class="col-md-6 d-flex flex-column ms-3 justify-content-end">
                                                            <button type="submit" class=" col-12 btn-dark btn justi" name="seleccionar_capitulo">Leer capítulo</button>
                                                        </div>
                                                        </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </section>


                                    <!-- Contenedor para las estrellas -->
                                    <div class="d-flex align-items-center mr-auto">
                                        <fieldset class="rating">
                                        <div class="rating m-2 gap-1">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Excelente"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Muy bueno"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Bueno"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Regular"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Malo"></label>
                                        </div>

                                        

                                        </fieldset>

                                        <button class="btn btn-dark m-3" name="valorar" id="valorar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                                                <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.73 1.73 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.73 1.73 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.73 1.73 0 0 0 3.407 2.31zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z"/>
                                            </svg>
                                                Valorar
                                        </button>
                                    </div>
                                    <div class="">
                                        <p>
                                            <?php echo $params['sinopsis'] ?>
                                        </p>
                                    </div>


                                </div>

                                <!-- Botones -->
                                <div class="d-flex flex-wrap">
                            
                                    <button class="btn btn-dark me-3">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.186 2.09c.521.25 1.136.612 1.625 1.101.49.49.852 1.104 1.1 1.625.313.654.11 1.408-.401 1.92l-7.214 7.213c-.31.31-.688.541-1.105.675l-4.222 1.353a.75.75 0 0 1-.943-.944l1.353-4.221a2.75 2.75 0 0 1 .674-1.105l7.214-7.214c.512-.512 1.266-.714 1.92-.402zm.211 2.516a3.608 3.608 0 0 0-.828-.586l-6.994 6.994a1.002 1.002 0 0 0-.178.241L9.9 14.102l2.846-1.496c.09-.047.171-.107.242-.178l6.994-6.994a3.61 3.61 0 0 0-.586-.828zM4.999 5.5A.5.5 0 0 1 5.47 5l5.53.005a1 1 0 0 0 0-2L5.5 3A2.5 2.5 0 0 0 3 5.5v12.577c0 .76.082 1.185.319 1.627.224.419.558.754.977.978.442.236.866.318 1.627.318h12.154c.76 0 1.185-.082 1.627-.318.42-.224.754-.559.978-.978.236-.442.318-.866.318-1.627V13a1 1 0 1 0-2 0v5.077c0 .459-.021.571-.082.684a.364.364 0 0 1-.157.157c-.113.06-.225.082-.684.082H5.923c-.459 0-.57-.022-.684-.082a.363.363 0 0 1-.157-.157c-.06-.113-.082-.225-.082-.684V5.5z" fill="#ffff"></path>
                                            </g>
                                        </svg>
                                        Escribir reseña</button>
                                    <button class="btn btn-dark descriptionButton me-3" name="seguir" id="seguir">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        Favoritos</button>
                                </div>
                                </form>                             
                            </div><!--banner-content-->
                        </div>
                    </div><!--main-content-->
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="container">
            <h2>Reseñas</h2>
            <hr>
        </div>
        <div class="container contenedor-review mt-5">
    <div class="row d-flex">
        <div class="col-md-12 justify-content-end custom-margin-right">

            <div class="blog-comment">
                <ul class="comments">
                    <?php
                    // Array de comentarios de prueba
                    $comentariosDePrueba = array(
                        array('usuario' => 'Ivan', 'anio' => 2024, 'contenido' => 'Cristian es mujer que se corte el pelo'),
                        array('usuario' => 'Porta', 'anio' => 2024, 'contenido' => 'Ivan que me deja ayuda'),
                        array('usuario' => 'Segura', 'anio' => 2024, 'contenido' => 'Ivan que me despiden'),
                        // Agrega más comentarios según sea necesario
                    );

                    // Imprime los comentarios
                    foreach ($comentariosDePrueba as $comentario) :
                    ?>
                        <li class="clearfix">
                            <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
                            <div class="post-comments">
                                <p class="meta"> <?= $comentario['anio'] ?> <a href="#"><?= $comentario['usuario'] ?></a> <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                                <p><?= $comentario['contenido'] ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

    </section>

    <?php include 'layout.php' ?>
