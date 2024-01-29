<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/star.css">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="../css/reviews.css">

    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/book.css">
    <link rel="stylesheet" href="../css/pruebaCapitulos.css">


    <script src="../js/clickedButton.js"></script>
</head>

<body>
    <!-- Navbar para pantallas grandes -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top d-none d-lg-block">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <!-- ... (código del logotipo) ... -->
                <span class="ml-3 font-weight-bold">INKYBYTE</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">LINK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LINK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LINK</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                            <a class="dropdown-item" href="#">Action 3</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
                <!-- Barra de búsqueda en la barra de navegación para pantallas grandes -->
                <div class="d-flex search-form-desktop ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
                <!-- Icono de inicio de sesión -->
                <div class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Navbar para dispositivos móviles con botón de búsqueda -->
    <nav class="navbar navbar-light shadow-sm bg-light fixed-top d-lg-none">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">

                <span class="ml-3 font-weight-bold">INKBYTE</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavMobile">
                <ul class="navbar-nav ms-auto">
                    <!-- Nuevo nav-item de búsqueda para dispositivos móviles -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchModal">Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--FIN NAVBAR-->


    <!--seccion libro-->

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content mt-5" style="background-color: #fff4f4; width: 100%; height: 460px;">
                        <div class="row">
                            <!-- Columna para la imagen -->
                            <div class="col-md-4 position-relative mt-md-0 mt-3">
                                <img src="../../app/archivos/imagenes/libro/main-banner1.jpg" alt="banner" class="banner-image position-absolute top-0 start-0" style=" height: 450px; margin-left: 60px;">
                            </div>
                            <!-- Columna para el texto -->
                            <div class="col-md-6 mt-md-2 mt-3 ms-md-2">
                                <!-- Título, autor y valoración -->
                                <div class="mb-3 ">
                                    <h1 class="fw-bold">Título del Libro</h1>
                                    <p style="margin-left: 8px;";> Autor: Nombre del Autor</p>
                                    <section id="contador-de-capitulos">
                                        <?php
                                        //  capítulos de prueba
                                        $capitulosDePrueba = array(
                                            array('id_capitulo' => 1, 'titulo' => 'Capítulo 1'),
                                            array('id_capitulo' => 2, 'titulo' => 'Capítulo 2'),
                                            array('id_capitulo' => 3, 'titulo' => 'Capítulo 3'),
                                           
                                        );
                                        ?>

                                        <div class="container mt-3 ">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="capituloDropdown" class="form-label">Selecciona un capítulo</label>
                                                    <select id="capituloDropdown" class="form-select" onchange="location = this.value;">
                                                        <option value="" disabled selected>Elige un capítulo</option>
                                                        <?php foreach ($capitulosDePrueba as $capitulo) : ?>
                                                            <option value="?capitulo=<?= $capitulo['id_capitulo'] ?>"><?= $capitulo['titulo'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                    <!-- Contenedor para las estrellas -->
                                    <div class="d-flex align-items-center mr-auto">
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                        </fieldset>
                                    </div>
                                    <div class="">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci architecto vitae minima dicta numquam in est distinctio, mollitia asperiores. Sapiente delectus quas harum incidunt et cupiditate iure, nobis magni deleniti!
                                        </p>
                                    </div>


                                </div>

                                <!-- Botones -->
                                <div class="d-flex flex-wrap">
                                    <button class="btn btn-dark">
                                        <svg width="30px" height="30px" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill="none" stroke="#fff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g style="display:inline;stroke-width:9.40549;stroke-dasharray:none">
                                                    <path d="M38 137h48c2.828 0 7.173 2.935 10 3 2.7.062 7.3-3 10-3h48V49h-48c-3 0-7 3-9.704 3C93 52 89 49 86 49H38Zm58-82v85" style="fill:none;stroke:#fff;stroke-width:9.40549;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:5;stroke-dasharray:none;stroke-opacity:1" transform="translate(-26.483 -24.57) scale(1.27586)"></path>
                                                </g>
                                                <g style="stroke-width:6.27027;stroke-dasharray:none">
                                                    <path d="M51.869 65.116h30.297M51.869 80.088h30.297M51.869 95.06h30.297m27.668-29.944h30.297m-30.297 14.972h30.297" style="fill:none;fill-opacity:1;stroke:#fff;stroke-width:9.40541;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:5;stroke-dasharray:none;stroke-opacity:1" transform="translate(-26.483 -24.57) scale(1.27586)"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        Leer</button>
                                    <button class="btn btn-dark">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.186 2.09c.521.25 1.136.612 1.625 1.101.49.49.852 1.104 1.1 1.625.313.654.11 1.408-.401 1.92l-7.214 7.213c-.31.31-.688.541-1.105.675l-4.222 1.353a.75.75 0 0 1-.943-.944l1.353-4.221a2.75 2.75 0 0 1 .674-1.105l7.214-7.214c.512-.512 1.266-.714 1.92-.402zm.211 2.516a3.608 3.608 0 0 0-.828-.586l-6.994 6.994a1.002 1.002 0 0 0-.178.241L9.9 14.102l2.846-1.496c.09-.047.171-.107.242-.178l6.994-6.994a3.61 3.61 0 0 0-.586-.828zM4.999 5.5A.5.5 0 0 1 5.47 5l5.53.005a1 1 0 0 0 0-2L5.5 3A2.5 2.5 0 0 0 3 5.5v12.577c0 .76.082 1.185.319 1.627.224.419.558.754.977.978.442.236.866.318 1.627.318h12.154c.76 0 1.185-.082 1.627-.318.42-.224.754-.559.978-.978.236-.442.318-.866.318-1.627V13a1 1 0 1 0-2 0v5.077c0 .459-.021.571-.082.684a.364.364 0 0 1-.157.157c-.113.06-.225.082-.684.082H5.923c-.459 0-.57-.022-.684-.082a.363.363 0 0 1-.157-.157c-.06-.113-.082-.225-.082-.684V5.5z" fill="#ffff"></path>
                                            </g>
                                        </svg>
                                        Dejar Valoración</button>
                                    <button class="btn btn-dark">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.803 5.33333C13.803 3.49238 15.3022 2 17.1515 2C19.0008 2 20.5 3.49238 20.5 5.33333C20.5 7.17428 19.0008 8.66667 17.1515 8.66667C16.2177 8.66667 15.3738 8.28596 14.7671 7.67347L10.1317 10.8295C10.1745 11.0425 10.197 11.2625 10.197 11.4872C10.197 11.9322 10.109 12.3576 9.94959 12.7464L15.0323 16.0858C15.6092 15.6161 16.3473 15.3333 17.1515 15.3333C19.0008 15.3333 20.5 16.8257 20.5 18.6667C20.5 20.5076 19.0008 22 17.1515 22C15.3022 22 13.803 20.5076 13.803 18.6667C13.803 18.1845 13.9062 17.7255 14.0917 17.3111L9.05007 13.9987C8.46196 14.5098 7.6916 14.8205 6.84848 14.8205C4.99917 14.8205 3.5 13.3281 3.5 11.4872C3.5 9.64623 4.99917 8.15385 6.84848 8.15385C7.9119 8.15385 8.85853 8.64725 9.47145 9.41518L13.9639 6.35642C13.8594 6.03359 13.803 5.6896 13.803 5.33333Z" fill="#fff"></path>
                                            </g>
                                        </svg>
                                        Compartir</button>
                                    <button class="btn btn-dark descriptionButton">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        Favoritos</button>
                                </div>

                            </div><!--banner-content-->
                        </div>
                    </div><!--main-content-->
                </div>
            </div>
        </div>
        <br><br><br>
        <div class="container">
            <h2>Review</h2>
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
    <br><br>

    <!--footer-->
    <footer class="mt-5">
        <div class="border-bottom pb-5 mb-4">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Columna izquierda -->
                    <div class="col-lg-4">
                        <form action="#" class="subscribe mb-4 mb-lg-0">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Contáctanos">
                            </div>
                        </form>
                    </div>

                    <!-- Columnas centrales -->
                    <div class="col-lg-2 text-lg-center">
                        <ul class="list-unstyled nav-links nav-left mb-4 mb-lg-0">
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 text-lg-center">
                        <ul class="list-unstyled nav-links nav-left mb-4 mb-lg-0">
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 text-lg-center">
                        <ul class="list-unstyled nav-links nav-left mb-4 mb-lg-0">
                            <li><a href="#">Services</a></li>
                            <!-- Otras opciones para la columna central -->
                        </ul>
                    </div>

                    <div class="col-lg-2 text-lg-center">
                        <ul class="list-unstyled nav-links nav-left mb-4 mb-lg-0">
                            <!-- Otras opciones para la columna central -->
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">

                <!-- Columna izquierda -->
                <div class="col-lg-6 text-lg-center site-logo order-1 order-lg-2 mb-3 mb-lg-0">
                    <a href="#" class="m-0 p-0">InkByte All rights reserved</a>
                </div>

                <!-- Columna derecha -->
                <div class="col-lg-6 order-2 order-lg-1 mb-3 mb-lg-0">
                    <ul class="list-unstyled nav-links m-0 nav-left">
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>








</body>





</html>