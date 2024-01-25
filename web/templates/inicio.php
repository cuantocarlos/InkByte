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

                <div class="nav-item ml-5">
                    <a class="nav-link " href="#">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                <div class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>

                    </a>
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
                            <button class="btn btn-outline-primary mx-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login">ACCOUNT</button>
                        </li>
                      </ul>
                    </div>
                  </nav>
            </div>
        </div>
    </nav>
</body>

</html>

<?php include('layout.php'); ?>