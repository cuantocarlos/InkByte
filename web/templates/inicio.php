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

</body>

</html>