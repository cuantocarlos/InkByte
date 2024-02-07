<?php

require __DIR__ . '/../composer/vendor/autoload.php';

require __DIR__ . '/../composer/vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/../composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../composer/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Controller
{

    private function cargaMenu()
    {
        if ($_SESSION['nivel'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel'] == 1) {
            return 'menuLector.php';
        } else if ($_SESSION['nivel'] == 2) {
            return 'menuEscritor.php';
        } else if ($_SESSION['nivel'] == 3) {
            return 'menuAdmin.php';
        }
    }

    public function iniciarSesion()
    {
        try {
            $params = array(
                'mail' => '',
                'pass' => '',
            );
             if ($_SESSION['nivel'] > 0) {
                 header("location:index.php?ctl=inicio");
             }
            $menu = $this->cargaMenu();

            if (isset($_POST["bAceptar"])) {
                $params["mail"] = recoge("mail");
                $params["pass"] = recoge("pass");
                $cs = new Consultas();
                if (!$usuario = $cs->verificarEmail($params["mail"])) {
                    $params['mensaje'] = "El correo no existe";
                } else {
                    if ($cs->verificarPass($params["mail"], $params["pass"])) {
                        session_unset();
                        session_destroy();
                        session_start();
                        if ($usuario['activo'] == 1) {
                            $_SESSION['id_user'] = $usuario['id_user'];
                            $_SESSION['nombre'] = $usuario['nombre'];
                            $_SESSION['nick'] = $usuario['nick'];
                            $_SESSION['email'] = $usuario['email'];
                            $_SESSION['f_nacimiento'] = $usuario['f_nacimiento'];
                            $_SESSION['foto_perfil'] = $usuario['foto_perfil'];
                            $_SESSION['descripcion'] = $usuario['descripcion'];
                            $_SESSION['nivel'] = $usuario['nivel'];
                            $_SESSION['mensaje'] = "";
                            header('Location: index.php?ctl=inicio');
                        } else {
                            $params["mensaje"] = "No se ha completado la autentificación por correo";
                            header('Location: index.php?ctl=error');
                        }
                    } else {
                        $params["mensaje"] = "La contraseña es incorrecta";
                    }
                }
            }
        } catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logException.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/templates/inicioSesion.php';
    }

    public function inicioSesionJS()
    {
        $cs = new Consultas();
        $mail = $_REQUEST["mail"];
        $pass = $_REQUEST["pass"];
        if (empty($cs->verificarEmail($mail))) {
            echo json_encode(array('error' => 'mail'));
        } else {
            if ($cs->verificarPass($mail, $pass)) {
                echo json_encode(array('error' => 'pass'));
            }
        }
    }

    public function registro()
    {

        $params = array(
            'nombre' => '',
            'nick' => '',
            'mail' => '',
            'pass' => '',
            'pass2' => '',
            'fecha' => '',
            'descripcion' => '',
            'opcion' => '',
            'archivo' => '',
            'nivel' => 0,
            'activo' => 0,
            'mensaje' => []
        );

        if ($_SESSION['nivel'] > 0) {
            header("location:index.php?ctl=inicio");
        }

        if ((isset($_POST["bAceptar"]))) {
            //recogemos datos de los inputs
            $params["nombre"] = recoge("nombre");
            $params["nick"] = recoge("nick");
            $params["mail"] = recoge("mail");
            $params["pass"] = recoge("pass");
            $params["pass2"] = recoge("pass2");
            $params["fecha"] = recoge("fecha");
            $params["descripcion"] = recoge("descripcion");
            $params["opcion"] = recoge("opcion_usuario");

            //comenzamos las validaciones
            if (empty($params["nombre"])) {
                $params["mensaje"] = "Por favor ingrese un nombre";
            } else {
                $params["nombre"] = sinEspacios($params["nombre"]);
            }
            $menu = $this->cargaMenu();

            if (empty($params["nick"])) {
                $params["nick"] = "User_" . uniqid();
            } else {
                $params["nick"] = sinEspacios($params["nick"]);
            }

            cEmail($params["mail"], $params, "mensaje", 30, 8);

            if (!cPassword($params["pass"], $params["mensaje"]) && $params["pass"] !== $params["pass2"]) {
                $params["mensaje"] = "Las contraseñas no coinciden";
            }

            cFecha($params["fecha"], $params);

            if ($params["opcion"] == "lector") {
                $params["nivel"] = 1;
            } elseif ($params["opcion"] == "escritor") {
                $params["nivel"] = 2;
            }

            if (!isset($_POST["terminos"]) || $_POST["terminos"] != 1) {
                $params["mensaje"] = "Debes aceptar los términos y condiciones para poder registrarte";
            }

            if (empty($params["mensaje"] && $params["archivo"])) {
                $params["archivo"] = cFile("f_perfil", $params["mensaje"], Config::$extensionesValidas, __DIR__ . '/../archivos/img/perfil/', Config::$max_file_size);

                if (empty($params["archivo"])) {
                    $params["archivo"] = "no_profile.png";
                }
                try {
                    $cs = new Consultas();
                    $hash = password_hash($params["pass"], PASSWORD_BCRYPT);
                    if ($usuario = $cs->agregarNuevoUsuario($params["nombre"], $params["nick"], $params["mail"], $hash, $params["fecha"], $params["archivo"], $params["descripcion"], $params["nivel"], $params["activo"])) {

                        $idUsuario = $cs->buscar($params["mail"], "usuario", "id_user", "email");

                        $cs->creaGenerosUser($idUsuario);

                        $fechaRegistro = time() + 86400;

                        $token = uniqid();

                        $cs->agregarToken($token, $fechaRegistro, $idUsuario);

                        $mailer = new PHPMailer(true);

                        try {
                            // Configura el servidor SMTP
                            $mailer->isSMTP();
                            $mailer->Host = 'smtp.gmail.com';
                            $mailer->SMTPAuth = true;
                            $mailer->Username = 'carmen33ivan@gmail.com';
                            $mailer->Password = 'emvq uypi bakh wjuj ';
                            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            $mailer->Port = "465";

                            // Configura los destinatarios
                            $mailer->setFrom('carmen33ivan@gmail.com', 'Carmen_Ivan');
                            $mailer->addAddress($params["mail"], $params["nombre"]);

                            // Contenido del correo
                            $mailer->isHTML(true);
                            $mailer->Subject = 'Activa tu cuenta de InkByte';
                            $mailer->Body = 'Activa tu cuenta con este enlace: http://localhost/DWES/GitRepos/InkByte/web/index.php?ctl=activarCuenta&token=' . $token;

                            // Enviar el correo
                            $mailer->send();
                            echo 'El correo se ha enviado con éxito.';
                        } catch (Exception $e) {
                            echo "El correo no se pudo enviar. Error: {$mailer->ErrorInfo}";
                        }
                        //header('Location: index.php?ctl=iniciarSesion');
                    } else {
                        $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                    }
                } catch (Exception $e) {
                    // En este caso guardamos los errores en un archivo de errores log
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
                    // guardamos en ·errores el error que queremos mostrar a los usuarios
                    header('Location: index.php?ctl=error');
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
                    header('Location: index.php?ctl=error');
                }
            }

        }
        require __DIR__ . '/../../web/templates/registro.php';
    }

    public function subirCapitulo()
    {

        if ($_SESSION['nivel'] != 2) {
            header("location:index.php?ctl=inicio");
        }
        $menu = $this->cargaMenu();

        try {
            $cs = new Consultas();
            $opcionesDisponibles = $cs->buscarColumnaArray($_SESSION["id_user"], "libro", "id_libro", "id_user");
            $titulos = $cs->buscarColumnaArray($_SESSION["id_user"], "libro", "titulo", "id_user");

            $params = array(
                'id_libro' => '',
                'titulo' => '',
                'archivo' => '',
                'mensaje' => [],
                'capitulos_del_libro' => ''
            );

            if ((isset($_POST["bAceptar"]))) {
                $params["id_libro"] = recoge("tus_opciones");
                $params['capitulos_del_libro'] = $cs->filas("capitulos", "id_libro", $params["id_libro"]);

                if ((isset($_POST["bAceptar"]))) {
                    $params["id_libro"] = recoge("tus_opcionesC");
                    $params['capitulos_del_libro'] = $cs->filas("capitulos", "id_libro", $params["id_libro"]);

                    $params["titulo"] = recoge("titulo_cap");

                    $params["titulo"] = recoge("titulo_cap");

                    if (!cOpciones($params["id_libro"], $opcionesDisponibles)) {
                        $params["mensaje"] = "No has introducido un libro válido";
                    }

                    if (cTexto($params["titulo"], "titulo", $params["mensaje"], 50, 1, true, true) == false) {
                        header("Location:index.php?ctl=subirCapitulo");
                    }


                    if (empty($params["mensaje"]) && !empty($params["id_libro"]) && !empty($params["titulo"])) {

                        $params["archivo"] = cFile("archivoPDF", $params["mensaje"], Config::$extensionesCapitulos, __DIR__ . '/../archivos/capitulos/', 200000000);
                        if (empty($params["mensaje"]) && !empty($params["archivo"])) {
                            $num_cap = ($cs -> buscar($params["id_libro"], "libro", "capitulos", "id_libro")) + 1;
                            $cs->agregarCapitulo($params["id_libro"], $num_cap, $params["titulo"], $params["archivo"]);
                            $cs->aumentarCapitulosLibro($params["id_libro"]);
                            header("Location:index.php?ctl=inicio");

                        } else {
                            header("Location:index.php?ctl=subirCapitulo");
                        }
                    } else {
                        header("Location:index.php?ctl=subirCapitulo");
                    }
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            //header('Location: index.php?ctl=error');
        } catch (Error $e) {
            echo "Error: " . $e->getMessage();
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            //header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/../../web/templates/subirCapitulo.php';

    }

    public function home()
    {
        $params = array(
            'fecha' => date('d-m-Y'),
        );

        $menu = 'inicio.php';

        if ($_SESSION['nivel'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function inicio()
    {
        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function generoUsuario()
    {
        $params = array(
            'terror' => 0,
            'romance' => 0,
            'fantasia' => 0,
            'cficcion' => 0,
            'historia' => 0,
            'arte' => 0,
            'thriller' => 0,
            'poesia' => 0,
            'drama' => 0,
            'biografia' => 0,
            'misterio' => 0,
            'policiaca' => 0,
        );

        $generoString = $_REQUEST["generos"];
        $generosUsu = explode(',',$generoString);



            foreach($params as $genero => $value){
                for($i=0;$i<count($generosUsu);$i++){
                    if($genero === $generosUsu[$i]){
                        $params[$genero] = 1;
                    }
                }
            }

        try {
            $cs = new Consultas();

                    echo $_SESSION["id_user"];

                    $cs -> actualizarPreferenciasUsuario($_SESSION["id_user"],$params["terror"],$params["romance"],$params['fantasia'],$params['cficcion'],$params['historia'],$params['arte'],$params['thriller'],$params['poesia'],$params['drama'],$params['biografia'],$params['misterio'],$params['policiaca']); //cambiar el id_user

            header('Location: index.php?ctl=perfilUsuario');

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            echo "Error: " . $e->getMessage();
            header('Location: index.php?ctl=error');
        }

        require __DIR__ . '/../../web/templates/perfilUsuario.php';
    }
    public function crearLibro()
    {

        $menu = $this->cargaMenu();
         if ($_SESSION['nivel'] != 2) {
             header("location:index.php?ctl=inicio");
         }

        if ((isset($_POST["bAceptar"]))) {

            try {

                $params = array(
                    'id_user' => '',
                    'titulo' => '',
                    'sinopsis' => '',
                    'imagen_portada' => '',
                    'capitulos' => 0,
                    'num_resenas' => 0,
                    'valoracion' => 0,
                    'visitas' => 0,
                    'visitasSemana' => 0,
                    'estado' => 1, //0 cancelado, 1 publicando, 2 terminado
                    "generos" => [],
                    'mensaje' => []
                );
                $params['id_user'] = $_SESSION["id_user"];
                $params['titulo'] = recoge("titulo_lib");
                $params['sinopsis'] = recoge('sinopsis');
                $params['generos'] = recogeArray('genero');
                if (cTexto($params['titulo'], "titulo", $params['mensaje'], 50, 1, true, true)) {
                    if (cTexto($params['sinopsis'], "sinopsis", $params['mensaje'], 1000, 1, true, true)) {

                        foreach ($params['generos'] as $gen) {
                            if (!in_array($gen, Config::$generos_disponibles)) {
                                $params["mensaje"] = "Error en el campo genero";
                            }
                        }

                        if (!empty($params["mensaje"])) {
                            $params["mensaje"] = "Error en el campo género";
                        }
                    } else {
                        $params["mensaje"] = "Error en el campo sinopsis";
                    }
                } else {
                    $params["mensaje"] = "Error en el campo título";
                }

                if (empty($params['mensaje'])) {
                    $params['imagen_portada'] = cFile("portadaLibro", $params['mensaje'], Config::$extensionesValidas, __DIR__ . '/../archivos/img/libro/', 20000000);

                    if (empty($params["imagen_portada"])) {
                        $params["imagen_portada"] = "sin_portada.jpg";
                    }

                    $cs = new Consultas();
                    $cs->agregarLibro($params["id_user"], $params["titulo"], $params["sinopsis"], $params["imagen_portada"], $params["capitulos"], $params["num_resenas"], $params["valoracion"], $params["visitas"], $params["visitasSemana"], $params["estado"]);
                    $id_libro = $cs->buscar2Campos($params["id_user"], $params["titulo"], "libro", "id_libro", "id_user", "titulo");
                    $cs->guardarGeneroLibro($id_libro, $params["generos"]);

                } else {
                    header("location:index.php?ctl=crearLibro");
                }

                header("location:index.php?ctl=inicio");

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

        }
        require __DIR__ . '/../../web/templates/crearLibro.php';
    }

    public function peticionNombre()
    {
        $nombre = $_REQUEST["nombre"];
        $cs = new Consultas();
        if (!$cs->nombreUnico($nombre)) {
            echo json_encode(array('existe' => false));

        } else {
            echo json_encode(array('existe' => true));
        }
    }

    public function peticionMail()
    {
        $mail = $_REQUEST["mail"];
        $cs = new Consultas();
        if ($cs->correoUnico($mail)) {
            echo json_encode(array('existe' => false));
        } else {
            echo json_encode(array('existe' => true));
        }
    }
    public function leerCapitulo()
    {
        $menu = $this->cargaMenu();

        $params = array(
            'id_libro' => '',
            'num_cap' => '',
            'titulo' => '',
            'archivo' => '',
            'titulo_libro' => '',
        );

        $datosCap = [];

        $params["id_libro"] = isset($_GET['id_libro']) ? $_GET['id_libro'] : null;
        $params["num_cap"] = isset($_GET['num_cap']) ? $_GET['num_cap'] : null;
        $params["titulo"] = isset($_GET['titulo']) ? $_GET['titulo'] : null;
        $params["archivo"] = isset($_GET['archivo']) ? $_GET['archivo'] : null;
        $params["titulo_libro"] = isset($_GET['titulo_libro']) ? $_GET['titulo_libro'] : null;

        try {
            $cs = new Consultas();
            $capitulos = $cs->buscarTodos($params["id_libro"], "capitulos", "titulo", "id_libro");

        } catch (Exception $e) {
            error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
        }

        if (isset($_REQUEST["volver"])) {
            header("location: index.php?ctl=book&id_libro=" . $params["id_libro"]);
        }

        if (isset($_REQUEST["seleccionar_capitulo"])) {
            $params["num_cap"] = recoge("lista_capitulos");

            try {
                $cs = new Consultas();
                $titulo = $cs->buscar2Campos($params["id_libro"], $params["num_cap"], "capitulos", "titulo", "id_libro", "num_cap");
                $archivo = $cs->buscar2Campos($params["id_libro"], $params["num_cap"], "capitulos", "archivo", "id_libro", "num_cap");

            } catch (Exception $e) {
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            }
            header("location:index.php?ctl=leerCapitulo&id_libro=" . $params["id_libro"] . "&num_cap=" . $params["num_cap"] . "&titulo=" . $titulo . "&archivo=" . $archivo . "&titulo_libro=" . $params["titulo_libro"]);
        }

        if (isset($_REQUEST["capitulo_anterior"])) {
            if ($params["num_cap"] > 1) {
                $params["num_cap"] = $params["num_cap"] - 1;
                try {
                    $cs = new Consultas();
                    $titulo = $cs->buscar2Campos($params["id_libro"], $params["num_cap"], "capitulos", "titulo", "id_libro", "num_cap");
                    $archivo = $cs->buscar2Campos($params["id_libro"], $params["num_cap"], "capitulos", "archivo", "id_libro", "num_cap");

                } catch (Exception $e) {
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
                }
                header("location:index.php?ctl=leerCapitulo&id_libro=" . $params["id_libro"] . "&num_cap=" . $params["num_cap"] . "&titulo=" . $titulo . "&archivo=" . $archivo . "&titulo_libro=" . $params["titulo_libro"]);
            }
        }

        if (isset($_REQUEST["capitulo_siguiente"])) {
            if ($params["num_cap"] < count($capitulos)) {
                $params["num_cap"] = $params["num_cap"] + 1;
                try {
                    $cs = new Consultas();
                    $titulo = $cs->buscar2Campos($params["id_libro"], $params["num_cap"], "capitulos", "titulo", "id_libro", "num_cap");
                    $archivo = $cs->buscar2Campos($params["id_libro"], $params["num_cap"], "capitulos", "archivo", "id_libro", "num_cap");

                } catch (Exception $e) {
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
                }
                header("location:index.php?ctl=leerCapitulo&id_libro=" . $params["id_libro"] . "&num_cap=" . $params["num_cap"] . "&titulo=" . $titulo . "&archivo=" . $archivo . "&titulo_libro=" . $params["titulo_libro"]);
            }
        }

        require __DIR__ . '/../../web/templates/leerCapitulo.php';
    }

    public function activarCuenta()
    {
        $token = $_GET['token'];
        try {
            $cs = new Consultas();

            if ($cs->verificarToken($token)) {
                if ($cs->validarFechaValidezPorToken($token)) {
                    $cs->activarUsuarioPorToken($token);
                    $cs->borrarToken($token);
                    header("location:index.php?ctl=inicio");
                }
            }

        } catch (PDOException $e) {
            // Manejo de errores
            echo "Error: " . $e->getMessage();
        }
    }

    public function cerrarSesion()
    {
        session_unset();
        session_destroy();
        header("location:index.php?ctl=inicio");
        exit();
    }

    public function generoUsuarioSelect()
    {

        $cs = new Consultas();

        $generos=$cs -> generosSelecionadosUsuario($_SESSION["id_user"]); //cambiar el id_user

        echo json_encode(array(
            "terror" => $generos["terror"],
            "romance" => $generos["romance"],
            "fantasia" => $generos["fantasia"],
            "cficcion" => $generos["cficcion"],
            "historia" => $generos["historia"],
            "arte" => $generos["arte"],
            "thriller" => $generos["thriller"],
            "poesia" => $generos["poesia"],
            "drama" => $generos["drama"],
            "biografia" => $generos["biografia"],
            "misterio" => $generos["misterio"],
            "policiaca" => $generos["policiaca"],
        ));
    }

    public function perfilUsuario()
    {
            $params=array(
                "id_user"=>$_SESSION['id_user']
            );

            try{

                $cs = new Consultas();

                $librosSeguidos = $cs->obtenerLibrosSeguidos($params['id_user']);
                $nombresAutores = $cs -> obtenerNombresAutoresPorLibros($librosSeguidos);

                if(count($librosSeguidos) === 0){
                    $librosSeguidos['mono'] = true;
                } else {
                    $librosSeguidos['mono'] = false;
                }

            } catch (Exception $e) {
                $e->getMessage();
            } catch (Error $e) {
                $e->getMessage();
            }

            $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/perfilUsuario.php';
    }

    public function book()
    {
        $menu = $this->cargaMenu();
        $params = array(
            'id_libro' => '',
            'titulo' => '',
            'sinopsis' => '',
            'imagen_portada' => '',
            'capitulos' => "", // Asigna un valor predeterminado si es necesario
            'num_resenas' => '', // Asigna un valor predeterminado si es necesario
            'valoracion' => '', // Asigna un valor predeterminado si es necesario
            'visitas' => '', // Asigna un valor predeterminado si es necesario
            'visitasSemana' => '', // Asigna un valor predeterminado si es necesario
            'estado' => '', // 0 cancelado, 1 publicando, 2 terminado
            'edad_recomendada' => '', // Ajusta según tus necesidades
            'generos' => array(),
            'autor' => '',
            'id_autor' => '',
            'num_cap' => '',

            'mensaje' => array(),
        );

        $params['id_libro'] = $_GET['id_libro'];

        if(empty($params['id_libro'])){
            header('location: index.php?ctl=inicio');
        }

        try {
            $cs = new Consultas();
            $datosLibro = $cs->buscarFila($params['id_libro'], 'libro', 'id_libro');
            $capitulos = $cs->buscarTodos($params["id_libro"], "capitulos", "titulo", "id_libro");

            // Asigna los valores obtenidos a los campos correspondientes en $params
            $params['titulo'] = $datosLibro['titulo'];
            $params['sinopsis'] = $datosLibro['sinopsis'];
            $params['imagen_portada'] = $datosLibro['imagen_portada'];
            $params['capitulos'] = $datosLibro['capitulos'];
            $params['num_resenas'] = $datosLibro['num_resenas'];
            $params['valoracion'] = $datosLibro['valoracion'];
            $params['visitas'] = $datosLibro['visitas'];
            $params['visitasSemana'] = $datosLibro['visitasSemana'];
            $params['estado'] = $datosLibro['estado'];

            // Manejo de generos (si es una columna en tu tabla)
            $generos = $cs->buscarFila($params['id_libro'], 'generolibro', "id_libro");
            $params['generos'] = $cs->obtenerGenerosActivos($params['id_libro']);

            $params['id_autor'] = $cs->buscar($params['id_libro'], 'libro', 'id_user', 'id_libro');
            $params['autor'] = $cs->buscar($params['id_autor'], 'usuario', 'nombre', 'id_user');

            $resenas = $cs->obtenerResenasPorLibro($params['id_libro']);
        } catch (Exception $e) {
            $e->getMessage();
        } catch (Error $e) {
            $e->getMessage();
        }

        if (isset($_REQUEST["seleccionar_capitulo"])) {
            $params["num_cap"] = recoge("lista_capitulos");

            try {
                $cs = new Consultas();
                $titulo = $cs->buscar($params["num_cap"], "capitulos", "titulo", "num_cap");
                $archivo = $cs->buscar($params["num_cap"], "capitulos", "archivo", "num_cap");
                $params["num_cap"] = recoge("contador_capitulos");
                $datosCap = $cs->buscarFila2Campos($params['id_libro'], $params['num_cap'], 'capitulos', 'id_libro', 'num_cap');
                echo ($params["num_cap"]);
                //$link = "index.php?ctl=leerCapitulo&id_libro='" . $params['id_libro'] . "'&num_cap=' ". $params['num_cap'] . "'&titulo=' ". $datosCap['titulo'] . "'&archivo='" . $datosCap['archivo'] . "'&titulo_libro='" . $params['titulo'];
                header('location: index.php?ctl=leerCapitulo&id_libro=' . $params['id_libro'] . '&num_cap=' . $params['num_cap'] . '&titulo=' . $datosCap['titulo'] . '&archivo=' . $datosCap['archivo'] . '&titulo_libro=' . $params['titulo']);

            } catch (Exception $e) {
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            }
        }

        if (isset($_REQUEST["valorar"])) {
            $valoracion = recoge("rating");
            if ($valoracion != 1 && $valoracion != 2 && $valoracion != 3 && $valoracion != 4 && $valoracion != 5) {
                $params["mensaje"] = "Error en la valoracion";
                header("location: index.php?ctl=book&id_libro=" . $params["id_libro"]);
            } else {
                try {
                    $cs = new Consultas();
                    if ($cs->existeValoracion($_SESSION["id_user"], $params["id_libro"])) {
                        $cs->borrarValoracion($_SESSION["id_user"], $params["id_libro"]);
                    }
                    $cs->insertarValoracion($_SESSION["id_user"], $params["id_libro"], $valoracion);
                    $notas = $cs->buscarColumnaArray($params["id_libro"], "valoraciones", "nota", "id_libro");
                    $media = calcularMedia($notas);
                    $cs->actualizarValoracionLibro($params["id_libro"], $media);

                } catch (Exception $e) {
                    error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
                } catch (Error $e) {
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
                }
            }
        }

        if (isset($_REQUEST["seguir"])) {

            try {
                $cs = new Consultas();
                if (!$cs->existeRelacionSeguido($params["id_libro"], $_SESSION["id_user"])) {
                    $cs->agregarSeguido($params["id_libro"], $_SESSION["id_user"]);
                }

            } catch (Exception $e) {
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
            } catch (Error $e) {
                error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            }
        }

        if (isset($_REQUEST["escribir_resena"])) {
            header("location: index.php?ctl=escribirResena&id_libro=" . $params["id_libro"]);
        }

        require __DIR__ . '/../../web/templates/book.php';

    }

    public function escribirResena()
    {
        $menu = $this->cargaMenu();
        $params = array(
            'id_libro' => '',
            'titulo' => '',
            'imagen_portada' => '',
            'num_resenas' => '',
            'mensaje' => array(),
        );

        $params['id_libro'] = $_GET['id_libro'];

        try {
            $cs = new Consultas();
            $datosLibro = $cs->buscarFila($params['id_libro'], 'libro', 'id_libro');
            $capitulos = $cs->buscarTodos($params["id_libro"], "capitulos", "titulo", "id_libro");

            // Asigna los valores obtenidos a los campos correspondientes en $params
            $params['titulo'] = $datosLibro['titulo'];
            $params['imagen_portada'] = $datosLibro['imagen_portada'];
            $params['num_resenas'] = $datosLibro['num_resenas'];

            // Manejo de generos (si es una columna en tu tabla)
            $generos = $cs->buscarFila($params['id_libro'], 'generolibro', "id_libro");
            $params['generos'] = $cs->obtenerGenerosActivos($params['id_libro']);

            $params['id_autor'] = $cs->buscar($params['id_libro'], 'libro', 'id_user', 'id_libro');
            $params['autor'] = $cs->buscar($params['id_autor'], 'usuario', 'nombre', 'id_user');

            $resenas = $cs->obtenerResenasPorLibro($params['id_libro']);
        } catch (Exception $e) {
            $e->getMessage();
        } catch (Error $e) {
            $e->getMessage();
        }

        if (isset($_REQUEST["volver"])) {
            header("location: index.php?ctl=book&id_libro=" . $params["id_libro"]);
        }

        if (isset($_REQUEST["publicar"])) {
            $texto = recoge("resena");
            if (cTexto($texto, "resena", $params["mensaje"], 1000, 1)) {
                try {
                    if ($cs->existe2campos($_SESSION["id_user"], $params["id_libro"], "resena")) {
                        echo ($cs->actualizarResena($_SESSION["id_user"], $params["id_libro"], $texto));
                    } else {
                        echo ($cs->guardarResena($_SESSION["id_user"], $params["id_libro"], $texto));
                    }

                } catch (Exception $e) {
                    $e->getMessage();
                } catch (Error $e) {
                    $e->getMessage();
                }
            }

            header("location: index.php?ctl=book&id_libro=" . $params["id_libro"]);
        }

        require __DIR__ . '/../../web/templates/escribirResena.php';
    }


    public function buscarLibros(){


        $params = array(
            "busqueda" => ''
        );

        if(isset($_REQUEST["boton_buscar"])){
            $params = array(
                "busqueda" => '',
                "mensaje" => []
            );
            $params["busqueda"] = recoge("buscar_libro");
            try{

                $cs = new Consultas();

                $libros = $cs -> buscarLibrosPorTitulo($params['busqueda']);



                $nombresAutores = $cs -> obtenerNombresAutoresPorLibros($libros);

                if(count($libros) === 0){
                    $libros['mono'] = true;
                } else {
                    $libros['mono'] = false;
                }

            } catch (Exception $e) {
                $e->getMessage();
            } catch (Error $e) {
                $e->getMessage();
            }
        }
        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/buscarLibros.php';
    }


    public function modificaNivelUsuario(){
        $params = array(
            'nivel' => '',
            'mensaje' => array()

        );
        $cs = new Consultas();
        $params["nivel"] = $_REQUEST["nivel"];

        if($cs-> modificaNivelUsuario($_SESSION["id_user"],$params["nivel"])){
            $_SESSION["nivel"]=$params["nivel"];

        }else{
            $params["mensaje"]="No se ha podido modificar el nivel de usuario";
            header("Location: index.php?ctl=error");
        }

    }

    public function modificaUsuario(){

        $params = array(
            'nombre' => '',
            'nick' => '',
            'descripcion' => '',
            'archivo' => '',
            'mensaje' => []
        );

        if(isset($_REQUEST["bAceptar"])){
            $params["nombre"] = recoge("nombre");
            $params["nick"] = recoge("nick");
            $params["descripcion"] = recoge("descripcion");

            if (empty($params["nombre"])) {
                $params["nombre"] = $_SESSION["nombre"];
            }

            if (empty($params["nick"])) {
                $params["nick"] = $_SESSION["nick"];
            }


            if (empty($params["archivo"])) {
                $params["archivo"] = cFile("f_perfil", $params["mensaje"], Config::$extensionesValidas, __DIR__ . '/../archivos/img/perfil/', Config::$max_file_size);
            }
            if (empty($params["archivo"])) {
                $params["archivo"] = $_SESSION["foto_perfil"];
            }

                $cs = new Consultas();
                $cs->modificarUsuario($_SESSION["id_user"],$params["nombre"],$params["nick"],$params["archivo"],$params["descripcion"]);

                $_SESSION["nombre"]=$params["nombre"];
                $_SESSION["nick"]=$params["nick"];
                $_SESSION["foto_perfil"]=$params["archivo"];
                $_SESSION["descripcion"]=$params["descripcion"];
                header("Location: index.php?ctl=perfilUsuario");
            }
        }

        public function cambiaPass(){
            try{
                $params = array(
                    'pass' => '',
                    'pass2' => '',
                    'oldPass' => '',
                    'mensaje' => ''
                );

                if(isset($_REQUEST["bAceptar"])){
                    $params["pass"]=recoge("pass");
                    $params["pass2"]=recoge("pass2");
                    $params["oldPass"]=recoge("oldPass");

                    $cs = new Consultas();
                    if($cs->verificarPassID($_SESSION["id_user"], $params["oldPass"])){

                        if(cPassword($params["pass"], $params["errores"])){
                            header('Location: index.php?ctl=perfilUsuario');
                        }else{
                            if ($params["pass"] !== $params["pass2"]) {
                                header('Location: index.php?ctl=perfilUsuario');
                            }else{
                                $hash = password_hash($params["pass"], PASSWORD_BCRYPT);

                                if($cs->cambiarPass($_SESSION["id_user"],$hash)){
                                    header("Location: index.php?ctl=perfilUsuario");
                                    $_SESSION["mensaje"]="";
                                }else{
                                    $params["mensaje"]="No se ha podido cambiar la contraseña";
                                    header("Location: index.php?ctl=error");
                                }
                            }
                        }
                    }else{
                        $_SESSION["mensaje"]="La contraseña no es correcta";
                        header("Location: index.php?ctl=perfilUsuario");
                    }
                }
            }catch (Exception $e) {
                $params["mensaje"]=$e->getMessage();
                header('Location: index.php??ctl=error');
            } catch (Error $e) {
                $params["mensaje"]=$e->getMessage();
                header('Location: index.php??ctl=error');
            }
        }


public function error(){
    $menu = $this->cargaMenu();
    require __DIR__ . '/../../web/templates/error.php';
}

public function seguidos()
    {
        $params=array(
            "id_user"=>$_SESSION['id_user']
        );

        try{

            $cs = new Consultas();

            $librosSeguidos = $cs->obtenerLibrosSeguidos($params['id_user']);
            $nombresAutores = $cs -> obtenerNombresAutoresPorLibros($librosSeguidos);

            if(count($librosSeguidos) === 0){
                $librosSeguidos['mono'] = true;
            } else {
                $librosSeguidos['mono'] = false;
            }

        } catch (Exception $e) {
            $e->getMessage();
        } catch (Error $e) {
            $e->getMessage();
        }

        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/seguidos.php';
    }
    
    public function contacto(){
        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/contacto.php';
    }

    public function dondeEstamos(){
        require __DIR__ . '/../../web/templates/dondeEstamos.php';
    }

    public function recomendados()
    {
        $params=array(
            "generos_pref"=>[],
            "num_generos" => 0,
            "recomendaciones" => [],
            "nombre_pref" => []

        );

        $librosPorGenero=array(
             "terror"=>[],

             "romance"=>[],
             "fantasia"=>[],
             "cficcion"=>[],
             "historia"=>[],
             "arte"=>[],
             "thriller"=>[],
             "poesia"=>[],
             "drama"=>[],
             "biografia"=>[],
             "misterio"=>[],
             "policiaca"=>[]
        );


        try{
            $cs=new Consultas();
            $params["generos_pref"]=$cs->generosSelecionadosUsuario($_SESSION["id_user"]);
            $librosPorGenero["terror"] = $cs -> obtenerLibrosAleatoriosPorGenero("terror");
            $librosPorGenero["romance"] = $cs -> obtenerLibrosAleatoriosPorGenero("romance");
            $librosPorGenero["fantasia"] = $cs -> obtenerLibrosAleatoriosPorGenero("fantasia");
            $librosPorGenero["cficcion"] = $cs -> obtenerLibrosAleatoriosPorGenero("cficcion");
            $librosPorGenero["historia"] = $cs -> obtenerLibrosAleatoriosPorGenero("historia");
            $librosPorGenero["arte"] = $cs -> obtenerLibrosAleatoriosPorGenero("arte");
            $librosPorGenero["thriller"] = $cs -> obtenerLibrosAleatoriosPorGenero("thriller");
            $librosPorGenero["poesia"] = $cs -> obtenerLibrosAleatoriosPorGenero("poesia");
            $librosPorGenero["drama"] = $cs -> obtenerLibrosAleatoriosPorGenero("drama");
            $librosPorGenero["biografia"] = $cs -> obtenerLibrosAleatoriosPorGenero("biografia");
            $librosPorGenero["misterio"] = $cs -> obtenerLibrosAleatoriosPorGenero("misterio");
            $librosPorGenero["policiaca"] = $cs -> obtenerLibrosAleatoriosPorGenero("policiaca");

            for ($i = 1; $i < count($params["generos_pref"]); $i++) {
                if ($params["generos_pref"][Config::$generos_disponibles[$i - 1]] == 1) {
                    $genero = Config::$generos_disponibles[$i - 1];
                    if (!empty($librosPorGenero[$genero])) {
                        $params["num_generos"]++;
                        $params["recomendaciones"][$genero] = $librosPorGenero[$genero];
                        array_push($params["nombre_pref"], $genero);
                    }
                }
            }
        }catch (Exception $e) {
            $e->getMessage();
        } catch (Error $e) {
            $e->getMessage();
        }

        $menu = $this->cargaMenu();
        require __DIR__ . '/../../web/templates/recomendados.php';
    }


}


