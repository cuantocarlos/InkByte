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
                        <a class="nav-link" href="index.php?ctl=registro">Recomendaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?ctl=registro">Crear Libro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?ctl=registro">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?ctl=iniciarSesion">Iniciar Sesión</a>
                    </li>
                </ul>
                <!-- Barra de búsqueda en la barra de navegación para pantallas grandes -->
                <form action="" method="post" name="buscar_libro" id="buscar_libro" class="d-flex search-form-desktop ms-auto">
                  <input class="form-control me-2" type="search" placeholder="Busca tu libro" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <!-- Icono de inicio de sesión -->

                <div class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?ctl=iniciarSesion">Iniciar Sesión</a>
                            <li><hr class="dropdown-divider"></li>
                            <a class="dropdown-item" href="index.php?ctl=registro">Registrarse</a>
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
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?ctl=iniciarSesion">Iniciar Sesión</a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li class="nav-item">
                      <a class="nav-link" href="index.php?ctl=registro">Registrarse</a>
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