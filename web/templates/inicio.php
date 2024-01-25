<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

    <link rel="stylesheet" href="../css/styles/navbar.css">
</head>

<body>

    <!-- Navbar para pantallas grandes -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top d-none d-lg-block">
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


    <a href="index.php?ctl=subirCapitulo" class="p-5">Subir capitulo</a>
    <a href="index.php?ctl=registro" class="p-5">Registro</a>
    <a href="index.php?ctl=diferente" class="p-5">Diferente</a>

 
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

</body>

</html>

</body>

</html>