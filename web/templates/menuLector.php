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
                        <a class="nav-link" href="index.php?ctl=registro">Libros Seguidos</a>
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
                            <img src="../app/archivos/img/perfil/"<?php $_SESSION["foto_perfil"]; ?>
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
                      <a class="nav-link" href="index.php?ctl=iniciarSesion">Recomendaciones</a>
                  </li>
                  <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link" href="index.php?ctl=registro">Libros Seguidos</a>
                  </li>
                  <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Generos Favoritos</a>
                  </li>

                  <hr class="barra-menu">

                  <li class="nav-item d-flex justify-content-center">
                      <a class="nav-link" href="index.php?ctl=registro">Perfil</a>
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


    <!-- Modal GenerosUsuario -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Selecciona tus generos favoritos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
        <div class="container d-flex pt-5 py-3 gap-3 justify-content-center">



          <div class="d-flex flex-column gap-3">
          <!--Terror -->
          <input type="checkbox" class="btn-check terror" id="terror" autocomplete="off" name="generoUsuario[]" value="terror">
          <label class="btn btn-outline-primary mb-5 terror-label" for="terror">Terror</label>
          <!-- Romance -->
          <input type="checkbox" class="btn-check romance" id="romance" autocomplete="off" name="generoUsuario[]" value="romance">
          <label class="btn btn-outline-primary mb-5 romance-label" for="romance">Romance</label>
          <!-- Fantasía -->
          <input type="checkbox" class="btn-check fantasia" id="fantasia" autocomplete="off" name="generoUsuario[]" value="fantasia">
          <label class="btn btn-outline-primary mb-5 fantasia-label" for="fantasia">Fantasía</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Ciencia Ficción -->
          <input type="checkbox" class="btn-check cficcion" id="cficcion" autocomplete="off" name="generoUsuario[]" value="cficcion">
          <label class="btn btn-outline-primary mb-5 cficcion-label" for="cficcion">C.Ficción</label>
          <!-- Historia -->
          <input type="checkbox" class="btn-check historia" id="historia" autocomplete="off" name="generoUsuario[]" value="historia">
          <label class="btn btn-outline-primary mb-5 historia-label" for="historia">Historia</label>
          <!-- Arte -->
          <input type="checkbox" class="btn-check arte" id="arte" autocomplete="off" name="generoUsuario[]" value="arte">
          <label class="btn btn-outline-primary mb-5 arte-label" for="arte">Arte</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Thriller -->
          <input type="checkbox" class="btn-check thriller" id="thriller" autocomplete="off" name="generoUsuario[]" value="thriller">
          <label class="btn btn-outline-primary mb-5 thriller-label" for="thriller">Thriller</label>
          <!-- Poesía -->
          <input type="checkbox" class="btn-check poesia" id="poesia" autocomplete="off" name="generoUsuario[]" value="poesia">
          <label class="btn btn-outline-primary mb-5 poesia-label" for="poesia">Poesía</label>
          <!-- Biografía -->
          <input type="checkbox" class="btn-check biografia" id="biografia" autocomplete="off" name="generoUsuario[]" value="biografia">
          <label class="btn btn-outline-primary mb-5 biografia-label" for="biografia">Biografía</label>
          </div>



          <div class="d-flex flex-column gap-3">
          <!-- Misterio -->
          <input type="checkbox" class="btn-check misterio" id="misterio" autocomplete="off" name="generoUsuario[]" value="misterio">
          <label class="btn btn-outline-primary mb-5 misterio-label" for="misterio">Misterio</label>
          <!-- Policíaca -->
          <input type="checkbox" class="btn-check policiaca" id="policiaca" autocomplete="off" name="generoUsuario[]" value="policiaca">
          <label class="btn btn-outline-primary mb-5 policiaca-label" for="policiaca">Policíaca</label>
          <!-- Drama -->
          <input type="checkbox" class="btn-check drama" id="drama" autocomplete="off" name="generoUsuario[]" value="drama">
          <label class="btn btn-outline-primary mb-5 drama-label" for="drama">Drama</label>
          </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="bAceptar" name="bAceptar">Guardar</button>
          </div>



  </form>

    </div>
  </div>
</div>