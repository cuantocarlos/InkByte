  <?php
  print_r($_SESSION);
  ?>

  <div class="superNav border-bottom py-2 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
                    <select class="me-3 border-0 bg-light">
                        <option value="en-us">EN-US</option>
                    </select>
                    <span
                        class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>info@inkbyte.com</strong></span>
                    <span class="me-3"><i class="fa-solid fa-phone me-1 text-warning"></i> <strong>+34 111 111
                            111</strong></span>
                </div>
                <div
                    class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
                    <span class="me-3"><i class="fa-solid fa-file  text-muted me-2"></i><a class="text-muted"
                            href="#">Policy</a></span>
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
                              <label class="button search-button" for="searchright"><span class="mglass">&#9906;</span></label>
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