<?php
  $id_libro = isset($_POST["id_libro"]) ? $_POST["id_libro"] : null;
  $_SESSION["id_libro"]=$id_libro;
?>

    


    <!--seccion libro-->

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content mt-5 p-3" style="background-color: #fff4f4; width: 100%; height: 460px;">
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
                                    <p> Escribe tu reseña (Máximo 1000 caracteres)</p>
                                    <form action="" method="post">
                                    <div>
                                        <textarea name="resena" id="resena" cols="66" rows="10" style="resize:none;"></textarea>
                                    </div>
                                    <div class="mt-3 d-flex">
                                    <button class="btn btn-dark me-4 flex-grow-1 " name="publicar" id="publicar">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.186 2.09c.521.25 1.136.612 1.625 1.101.49.49.852 1.104 1.1 1.625.313.654.11 1.408-.401 1.92l-7.214 7.213c-.31.31-.688.541-1.105.675l-4.222 1.353a.75.75 0 0 1-.943-.944l1.353-4.221a2.75 2.75 0 0 1 .674-1.105l7.214-7.214c.512-.512 1.266-.714 1.92-.402zm.211 2.516a3.608 3.608 0 0 0-.828-.586l-6.994 6.994a1.002 1.002 0 0 0-.178.241L9.9 14.102l2.846-1.496c.09-.047.171-.107.242-.178l6.994-6.994a3.61 3.61 0 0 0-.586-.828zM4.999 5.5A.5.5 0 0 1 5.47 5l5.53.005a1 1 0 0 0 0-2L5.5 3A2.5 2.5 0 0 0 3 5.5v12.577c0 .76.082 1.185.319 1.627.224.419.558.754.977.978.442.236.866.318 1.627.318h12.154c.76 0 1.185-.082 1.627-.318.42-.224.754-.559.978-.978.236-.442.318-.866.318-1.627V13a1 1 0 1 0-2 0v5.077c0 .459-.021.571-.082.684a.364.364 0 0 1-.157.157c-.113.06-.225.082-.684.082H5.923c-.459 0-.57-.022-.684-.082a.363.363 0 0 1-.157-.157c-.06-.113-.082-.225-.082-.684V5.5z" fill="#ffff"></path>
                                            </g>
                                        </svg>
                                        Publicar</button> 
                                        <button class="btn btn-dark me-4 flex-grow-5 " name="volver" id="volver">Volver</button> 
                                    </div>
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
            <?php
             foreach($resenas as $resena){
                echo "<div>
                    <span>". $cs -> buscar($resena["id_user"], "usuario", "nombre", "id_user") ."</span>
                    <p>".$resena["contenido"]."</p>
                    <hr>
                 </div>";
             }
            ?>
        </div>
    </div>
</div>

    </section>

    <?php include 'layout.php' ?>
