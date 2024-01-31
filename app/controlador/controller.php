<?php

require __DIR__ . '/../composer/vendor/autoload.php';


require __DIR__ . '/../composer/vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/../composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../composer/vendor/phpmailer/phpmailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




class Controller{

    private function cargaMenu()
    {
        if ($_SESSION['nivel'] == 0) {
            return 'menuInvitado.php';
        } else if ($_SESSION['nivel'] == 1) {
            return 'menuUser.php';
        } else if ($_SESSION['nivel'] == 2) {
            return 'menuAdmin.php';
        }
    }


    public function iniciarSesion() {
        try{
            $params = array(
                'mail' =>'',
                'pass' =>''
            );
            // if ($_SESSION['nivel'] > 0) {
            //     header("location:index.php?ctl=inicio");
            // }

            if(isset($_POST["bAceptar"])){
                $params["mail"] = recoge("mail");
                $params["pass"] = recoge("pass");
                echo $params["mail"];
                echo $params["pass"];
                        $cs=new Consultas();
                        if(!$usuario = $cs->verificarEmail($params["mail"])){
                            $params['mensaje']="El correo no existe";
                        }else{
                            if(!$cs->verificarPass($usuario['email'],$usuario['pass'])){
                                session_unset();
                                session_destroy();
                                session_start();
                                if($usuario['activo']==1){
                                    $_SESSION['id_user'] = $usuario['id_user'];
                                    $_SESSION['nombre'] = $usuario['nombre'];
                                    $_SESSION['nick'] = $usuario['nick'];
                                    $_SESSION['email'] = $usuario['email'];
                                    $_SESSION['f_nacimiento'] = $usuario['f_nacimiento'];
                                    $_SESSION['foto_perfil'] = $usuario['foto_perfil'];
                                    $_SESSION['nivel'] = $usuario['nivel'];

                                    header('Location: index.php?ctl=inicio');
                                }else{
                                    $params["mensaje"]="No se ha completado la autentificación por correo";
                                    header('Location: index.php?ctl=error');
                                }
                            }else{
                                $params["mensaje"]="La contraseña es incorrecta";
                                echo "Contra mal";
                            }
                        }
            }
        }catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logException.txt");
            echo 1;
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            echo 2;
        }
        require __DIR__ . '/../../web/templates/inicioSesion.php';
    }

    public function registro() {
            $params = array(
                'nombre' => '',
                'nick'=>'',
                'mail' =>'',
                'pass' =>'',
                'pass2' =>'',
                'fecha' =>'',
                'descripcion' =>'',
                'foto_perfil'=>'',
                'opcion' =>'',
                'archivo' => '',
                'nivel' => 0,
                'activo' =>0,
                'mensaje' => []
            );


            if ($_SESSION['nivel'] > 0) {
                header("location:index.php?ctl=inicio");
            }


            if((isset($_POST["bAceptar"]))){
                //recogemos datos de los inputs
                $params["nombre"]=recoge("nombre");
                $params["nick"]=recoge("nick");
                $params["mail"]=recoge("mail");
                $params["pass"]=recoge("pass");
                $params["pass2"]=recoge("pass2");
                $params["fecha"]=recoge("fecha");
                $params["descripcion"]=recoge("descripcion");
                $params["opcion"]=recoge("opcion_usuario");







                //comenzamos las validaciones
                if(empty($params["nombre"])){
                    $params["mensaje"]="Por favor ingrese un nombre";
                }else{
                    $nombre=sinEspacios($params["nombre"]);
                }


                if(empty($params["nick"])){
                    $params["nick"] = "User_".uniqid();
                }else{
                    $params["nick"]=sinEspacios($params["nick"]);
                }




                cEmail($params["mail"],$params,"mensaje",30,8);


                if(cPassword($params["pass"],$params["mensaje"]) && $params["pass"]!==$params["pass2"]){
                    $params["mensaje"]="Las contraseñas no coinciden";
                }


                cFecha($params["fecha"],$params);


                if($params["opcion"]=="lector"){
                    $params["nivel"]=1;
                }
                elseif($params["opcion"]=="escritor"){
                    $params["nivel"]=2;
                }

                if (!isset($_POST["terminos"]) || $_POST["terminos"] != 1) {
                    $params["mensaje"]="Debes aceptar los términos y condiciones para poder registrarte";
                }


                if(empty($params["mensaje"] && $params["archivo"])){
                    $params["archivo"] = cFile("f_perfil",$params["mensaje"],Config::$extensionesValidas,__DIR__ . '/../archivos/img/perfil/',Config::$max_file_size);

                    if(empty($params["archivo"])){
                        $params["archivo"]="no_profile.png";
                    }
                        try{
                            $cs = new Consultas();
                            $hash = password_hash($params["pass"], PASSWORD_BCRYPT);
                            if($usuario = $cs->agregarNuevoUsuario($params["nombre"],$params["nick"],$params["mail"],$hash,$params["fecha"],$params["archivo"],$params["descripcion"],$params["nivel"],$params["activo"])){

                                $idUsuario = $cs -> buscar($params["mail"], "usuario", "id_user","email");

                                $cs ->creaGenerosUser($idUsuario);

                                $fechaRegistro = time()+86400;

                                $token = uniqid();

                                $cs -> agregarToken($token, $fechaRegistro, $idUsuario);

                                $mailer = new PHPMailer();

                                try {
                                        // Configura el servidor SMTP
                                        $mailer->isSMTP();
                                        $mailer->Host = 'smtp.gmail.com';
                                        $mailer->SMTPAuth = true;
                                        $mailer->Username = 'inkbytedaw@gmail.com';
                                        $mailer->Password = 'sfay bopb hxsr lyvu';
                                        $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                                        $mailer->Port = 587;

                                        // Configura los destinatarios
                                        $mailer->setFrom('inkbytedaw@gmail.com', 'InkByte');
                                        $mailer->addAddress($params["mail"], $params["nombre"]);

                                        // Contenido del correo
                                        $mailer->isHTML(true);
                                        $mailer->Subject = 'Activa tu cuenta de InkByte';
                                        $mailer->Body = 'Activa tu cuenta con este enlace: Enlace a la web placeholder' . $token;

                                        // Enviar el correo
                                        $mailer->send();
                                        echo 'El correo se ha enviado con éxito.';
                                    } catch (Exception $e) {
                                        echo "El correo no se pudo enviar. Error: {$mailer->ErrorInfo}";
                                    }
                                //header('Location: index.php?ctl=iniciarSesion');
                            }else{
                                $params['mensaje'] = 'No se ha podido insertar el usuario. Revisa el formulario.';
                            }
                        }catch (Exception $e){
                                // En este caso guardamos los errores en un archivo de errores log
                                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logs/logBD.txt");
                                // guardamos en ·errores el error que queremos mostrar a los usuarios
                                header('Location: index.php?ctl=error');
                        }catch (Error $e){
                            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
                            header('Location: index.php?ctl=error');
                        }
                }



                }
                require __DIR__ . '/../../web/templates/registro.php';
    }


    public function subirCapitulo(){

        if ($_SESSION['nivel'] != 2) {
            header("location:index.php?ctl=inicio");
        }

            try{
                $cs = new Consultas();
                $opcionesDisponibles = $cs -> obtenerIdLibrosPorUsuario(1); //cambiar por $_SESSION["id_user"]

                $params = array(
                    'id_libro' => '',
                    'num_cap'=>'',
                    'titulo' =>'',
                    'archivo' =>'',
                    'mensaje' => [],
                    'capitulos_del_libro' => ''
                );


                if((isset($_POST["bAceptar"]))){
                    $params["id_libro"] = recoge("tus_opciones");
                    $params['capitulos_del_libro'] = $cs -> filas("capitulos", "id_libro", $params["id_libro"]);

                    $params["num_cap"] = $params['capitulos_del_libro'] + 1;

                    $params["titulo"] = recoge("titulo_cap");

                    if(!cOpciones($params["id_libro"], $opcionesDisponibles)){
                        $params["mensaje"] = "No has introducido un libro válido";
                    }

                    if(cTexto($params["titulo"], "titulo", $params["mensaje"], 50, 1, true, true) == false){
                        header ("Location:index.php?ctl=subirCapitulo");
                    }

                    cNum($params["num_cap"], "capitulo", $params["mensaje"], 0, 9999);

                    if(empty($params["mensaje"]) && !empty($params["id_libro"]) && !empty($params["num_cap"]) && !empty($params["titulo"])){

                        $params["archivo"] = cFile("archivoPDF", $params["mensaje"],Config::$extensionesCapitulos, __DIR__ . '/../archivos/capitulos/', 200000000);
                        if(empty($params["mensaje"]) && !empty($params["archivo"])){
                            $cs -> agregarCapitulo($params["id_libro"], $params["num_cap"], $params["titulo"], $params["archivo"]);
                            $cs -> aumentarCapitulosLibro($params["id_libro"]);

                        } else {
                            header ("Location:index.php?ctl=subirCapitulo");
                        }
                    } else {
                        header ("Location:index.php?ctl=subirCapitulo");
                    }
                }
            } catch (Exception $e){
                echo "Error: " . $e->getMessage();
                header('Location: index.php?ctl=error');
            }   catch (Error $e){
                    error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
                    header('Location: index.php?ctl=error');
            }

            $menu = $this->cargaMenu();

            require __DIR__ . '/../../web/templates/subirCapitulo.php';

    }

    public function home()
    {

        $params = array(
            'fecha' => date('d-m-Y')
        );
        
        $menu = 'inicio.php';

        if ($_SESSION['nivel'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function inicio()
    {
        $params = array(
            'fecha' => date('d-m-Y')
        );
        $menu = $this->cargaMenu();

        require __DIR__ . '/../../web/templates/inicio.php';
    }

    public function generoUsuario()
    {
          if ($_SESSION['nivel'] < 1) {
            header("location:index.php?ctl=inicio");
          }

        $params = array (
            'terror'=>0,
            'romance'=>0,
            'fantasia'=>0,
            'cficcion'=>0,
            'historia'=>0,
            'arte'=>0,
            'thriller'=>0,
            'poesia'=>0,
            'drama'=>0,
            'biografia'=>0,
            'misterio'=>0,
            'policiaca'=>0
        );

        $generosUsu = [];

        if(isset($_POST["bAceptar"])){
            $generosUsu = recogeArray("generoUsuario");
            foreach($params as $genero => $value){
                for($i=0;$i<count($generosUsu);$i++){
                    if($genero === $generosUsu[$i]){
                        $params[$genero] = 1;
                    }
                }
            }

            try{
                    $cs = new Consultas();

                    $cs -> actualizarPreferenciasUsuario(22,$params["terror"],$params["romance"],$params['fantasia'],$params['cficcion'],$params['historia'],$params['arte'],$params['thriller'],$params['poesia'],$params['drama'],$params['biografia'],$params['misterio'],$params['policiaca']);

                    header('Location: index.php?ctl=inicio');

                }catch (Exception $e){
                    echo "Error: " . $e->getMessage();
                    header('Location: index.php?ctl=error');
                }catch (Error $e){
                    echo "Error: " . $e->getMessage();
                    header('Location: index.php?ctl=error');
                }
        }

        require __DIR__ . '/../../web/templates/modalGeneroUsuario.php';
}
    public function crearLibro()
    {
        // if ($_SESSION['nivel'] != 2) {
        //     header("location:index.php?ctl=inicio");
        // }

        if((isset($_POST["bAceptar"]))){

            try{

                $params = array(
                    'id_user' => '',
                    'titulo' => '',
                    'sinopsis' => '',
                    'imagen_portada' => '',
                    'capitulos' => 0,
                    'num_resenas' => 0,
                    'valoracion' => 0,
                    'visitas' => 0,
                    'visitasSemana'=>0,
                    'estado' =>1, //0 cancelado, 1 publicando, 2 terminado
                    'edad_recomendada',
                    'm_18' =>'',
                    'm_16' => '',
                    'm_12' => '',
                    "generos" => [],
                    'mensaje' => []
                );

                $params['id_user'] = 1; //$_SESSION['id_user']; cambiar cuando funcione el login
                $params['titulo'] = recoge("titulo_lib");
                $params['sinopsis'] = recoge('sinopsis');
                $params['generos'] = recogeArray('generos');
                $params['edad_recomendada'] = recoge('edad_recomendada');
                if(cTexto($params['titulo'], "titulo", $params['mensaje'], 50, 1, true, true)){
                    if(cTexto($params['sinopsis'], "sinopsis", $params['mensaje'], 1000, 1, true, true)){


                        foreach($params['generos'] as $gen){
                            if(!in_array($gen, Config::$generos_disponibles)){
                                $params["mensaje"] = "Error en el campo genero";
                            }
                        }

                        if(empty($params["mensaje"])){

                            switch($params['edad_recomendada']){
                                case "1" : $params["m_18"] = 0; $params["m_16"] = 0; $params["m_12"] = 0; break;
                                case "2" : $params["m_18"] = 0; $params["m_16"] = 0; $params["m_12"] = 1; break;
                                case "3" : $params["m_18"] = 0; $params["m_16"] = 1; $params["m_12"] = 0; break;
                                case "4" : $params["m_18"] = 1; $params["m_16"] = 0; $params["m_12"] = 0; break;
                                default : $params["mensaje"] = "Error en el campo edad"; break;
                            }
                        } else {
                            $params["mensaje"] = "Error en el campo género";
                        }
                    } else {
                        echo "fail en sinopsis";
                        $params["mensaje"] = "Error en el campo sinopsis";
                    }
                } else {
                    $params["mensaje"] = "Error en el campo título";
                }

                if(empty($params['mensaje'])){
                    $params['imagen_portada'] = cFile("portadaLibro", $params['mensaje'], Config::$extensionesValidas,__DIR__ . '/../archivos/img/libro/', 2000000);

                    if(!empty($params["imagen_portada"])){
                        $cs = new Consultas();
                        $cs -> agregarLibro(5, $params["titulo"], $params["sinopsis"], $params["imagen_portada"], $params["capitulos"], $params["num_resenas"], $params["valoracion"], $params["visitas"], $params["visitasSemana"], $params["estado"], $params["m_18"], $params["m_16"], $params["m_12"]);
                        //Cambiar el primer parametro por $params["id_user"];
                    }
                } else {}

                if(empty($params["imagen_portada"])){
                    header("location:index.php?ctl=crearLibro");
                } else {
                    header("location:index.php?ctl=inicio");
                }



            } catch (Exception $e){
                echo "Error: " . $e->getMessage();
            }




        }
        require __DIR__ . '/../../web/templates/crearLibro.php';
    }

    function verLibro(){
        if(isset($_REQUEST["leer"])){
            try{
                $params=array(
                    "id_libro"=>"",
                    "num_cap"=>"",
                    "titulo"=>"",
                    "archivo"=>"",
                    "titulo_libro"=>""
                );

                $params["id_libro"]=$_SESSION["id_libro"];

                $params["num_cap"]=recoge("contador_capitulos");
                
               
                $cs=new Consultas();
                $params["titulo"]=$cs->buscar($params["id_libro"],"capitulos","titulo","id_libro");
                $params["archivo"]=$cs->buscar($params["id_libro"],"capitulos","archivo","id_libro");
                $params["titulo_libro"]=$cs->buscar($params["id_libro"],"libro","titulo","id_libro");

                $url = "index.php?ctl=leerCapitulo&id_libro=" . urlencode( $params["id_libro"]) . "&num_cap=" . urlencode( $params["num_cap"]) . "&titulo=" . urlencode($params["titulo"]) . "&archivo=" . urlencode( $params["archivo"]) . "&titulo_libro=" . urlencode( $params["titulo_libro"]);
                
                header("location: . $url");
               




              
            } catch (Exception $e){
                echo "Error: " . $e->getMessage();
            }

                
        }
    }
}