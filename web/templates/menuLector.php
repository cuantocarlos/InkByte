<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top d-none d-lg-block">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php?ctl=inicio">
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
                        <a class="nav-link" href="index.php?ctl=inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?ctl=recomendados">Recomendaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?ctl=seguidos">Libros Seguidos</a>
                    </li>
                </ul>
                <!-- Barra de búsqueda en la barra de navegación para pantallas grandes -->
                <div class="d-flex search-form-desktop ms-auto">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
              </div>
                <!-- Icono de inicio de sesión -->

                <div class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src='../app/archivos/img/perfil/<?php echo $_SESSION["foto_perfil"]; ?>'
                            alt="f_perfil" class="imagen-redonda">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?ctl=iniciarSesion">Ajustes de Perfil</a>
                            <li><hr class="dropdown-divider"></li>
                            <a class="dropdown-item" href="index.php?ctl=registro">Contáctanos</a>
                        </div>
                </div>
                <div class="nav-item">
                    <a class="nav-link ms-3" href="index.php?ctl=iniciarSesion">

                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Navbar para dispositivos móviles con botón de búsqueda -->
    <nav class="navbar navbar-light shadow-sm bg-light fixed-top d-lg-none">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php?ctl=inicio">

                <span class="ml-3 font-weight-bold">INKBYTE</a></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavMobile">
                <ul class="navbar-nav ms-auto">
                    <!-- Nuevo nav-item de búsqueda para dispositivos móviles -->
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#searchModal">Search</a>
                    </li>

                    <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link" href="index.php?ctl=recomendados">Recomendaciones</a>
                  </li>
                  <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link" href="index.php?ctl=seguidos">Libros Seguidos</a>
                  </li>

                  <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link" href="index.php?ctl=perfil">Perfil</a>
                  </li>

                  <hr class="barra-menu">

                  <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link" href="index.php?ctl=cerrarSesion">Cerrar Sesión</a>
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
