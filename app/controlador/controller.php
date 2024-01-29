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
            return 'inicio.php';
        } else if ($_SESSION['nivel'] == 1) {
            return 'inicio.php';
        } else if ($_SESSION['nivel'] == 2) {
            return 'inicio.php';
        }
    }

    public function iniciarSesion() {
        var_dump($_SESSION["nivel"]);

        try{
            $params = array(
                'mail' =>'',
                'pass' =>''
            );
            $mail="";
            $pass="";

            if ($_SESSION['nivel'] > 0) {
                header("location:index.php?ctl=inicio");
            }

            if(isset($_REQUEST["bAceptar"])){
                $mail = recoge("mail");
                $pass = recoge("pass");

                
                        $cs=new Consultas();
                        if(!$usuario = $cs->verificarEmail($mail)){
                            $param['mensaje']="El correo no existe";
                        }else{
                            if($cs->verificarPass($usuario['email'],$usuario['pass'])){
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
                                    $params = array(
                                        'mail' =>$mail,
                                        'pass' =>$pass
                                    );
                                    $param["mensaje"]="No se ha completado la autentificación por correo";
                                }
                            }else{
                                $params = array(
                                    'mail' =>$mail,
                                    'pass' =>$pass
                                );
                                $param["mensaje"]="La contraseña es incorrecta";
                            }
                        }
                        header('Location: index.php?ctl=inicio');
            }
        }catch (Exception $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logException.txt");
            header('Location: index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "../logs/logError.txt");
            header('Location: index.php?ctl=error');
        }
        require __DIR__ . '/../../web/templates/inicioSesion.php';
    }

    public function registro() {
            $nombre="";
            $nick="";
            $mail="";
            $pass="";
            $pass2="";
            $fecha="";
            $lector="";
            $foto_perfil="";
            $descripcion="";
            $nivel=0;
            $activo=0;

            $params = array(
                'nombre' => '',
                'nick'=>'',
                'mail' =>'',
                'pass' =>'',
                'fecha' =>'',
                'foto_perfil'=>'',
                'opcion' =>'',
                'archivo' => '',
                'mensaje' => []
            );

            if ($_SESSION['nivel'] > 0) {
                header("location:index.php?ctl=inicio");
            }

            if((isset($_POST["bAceptar"]))){
                //recogemos datos de los inputs
                $nombre=recoge("nombre");
                $nick=recoge("nick");
                $mail=recoge("mail");
                $pass=recoge("pass");
                $pass2=recoge("pass2");
                $fecha=recoge("fecha");
                $descripcion=recoge("descripcion");
                $lector=recoge("opcion_usuario");

                


                //comenzamos las validaciones
                if(empty($nombre)){
                    $param["mensaje"]="Por favor ingrese un nombre";
                }else{
                    $nombre=sinEspacios($nombre);
                }

                if(empty($nick)){
                    $nick = "User_".uniqid();
                }else{
                    $nick=sinEspacios($nick);
                }

                
                
                cEmail($mail,$errores,"mail",30,8);

                if(cPassword($pass,$errores) && $pass!==$pass2){
                    $param["mensaje"]="Las contraseñas no coinciden";
                }

                cFecha($fecha,$errores);

                if($lector=="lector"){
                    $nivel=1;
                }
                elseif($lector=="escritor"){
                    $nivel=2;
                }

                if(empty($params["mensaje"] && $params["archivo"])){
                    $params["archivo"] = cFile("f_perfil",$params["mensaje"],Config::$extensionesValidas,__DIR__ . '/../archivos/img/perfil/',Config::$max_file_size);
                    if (!isset($_POST["terminos"]) || $_POST["terminos"] != 1) {
                        $param["mensaje"]="Debes aceptar los términos y condiciones para poder registrarte";
                    }
                        try{
                            $cs = new Consultas();
                            $hash = password_hash($pass, PASSWORD_BCRYPT);
                            if($usuario = $cs->agregarNuevoUsuario($nombre,$nick,$mail,$hash,$fecha,$params["archivo"],$descripcion,$nivel,$activo)){
    
                                $idUsuario = $cs -> buscar($mail, "usuario", "id_user","email");
    
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
                                        $mailer->addAddress($mail, $nombre);
    
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
                                header('Location: index.php?ctl=iniciarSesion');
                            }else{
                                $params = array(
                                    'nombre' => $nombre,
                                    'mail' =>$mail,
                                    'pass' =>$pass,
                                    'fecha' =>$fecha,
                                    'opcion' =>$lector
                                );
    
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

        if ($_SESSION['nivel_usuario'] > 0) {
            header("location:index.php?ctl=inicio");
        }
        require __DIR__ . '/../../web/templates/inicio.php';
    }

}