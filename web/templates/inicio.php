  <?php
  print_r($_SESSION);
  ?>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top d-none d-lg-block">
  <div class="superNav border-bottom py-2 bg-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <!-- ... (código del logotipo) ... -->
                <span class="ml-3 font-weight-bold">INKYBYTE</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false"
                aria-label="Toggle navigation">
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


    <!-- Modal de búsqueda para dispositivos móviles -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="searchModalLabel">Search</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Código del formulario de búsqueda dentro del modal -->
                    <form>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success mt-2" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><img
                    src="../images/inkbyte-high-resolution-logo-black-transparent (1) (1).png" alt="" class="img-fluid"
                    style="width: 60px;height: 60px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav  me-4">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#">Publish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#">About</a>
                    </li>
                </ul>

                <div class="ms-auto ml-4 d-none d-lg-block">

                </div>


                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                      <ul class="navbar-nav ms-auto">
                        <!-- Agregamos la clase "search-container-li" al li específico -->
                        <li class="nav-item search-container-li">
                          <div class="search-container">
                            <form action="#" method="get" class="mt-1">
                              <input class="search-input" id="searchright" type="search" name="q" placeholder="Search">
                              <label class="button search-button" for="searchright"><span class="mglass"></span></label>
                            </form>
                          </div>
                        </li>
                        <li class="nav-item">
                          <button class="btn btn-outline-primary mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login">LOGIN</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-primary mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login"><a href="registro.php">ACCOUNT</a></button>
                        </li>
                      </ul>
                    </div>
                  </nav>
            </div>

        </div>
    </nav>
    <a href="index.php?ctl=subirCapitulo" class="p-5">Subir capitulo</a>
    <a href="index.php?ctl=registro" class="p-5">Registro</a>
    <a href="index.php?ctl=iniciarSesion" class="p-5">Iniciar Sesion</a>
    <a href="index.php?ctl=crearLibro" class="p-5">Crear Libro</a>
    <a href="index.php?ctl=diferente" class="p-5">Diferente</a>

</body>

</html>

<?php include('layout.php'); ?>